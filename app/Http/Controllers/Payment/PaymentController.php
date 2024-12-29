<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function initialisePayment(Request $request)
    {
        // Préparation des données pour la requête
        $data = [
            'merchantId' => "PP-F2197",
            'amount' => '34535',
            'description' => '344',
            'channel' => 'ORANGE CI',
            'countryCurrencyCode' => "952",
            'referenceNumber' => "REF-" . time(),
            'customerEmail' => 'kgsdev8@gmail.com',
            'customerFirstName' => 'stephane',
            'customerLastname' => 'kgs',
            'customerPhoneNumber' => '+225076789776',
            'notificationURL' => route('payment.success'),
            'returnURL' => route('payment.failed'),
            'returnContext' => '',
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

   
}
