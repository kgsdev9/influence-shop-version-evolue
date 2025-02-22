<?php

namespace App\Http\Controllers\Gestion;

use App\Http\Controllers\Controller;
use App\Models\CompagnePromotionEntreprise;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class GestionCompagneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listecompanges = CompagnePromotionEntreprise::with('entreprise')->get();
        $listeentreprise = Entreprise::all();

        return view('dashboard.compagnes.index', compact('listecompanges', 'listeentreprise'));
    }


    public function store(Request $request)
    {
        // Vérifier si l'id de la campagne existe dans la requête
        $compagneId = $request->input('compagne_promotion_id');

        if ($compagneId) {
            // Si compagne_promotion_id existe, on modifie la campagne
            $compagne = CompagnePromotionEntreprise::find($compagneId);

            // Si la campagne n'existe pas, la créer
            if (!$compagne) {
                return $this->createCompagnePromotion($request);
            }

            return $this->updateCompagnePromotion($compagne, $request);
        } else {
            // Si compagne_promotion_id n'existe pas, créer la campagne
            return $this->createCompagnePromotion($request);
        }
    }

    private function updateCompagnePromotion($compagne, Request $request)
    {
        // Mettre à jour la campagne sans validation
        $data = $request->only(['title', 'entreprise_id', 'description', 'status', 'url_promotion']);

        // Mettre à jour la campagne
        $compagne->update($data);

        return response()->json([
            'message' => 'Campagne promotion mise à jour avec succès',
            'compagne' => $compagne
        ], 200);
    }

    private function createCompagnePromotion(Request $request)
    {
        // Créer la nouvelle campagne sans validation
        $data = $request->only(['title', 'entreprise_id', 'description', 'status', 'url_promotion']);

        // Créer la campagne
        $compagne = CompagnePromotionEntreprise::create($data);

        return response()->json([
            'message' => 'Campagne promotion créée avec succès',
            'compagne' => $compagne
        ], 201);
    }

    public function destroy($id)
    {
        try {
            // Trouver la campagne par ID
            $compagne = CompagnePromotionEntreprise::findOrFail($id);

            // Supprimer la campagne
            $compagne->delete();

            return response()->json([
                'success' => true,
                'message' => 'Campagne promotion supprimée avec succès.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Campagne promotion introuvable.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la campagne promotion.'
            ], 500);
        }
    }
}
