<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class SearchController extends Controller
{
    // Afficher la vue de recherche
    public function index()
    {
        return view('search');
    }

    // Effectuer la recherche avec Goutte
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json(['message' => 'Query is required'], 400);
        }

        $client = new Client();

        // Construire l'URL de recherche TikTok
        $url = "https://www.tiktok.com/search?q=" . urlencode($query);

        try {
            // Faire une requête GET sur TikTok
            $crawler = $client->request('GET', $url);

            // Essayer de trouver des métadonnées ou des informations directement accessibles
            $results = $crawler->filter('meta')->each(function ($node) {
                $property = $node->attr('property');
                $content = $node->attr('content');

                // Extraire des données spécifiques si elles existent
                if ($property && $content) {
                    return [
                        'property' => $property,
                        'content' => $content,
                    ];
                }
                return null;
            });

            return response()->json(array_filter($results));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error while fetching data', 'error' => $e->getMessage()], 500);
        }
    }
}
