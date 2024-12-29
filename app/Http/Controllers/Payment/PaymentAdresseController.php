<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\PaymentAdresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentAdresseController extends Controller
{

    public function store(Request $request)
    {

        // Vérifier si product_id existe dans la requête
        $adresseId = $request->input('adresse_id');

        if ($adresseId) {
            // Si product_id existe, on modifie le produit
            $adresse = PaymentAdresse::find($adresseId);

            // Si le produit n'existe pas, le créer
            if (!$adresse) {

                return $this->creatAdresse($request);
            }


            return $this->updateAdresse($adresse, $request);
        } else {

            return $this->creatAdresse($request);
        }
    }


    private function updateAdresse($adresse, Request $request)
    {
        $data = [
            'telephone' => $request->telephone,
            'email' => Auth::user()->email,
            'adresse' => $request->adresse,
            'city' => $request->city,
            'user_id' => Auth::user()->id,
        ];


        $adresse->update($data);
        return response()->json(['message' => 'Payment adresse mis à jour avec succès', 'adresse' => $adresse], 200);
    }



    private function creatAdresse(Request $request)
    {

        $adresse = PaymentAdresse::create([
            'telephone' => $request->telephone,
            'email' => Auth::user()->email,
            'adresse' => $request->adresse,
            'city' => $request->city,
            'user_id' => Auth::user()->id,
        ]);



        return response()->json(['message' => 'Paiement adresse créé avec succès', 'adresse' => $adresse], 201);
    }


    public function destroy($id)
    {
        try {
            // Rechercher le produit par ID
            $adresse = PaymentAdresse::findOrFail($id);

            // Supprimer le produit
            $adresse->delete();

            return response()->json([
                'success' => true,
                'message' => 'Adresse supprimé avec succès.',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Adresse introuvable.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du Adresse.',
            ], 500);
        }
    }
}
