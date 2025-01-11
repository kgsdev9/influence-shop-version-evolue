<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }




    public function store(Request $request)
    {
        $categorId = $request->input('category_id');

        if ($categorId)
        {

            $categorId = Category::find($categorId);

            if (!$categorId)
            {
                return $this->creatCategory($request);
            }

            return $this->updateCategory($categorId, $request);
        } else {

            return $this->creatCategory($request);
        }
    }


    private function updateCategory($category, Request $request)
    {
        $data = [
            'name' => $request->name,
        ];

        $category->update($data);
        return response()->json(['message' => 'category mis à jour avec succès', 'category' => $category], 200);
    }

    private function creatCategory(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'category créé avec succès', 'category' => $category], 201);
    }


    public function destroy($id)
    {
        try {
            // Rechercher le produit par ID
            $categorie = Category::findOrFail($id);

            // Supprimer le produit
            $categorie->delete();

            return response()->json([
                'success' => true,
                'message' => 'Categories supprimé avec succès.',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Categories introuvable.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du Categories.',
            ], 500);
        }
    }
}
