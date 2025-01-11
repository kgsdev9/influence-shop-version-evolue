<?php

namespace App\Http\Controllers\DeliveryPrice;

use App\Http\Controllers\Controller;
use App\Models\PriceDeliveryByCountry;
use Illuminate\Http\Request;

class DeliveryPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $PriceDeliveryByCountry = PriceDeliveryByCountry::all();
        return view('dashboard.deliveryprice.index', compact('PriceDeliveryByCountry'));
    }


    public function store(Request $request)
    {
        $deliveryId = $request->input('delivery_id');
        if ($deliveryId) {
            // Si product_id existe, on modifie le produit
            $city = PriceDeliveryByCountry::find($deliveryId);

            // Si le produit n'existe pas, le créer
            if (!$city) {

                return $this->createDelivery($request);
            }


            return $this->updateDelivery($city, $request);
        } else {

            return $this->createDelivery($request);
        }
    }


    private function updateDelivery($delivery, Request $request)
    {
        $data = [
            'country_start' => $request->country_start,
            'country_destination' => $request->country_destination,
            'prix' => $request->prix,
        ];

        $delivery->update($data);
        return response()->json(['message' => 'Livraison mis à jour avec succès', 'delivery' => $delivery], 200);
    }

    private function createDelivery(Request $request)
    {
        $delivery = PriceDeliveryByCountry::create([
            'country_start' => $request->country_start,
            'country_destination' => $request->country_destination,
            'prix' => $request->prix,
        ]);

        return response()->json(['message' => 'Livraison créé avec succès', 'delivery' => $delivery], 201);
    }

    public function destroy($id)
    {
        try {
            $delivery = PriceDeliveryByCountry::findOrFail($id);
            $delivery->delete();
            return response()->json([
                'success' => true,
                'message' => 'Delivery supprimé avec succès.',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Delivery introuvable.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la livraison.',
            ], 500);
        }
    }
}
