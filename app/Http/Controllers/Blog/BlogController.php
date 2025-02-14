<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\City;
use App\Models\Country;
use App\Models\PubBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeblogs = PubBlog::with(['country', 'city']);
        $listepays = Country::all();
        $listevilles = City::all();

        return view('dashboard.blogs.index', compact('listeblogs', 'listepays', 'listevilles'));
    }


    public function store(Request $request)
    {

        // Vérifier si pub_blog_id existe dans la requête
        $pubBlogId = $request->input('pub_blog_id');

        if ($pubBlogId) {
            // Si pub_blog_id existe, on modifie la publicité
            $pubBlog = PubBlog::find($pubBlogId);

            // Si la publicité n'existe pas, la créer
            if (!$pubBlog) {
                return $this->createPubBlog($request);
            }

            return $this->updatePubBlog($pubBlog, $request);
        } else {
            return $this->createPubBlog($request);
        }
    }



   

    private function createPubBlog(Request $request)
    {
        // Gérer l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Récupère le nom original du fichier
            $originalName = $image->getClientOriginalName();

            // Stocke l'image dans le dossier 'blogs' et utilise le nom original
            $imagePath = $image->storeAs('blogs', $originalName);
        }

        // Créer la publicité avec les données (incluant les nouveaux champs)
        $pubBlog = PubBlog::create([
            'title' => $request->title,
            'mini_description' => $request->mini_description,
            'description' => $request->description,
            'temps_lecture' => $request->temps_lecture ?? 10,
            'price' => $request->price,
            'date_event_debut' => $request->date_event_debut,
            'date_event_fin' => $request->date_event_fin,
            'image' => $imagePath,
            'codeblog' => $request->codeblog ?? $this->generateUniqueCodeBlog(),  // Si le codeblog n'est pas fourni, on le génère
            'organisateur' => $request->organisateur,
            'lieu' => $request->lieu,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
        ]);

        return response()->json([
            'message' => 'Publicité créée avec succès.',
            'blog' => $pubBlog
        ], 201);
    }

    // Méthode pour mettre à jour une publicité existante
    private function updatePubBlog(PubBlog $pubBlog, Request $request)
    {
        // Préparer les données de mise à jour
        $data = [
            'title' => $request->title,
            'mini_description' => $request->mini_description,
            'description' => $request->description,
            'temps_lecture' => $request->temps_lecture,
            'price' => $request->price,
            'date_event_debut' => $request->date_event_debut,
            'date_event_fin' => $request->date_event_fin,
            'organisateur' => $request->organisateur,
            'lieu' => $request->lieu,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'codeblog' => $request->codeblog,
        ];

        // Mettre à jour l'image si un fichier est fourni
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('blogs', $originalName);
            $data['image'] = $imagePath; // Mise à jour du chemin de l'image
        }

        // Mettre à jour la publicité avec les nouvelles données
        $pubBlog->update($data);

        return response()->json([
            'message' => 'Publicité mise à jour avec succès.',
            'blog' => $pubBlog
        ], 200);
    }




    private function generateUniqueCodeBlog()
    {
        // Boucle pour garantir l'unicité du codeproduct
        do {
            // Générer un codeproduct unique
            $codeproduct = 'pub-' . Str::uuid()->toString();

            // Vérifier si ce codeproduct existe déjà
            $existingProduct = PubBlog::where('codeblog', $codeproduct)->first();
        } while ($existingProduct); // Si ce code existe, refaire la boucle

        return $codeproduct;
    }
    // Méthode pour supprimer une publicité
    public function destroy($id)
    {
        try {
            $pubBlog = PubBlog::findOrFail($id);
            $pubBlog->delete();

            return response()->json([
                'success' => true,
                'message' => 'Publicité supprimée avec succès.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Publicité introuvable.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la publicité.'
            ], 500);
        }
    }
}
