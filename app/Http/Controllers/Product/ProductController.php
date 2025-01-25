<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Couleur;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Taille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role->name == "utilisateur")
        {
            $products = Product::with(['category', 'images'])
                ->where('user_id', Auth::user()->id)
                ->get();
        } else {
            // Sinon, on renvoie tous les produits
            $products = Product::with(['category', 'images'])->get();
        }


        return view('dashboard.products.liste', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $allCategories = Category::all();
        return view('product.add', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();
        $product->name = $request->product_name;
        $product->price_achat = $request->product_price;
        $product->price_vente = $request->product_price;
        $product->minimale_description = $request->product_description;
        $product->shortdescription = $request->product_description;
        $product->qtedisponible = $request->qtedispo;
        $product->category_id = $request->product_category;
        $product->user_id = Auth::user()->id;
        $product->save();

        // Enregistrer les couleurs si elles existent
        if ($request->has('colors')) {


            foreach ($request->colors as $color) {
                Couleur::create([
                    'name' => $color ?? '',
                    'product_id' => $product->id,
                ]);
            }
        }

        // Enregistrer les tailles si elles existent
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                Taille::create([
                    'name' => $size,
                    'product_id' => $product->id,
                ]);
            }
        }

        // Si des fichiers sont envoyés, les traiter
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {

                $originalName = $file->getClientOriginalName();

                // Déplacer chaque fichier dans le répertoire 'products'
                $path = $file->storeAs('products',  $originalName); // Stockage dans 'storage/app/public/products'

                // Enregistrer les informations du fichier dans la table ProductImage
                ProductImage::create([
                    'product_id' => $product->id,
                    'imagename' => $path, // Le chemin du fichier
                ]);
            }
        }

        return response()->json(['message' => 'Produit ajouté avec succès']);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::with('images')->findOrFail($id);
        $allCategories = Category::all();   // Récupère toutes les catégories
        return view('product.edit', compact('product', 'allCategories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Trouver le produit à supprimer
            $product = Product::findOrFail($id);

            // Supprimer les images associées au produit
            foreach ($product->images as $image) {
                // Supprimer l'image du répertoire 'public/products'
                Storage::delete('public/products/' . $image->imagename);

                // Supprimer l'enregistrement de l'image dans la base de données
                $image->delete();
            }

            // Supprimer le produit
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produit et images supprimés avec succès !',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la suppression du produit.',
            ], 500);
        }
    }
}
