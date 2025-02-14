<?php

namespace App\Http\Controllers\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Compagne;
use App\Models\Entreprise;
use App\Models\Product;
use App\Models\User;
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
        $listecompanges = Compagne::with(['user', 'product'])->get();
        $listeproducts = Product::all();
        $listeentreprise = User::all();
        return view('dashboard.compagnes.index', compact('listecompanges', 'listeproducts', 'listeentreprise'));
    }


    public function store(Request $request)
    {
        $compagneId = $request->input('compagne_id');
        if ($compagneId) {
            // Si compagne_id existe, on modifie la campagne
            $compagne = Compagne::find($compagneId);

            // Si la campagne n'existe pas, créer une nouvelle campagne
            if (!$compagne) {
                return $this->createCompagne($request);
            }

            return $this->updateCompagne($compagne, $request);
        } else {
            // Créer une nouvelle campagne
            return $this->createCompagne($request);
        }
    }

    private function updateCompagne($compagne, Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_budget' => $request->total_budget,
            'user_id' => $request->entreprise_id,
            'product_id' => $request->product_id,
        ];

        $compagne->update($data);

        $compagne->load(['user', 'product']);

        return response()->json(['message' => 'Compagne mise à jour avec succès', 'compagne' => $compagne], 200);
    }

    private function createCompagne(Request $request)
    {
        $compagne = Compagne::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_budget' => $request->total_budget,
            'user_id' => $request->entreprise_id,
            'product_id' => $request->product_id,
        ]);

        $compagne->load(['user', 'product']);

        return response()->json(['message' => 'Compagne créée avec succès', 'compagne' => $compagne], 201);
    }

    public function destroy($id)
    {
        try {
            $compagne = Compagne::findOrFail($id);
            $compagne->delete();
            return response()->json([
                'success' => true,
                'message' => 'compagne supprimé avec succès.',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'compagne introuvable.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la compagne.',
            ], 500);
        }
    }
}
