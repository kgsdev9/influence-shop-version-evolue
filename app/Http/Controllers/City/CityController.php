<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('dashboard.villes.index', compact('cities'));
    }

    public function store(Request $request)
    {

        // Vérifier si product_id existe dans la requête
        $cityId = $request->input('city_id');

        if ($cityId) {
            // Si product_id existe, on modifie le produit
            $city = City::find($cityId);

            // Si le produit n'existe pas, le créer
            if (!$city) {

                return $this->creatCity($request);
            }


            return $this->updateCity($city, $request);
        } else {

            return $this->creatCity($request);
        }
    }


    private function updateCity($city, Request $request)
    {
        $data = [
            'name' => $request->name,
        ];

        $city->update($data);
        return response()->json(['message' => 'Ville adresse mis à jour avec succès', 'city' => $city], 200);
    }

    private function creatCity(Request $request)
    {
        $city = City::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Ville créé avec succès', 'city' => $city], 201);
    }

    public function destroy($id)
    {
        try {

            $city = City::findOrFail($id);

            $city->delete();

            return response()->json([
                'success' => true,
                'message' => 'City supprimé avec succès.',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'City introuvable.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du produit.',
            ], 500);
        }
    }
}
