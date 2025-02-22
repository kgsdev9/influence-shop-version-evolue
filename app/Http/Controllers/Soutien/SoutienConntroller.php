<?php

namespace App\Http\Controllers\Soutien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investisseur;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class SoutienConntroller extends Controller
{


    public function index()
    {
        $listeInvestisseur = Investisseur::all();
        return view('dashboard.investisseurs.index', compact('listeInvestisseur'));
    }

    // Cette méthode initialise un paiement
    public function initializePayment(Request $request)
    {
        
        // Crée une nouvelle instance de Investisseur (Abonnement)
        $investisseur = Investisseur::create([
            'nom' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'telephone' => $request->phone,
            'adresse' => $request->address,
            'status' => 'en cours',
            'description' => $request->amount,
            'montant_investi' => $request->amount,
        ]);

        // Générez une référence pour cette souscription
        $referenceTransaction = 'INV-' . strtoupper(uniqid());

        $returnContext = json_encode([
            'transaction_id' => $investisseur->id,
            'reference' => $referenceTransaction,
            'arg' => $request->arg,
            'data' => true
        ]);


        $data = [
            'merchantId' => "PP-F2197",
            'amount' => 3,
            'description' => $request->reference,
            'channel' => 'PAYPAL',
            'countryCurrencyCode' => 952,
            'referenceNumber' => $referenceTransaction,
            'customerEmail' => $request->email,
            'customerFirstName' => $request->firstName,
            'customerLastname' => $request->lastName,
            'customerPhoneNumber' => $request->phone,
            'notificationURL' => route('payment.investiseur.success'),
            'returnURL'  => route('payment.investiseur.success'),
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

    // Cette méthode met à jour le statut du paiement
    public function PaymentStatus(Request $request)
    {
        $responseCode = $request->input('responsecode');
        $transactionId = $request->input('transaction_id');
        $soutien = Investisseur::find($transactionId);

        if (!$soutien) {
            return redirect()->route('payment.failed')->with('error', 'Commande non trouvée.');
        }

        if ($responseCode == 0) {
            // Le paiement a réussi
            $soutien->update(['status' => 'succès']);
            return redirect()->route('payment.success')->with('success', 'Commande validée avec succès.');
        }

        // Le paiement a échoué
        $soutien->update(['status' => 'échec']);
        return redirect()->route('payment.failed')->with('error', 'Le paiement a échoué.');
    }
}
