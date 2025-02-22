<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\CategoryEntreprise;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Entreprise::all();
        $listeCategoryEntreprise = CategoryEntreprise::all();
        return view('dashboard.entreprises.index', compact('company', 'listeCategoryEntreprise'));
    }


    public function store(Request $request)
    {
        // Vérifier si l'id de l'entreprise existe dans la requête
        $companyId = $request->input('company_id');

        if ($companyId) {
            // Si company_id existe, on modifie l'entreprise
            $company = Entreprise::find($companyId);

            // Si l'entreprise n'existe pas, la créer
            if (!$company) {
                return $this->createCompany($request);
            }

            return $this->updateCompany($company, $request);
        } else {
            // Si company_id n'existe pas, créer l'entreprise
            return $this->createCompany($request);
        }
    }

    private function updateCompany($company, Request $request)
    {
        $data = $request->only([
            'nom',
            'email',
            'telephone',
            'adresse',
            'site_web',
            'logo',
            'description',
            'statut',
            'category_entreprise_id',
        ]);

        $company->update($data);

        return response()->json([
            'message' => 'Entreprise mise à jour avec succès',
            'company' => $company
        ], 200);
    }

    private function createCompany(Request $request)
    {
        $data = $request->only([
            'nom',
            'email',
            'telephone',
            'adresse',
            'site_web',
            'logo',
            'description',
            'statut',
            'category_entreprise_id',
        ]);

        $company = Entreprise::create($data);

        return response()->json([
            'message' => 'Entreprise créée avec succès',
            'company' => $company
        ], 201);
    }

    public function destroy($id)
    {
        try {
            $company = Entreprise::findOrFail($id);

            $company->delete();

            return response()->json([
                'success' => true,
                'message' => 'Entreprise supprimée avec succès.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Entreprise introuvable.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'entreprise.'
            ], 500);
        }
    }
}
