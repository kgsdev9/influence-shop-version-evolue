<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\PubBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeblogs = PubBlog::all();
        return view('dashboard.blogs.index', compact('listeblogs'));
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

    // Méthode pour créer une nouvelle publicité
    private function createPubBlog(Request $request)
    {
        $pubBlog = PubBlog::create([
            'title' => $request->title,
            'mini_description' => $request->mini_description,
            'description' => $request->description,
            'temps_lecture' => $request->temps_lecture,
        ]);

        return response()->json([
            'message' => 'Publicité créée avec succès.',
            'blog' => $pubBlog
        ], 201);
    }

    // Méthode pour mettre à jour une publicité existante
    private function updatePubBlog(PubBlog $pubBlog, Request $request)
    {
        $data = [
            'title' => $request->title,
            'mini_description' => $request->mini_description,
            'description' => $request->description,
            'temps_lecture' => $request->temps_lecture,
        ];

        $pubBlog->update($data);

        return response()->json([
            'message' => 'Publicité mise à jour avec succès.',
            'blog' => $pubBlog
        ], 200);
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
