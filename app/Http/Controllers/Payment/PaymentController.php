<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generateTransactionReference($year)
    {
        // Définir le préfixe abrégé avec un code plus court
        $prefix = 'VTP-' . $year . '/';

        // Utilisation d'une transaction pour éviter les conflits concurrentiels
        DB::beginTransaction();

        try {
            // Trouver le dernier numéro de référence pour l'année donnée
            $lastReference = DB::table('orders')
                ->where('reference', 'like', $prefix . '%')
                ->orderBy('reference', 'desc')
                ->first();

            // Extraire le numéro et incrémenter
            if ($lastReference) {
                // Si une référence existe déjà pour cette année, incrémenter le numéro
                $lastNumber = (int) substr($lastReference->reference, -3); // Récupérer les 3 derniers chiffres
                $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); // Incrémenter et formater avec 3 chiffres
            } else {
                // Sinon, débuter à 001
                $newNumber = '001';
            }

            // Construire la nouvelle référence
            $newReference = $prefix . $newNumber;

            // Vérifier que la référence n'existe pas déjà
            // (vérifier à nouveau juste avant d'enregistrer, pour éviter les conflits)
            $existingReference = DB::table('orders')->where('reference', $newReference)->exists();

            if ($existingReference) {
                // Si la référence existe déjà, relancer la génération avec un autre numéro
                return $this->generateTransactionReference($year);
            }

            // Commit de la transaction (garantie d'unicité)
            DB::commit();

            // Retourner la nouvelle référence
            return $newReference;
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction
            DB::rollBack();
            Log::error('Erreur lors de la génération de la référence : ' . $e->getMessage());
            return null;
        }
    }


    public function initialisePayment(Request $request)
    {

        $userId = auth()->user()->id;

        $referenceTransaction = $this->generateTransactionReference(date('y'));

        $order = new Order();
        $order->reference = $referenceTransaction;
        $order->user_id = $userId;
        $order->codeinfluenceur = $request->codeinfluenceur;
        $order->entreprise_id = 1;
        $order->cost_delivery = $request->pricedelivery;
        $order->compagne_id = 1;
        $order->qtecmde = $request->qtecmde;
        $order->paymentaresse_id = $request->adressepaymentid;
        $order->influenceur_id = 1;
        $order->product_id = $request->product_id;
        $order->montantht = $request->netapyer;
        $order->montanttva = 0;
        $order->montanttc = $request->netapyer;
        $order->status = 'pending';
        $order->shipping_address = $request->adresse;
        $order->pricedeliverybycountry_id = $request->deliverycountryid;
        $order->save();

        $returnContext = json_encode([
            'user_id' => $userId,
            'transaction_id' => $order->id,
            'reference' => $order->reference,
            'data' => true
        ]);

        $data = [
            'merchantId' => "PP-F2197",
            'amount' => '1',
            'description' => $request->productname,
            'channel' => 'ORANGE CI',
            'countryCurrencyCode' => "FCFA",
            'referenceNumber' => $referenceTransaction,
            'customerEmail' => Auth::user()->email,
            'customerFirstName' => Auth::user()->name,
            'customerLastname' => Auth::user()->name,
            'customerPhoneNumber' => $request->telephone,
            'notificationURL' => route('payment.status'),
            'returnURL'  => route('payment.status'),
            'returnContext' => $returnContext,
        ];

        // Configuration cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paiementpro.net/webservice/onlinepayment/init/curl-init.php");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Exécution de la requête
        $response = curl_exec($ch);

        // Gestion des erreurs cURL
        if (curl_errno($ch)) {
            return response()->json(['error' => 'Erreur de communication avec le service de paiement.'], 500);
        }

        curl_close($ch);

        // Décodage de la réponse
        $obj = json_decode($response);
        if (!isset($obj->url)) {
            return response()->json(['error' => 'URL de paiement non reçue.'], 500);
        }

        // URL de paiement
        $urlPayement = $obj->url;

        // Retourner la réponse en JSON
        return response()->json(['payment_url' => $urlPayement], 200);
    }


    public function PaymentStatutUpdate(Request $request)
    {
        $returnContext = $request->query('returnContext');
        $responsecode = $request->query('responsecode');
        $contextData = json_decode($returnContext, true);
        $userId = $contextData['user_id'] ?? null;

        $transactionId = $contextData['transaction_id'] ?? null;
        $reference = $contextData['reference'] ?? null;


        if ($responsecode == -1) {

            $order = Order::where('id', $transactionId)
                ->where('reference', $reference)
                ->first();

            if ($order) {
                // Mettre à jour l'état de la commande à "failed"
                $order->status = 'echec';
                $order->save();
            }

            return redirect()->route('payment.failed')->with('error', 'Commande non trouvée.');
        }

        if ($responsecode == 0) {
            $order = Order::where('id', $transactionId)
                ->where('reference', $reference)
                ->first();

            if ($order)  // commande exite
            {
                $order->update([
                    'status' => 'paye',
                ]);

                return redirect()->route('payment.success')->with('sucess', 'Commande validée avec succés.');
            } else  // commande existe pas
            {
                return redirect()->route('payment.failed')->with('error', 'Commande non trouvée.');
            }
        }

        return redirect()->route('payment.failed')->with('error', 'Le paiement a échoué avec un code inattendu.');
    }


    public function paymentFailled()
    {
        return view('home.failled');
    }

    public function payementSuccess()
    {
        return view('home.sucesspayment');
    }
}
