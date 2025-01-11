<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('dashboard.pays.index', compact('countries'));
    }


    public function store(Request $request)
    {

        // Vérifier si product_id existe dans la requête
        $countryId = $request->input('country_id');

        if ($countryId) {
            // Si product_id existe, on modifie le produit
            $countryId = Country::find($countryId);

            // Si le produit n'existe pas, le créer
            if (!$countryId) {

                return $this->creatCountry($request);
            }


            return $this->updateCountry($countryId, $request);
        } else {

            return $this->creatCountry($request);
        }
    }


    private function updateCountry($country, Request $request)
    {
        $data = [
            'name' => $request->name,
        ];

        $country->update($data);
        return response()->json(['message' => 'Pays mis à jour avec succès', 'country' => $country], 200);
    }

    private function creatCountry(Request $request)
    {
        $country = Country::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Ville créé avec succès', 'country' => $country], 201);
    }

    public function destroy($id)
    {
        try {

            $city = country::findOrFail($id);
            $city->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pays supprimé avec succès.',
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
