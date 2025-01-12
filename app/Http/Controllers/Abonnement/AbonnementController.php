<?php

namespace App\Http\Controllers\Abonnement;

use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeabonnement = Abonnement::all();

        return view('dashboard.planabonnement.index', compact('listeabonnement'));
    }


    public function store(Request $request)
    {
        $abonnementId = $request->input('abonnement_id');
        if ($abonnementId) {
            // Si abonnement_id existe, on modifie l'abonnement
            $abonnement = Abonnement::find($abonnementId);

            // Si l'abonnement n'existe pas, créer un nouvel abonnement
            if (!$abonnement) {
                return $this->createAbonnement($request);
            }

            return $this->updateAbonnement($abonnement, $request);
        } else {
            // Créer un nouvel abonnement
            return $this->createAbonnement($request);
        }
    }

    private function updateAbonnement($abonnement, Request $request)
    {
        $data = [
            'libelle' => $request->libelle,
            'price' => $request->prix,
            'description' => $request->description,
        ];

        $abonnement->update($data);
        return response()->json(['message' => 'Abonnement mis à jour avec succès', 'abonnement' => $abonnement], 200);
    }

    private function createAbonnement(Request $request)
    {
        $abonnement = Abonnement::create([
            'libelle' => $request->libelle,
            'price' => $request->prix,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Abonnement créé avec succès', 'abonnement' => $abonnement], 201);
    }
}
