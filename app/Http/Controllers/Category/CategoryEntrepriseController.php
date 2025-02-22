<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryEntreprise;
use Illuminate\Http\Request;

class CategoryEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listecategoryentreprise = CategoryEntreprise::all();
        return view('dashboard.categorieentreprise.index', compact('listecategoryentreprise'));
    }

    public function store(Request $request)
    {
        // Vérifier si l'id de la catégorie existe dans la requête
        $categoryId = $request->input('category_entreprise_id');

        if ($categoryId) {
            // Si category_entreprise_id existe, on modifie la catégorie
            $category = CategoryEntreprise::find($categoryId);

            // Si la catégorie n'existe pas, la créer
            if (!$category) {
                return $this->createCategory($request);
            }

            return $this->updateCategory($category, $request);
        } else {
            // Si category_entreprise_id n'existe pas, créer la catégorie
            return $this->createCategory($request);
        }
    }

    private function updateCategory($category, Request $request)
    {
        // Mettre à jour la catégorie sans validation
        $data = $request->only(['name']);

        // Mettre à jour la catégorie
        $category->update($data);

        return response()->json([
            'message' => 'Catégorie mise à jour avec succès',
            'category' => $category
        ], 200);
    }

    private function createCategory(Request $request)
    {
        // Créer la nouvelle catégorie sans validation
        $data = $request->only(['name']);

        // Créer la catégorie
        $category = CategoryEntreprise::create($data);

        return response()->json([
            'message' => 'Catégorie créée avec succès',
            'category' => $category
        ], 201);
    }

    public function destroy($id)
    {
        try {
            // Trouver la catégorie par ID
            $category = CategoryEntreprise::findOrFail($id);

            // Supprimer la catégorie
            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Catégorie supprimée avec succès.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie introuvable.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la catégorie.'
            ], 500);
        }
    }
}
