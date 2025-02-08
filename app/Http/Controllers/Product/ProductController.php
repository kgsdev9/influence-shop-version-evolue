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
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role->name == "utilisateur") {
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
        $listetailles = Taille::all();
        $listecouleurs = Couleur::all();
        return view('product.add', compact('allCategories', 'listetailles', 'listecouleurs'));
    }


    public function store(Request $request)
    {

        // Vérifier si un product_id existe dans la requête
        $productId = $request->input('product_id');

        if ($productId) {
            // Si product_id existe, on cherche le produit à modifier
            $product = Product::find($productId);


            // Si le produit n'existe pas, renvoyer une erreur
            if (!$product) {


                return $this->createProduct($request);
            }

            // Mettre à jour le produit
            return $this->updateProduct($product, $request);
        } else {


            // Si product_id est null, créer un nouveau produit
            return $this->createProduct($request);
        }
    }

    private function updateProduct($product, Request $request)
    {

        // Mettre à jour les informations du produit
        $product->update([
            'name' => $request->product_name,
            'price_achat' => $request->product_price,
            'price_vente' => $request->product_price,
            'shortdescription' => $request->product_description,
            'description' => $request->product_description,
            'qtedisponible' => $request->qtedispo,
            'category_id' => $request->product_category,
            'user_id' => Auth::user()->id,
        ]);



        // Supprimer les anciennes images et les recréer
        $product->images()->delete();  // Suppression des anciennes images

        // Traiter et ajouter les nouvelles images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {
                $originalName = $file->getClientOriginalName();
                $path = $file->storeAs('products', $originalName);  // Stockage dans 'storage/app/public/products'
                ProductImage::create([
                    'product_id' => $product->id,
                    'imagename' => $path,  // Le chemin du fichier
                ]);
            }
        }

        return response()->json(['message' => 'Produit mis à jour avec succès']);
    }


    private function generateUniqueCodeProduct()
    {
        // Boucle pour garantir l'unicité du codeproduct
        do {
            // Générer un codeproduct unique
            $codeproduct = 'c-' . Str::uuid()->toString();

            // Vérifier si ce codeproduct existe déjà
            $existingProduct = Product::where('codeproduct', $codeproduct)->first();
        } while ($existingProduct); // Si ce code existe, refaire la boucle

        return $codeproduct;
    }



    private function createProduct(Request $request)
    {
        // Créer un nouveau produit
        $product = Product::create([
            'name' => $request->product_name,
            'price_achat' => $request->product_price,
            'codeproduct' => $this->generateUniqueCodeProduct(),
            'price_vente' => $request->product_price,
            'description' => $request->product_description,
            'shortdescription' => $request->product_description,
            'qtedisponible' => $request->qtedispo,
            'category_id' => $request->product_category,
            'couleur_id' => $request->product_color,
            'taille_id' => $request->product_size,
            'poids' => $request->product_weight,
            'user_id' => Auth::user()->id,
        ]);

        // Si des fichiers sont envoyés, les traiter
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $path = $file->storeAs('products', $originalName);  // Stockage dans 'storage/app/public/products'
                ProductImage::create([
                    'product_id' => $product->id,
                    'imagename' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Produit ajouté avec succès']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {





    //     "product_id" => "null"


    //     $product = new Product();
    //     $product->name = $request->product_name;
    //     $product->price_achat = $request->product_price;
    //     $product->price_vente = $request->product_price;
    //     $product->minimale_description = $request->product_description;
    //     $product->shortdescription = $request->product_description;
    //     $product->qtedisponible = $request->qtedispo;
    //     $product->category_id = $request->product_category;
    //     $product->user_id = Auth::user()->id;
    //     $product->save();

    //     // Enregistrer les couleurs si elles existent
    //     if ($request->has('colors')) {


    //         foreach ($request->colors as $color) {
    //             Couleur::create([
    //                 'name' => $color ?? '',
    //                 'product_id' => $product->id,
    //             ]);
    //         }
    //     }

    //     // Enregistrer les tailles si elles existent
    //     if ($request->has('sizes')) {
    //         foreach ($request->sizes as $size) {
    //             Taille::create([
    //                 'name' => $size,
    //                 'product_id' => $product->id,
    //             ]);
    //         }
    //     }

    //     // Si des fichiers sont envoyés, les traiter
    //     if ($request->hasFile('files')) {
    //         foreach ($request->file('files') as $file) {

    //             $originalName = $file->getClientOriginalName();

    //             // Déplacer chaque fichier dans le répertoire 'products'
    //             $path = $file->storeAs('products',  $originalName); // Stockage dans 'storage/app/public/products'

    //             // Enregistrer les informations du fichier dans la table ProductImage
    //             ProductImage::create([
    //                 'product_id' => $product->id,
    //                 'imagename' => $path, // Le chemin du fichier
    //             ]);
    //         }
    //     }

    //     return response()->json(['message' => 'Produit ajouté avec succès']);
    // }





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



    public function update(Request $request, $id)
    {
        dd($request->all());
        // Trouver le produit
        $product = Product::findOrFail($id);

        // Mettre à jour les informations du produit
        $product->name = $request->product_name;
        $product->price_achat = $request->product_price;
        $product->price_vente = $request->product_price;
        $product->minimale_description = $request->product_description;
        $product->shortdescription = $request->product_description;
        $product->qtedisponible = $request->qtedispo;
        $product->category_id = $request->product_category;
        $product->user_id = Auth::user()->id;
        $product->save();

        // Supprimer les anciennes couleurs
        $product->couleurs()->delete(); // Assumons que la relation est définie dans le modèle Product

        // Supprimer les anciennes tailles
        $product->tailles()->delete(); // Idem pour la relation tailles

        // Supprimer les anciennes images
        $product->images()->delete(); // Idem pour la relation images

        // Enregistrer les nouvelles couleurs si elles existent
        if ($request->has('colors')) {
            foreach ($request->colors as $color) {
                Couleur::create([
                    'name' => $color ?? '',
                    'product_id' => $product->id,
                ]);
            }
        }

        // Enregistrer les nouvelles tailles si elles existent
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                Taille::create([
                    'name' => $size,
                    'product_id' => $product->id,
                ]);
            }
        }

        // Si de nouveaux fichiers sont envoyés, les traiter
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

        return response()->json(['message' => 'Produit mis à jour avec succès']);
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
