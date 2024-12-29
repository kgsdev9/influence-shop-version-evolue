<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Enregistrer le produit sans les fichiers
        $product = new Product();
        $product->name = $request->product_name;
        $product->price_achat = $request->product_price;
        $product->price_vente = $request->product_price;
        $product->description = $request->product_description;
        $product->shortdescription = $request->product_description;
        $product->qtedisponible = $request->qtedispo;
        $product->category_id = $request->product_category;
        $product->save();

        // Si des fichiers sont envoyés, les traiter
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Déplacer chaque fichier dans le répertoire 'products'
                $path = $file->store('products', 'public'); // Stockage dans 'storage/app/public/products'

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
