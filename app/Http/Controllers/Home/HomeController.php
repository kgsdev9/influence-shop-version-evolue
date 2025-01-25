<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Compagne;
use App\Models\Country;
use App\Models\PaymentAdresse;
use App\Models\PriceDeliveryByCountry;
use App\Models\Product;
use App\Models\PubBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Affichage d'une ressource spécifique .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupère tous les produits avec leurs images
        $listeproduct = Product::with('images')->get();

        // Récupère toutes les catégories qui ont des produits associés
        $categories = Category::has('products')->get();

        // Récupère toutes les campagnes (compagnes)
        $compagnes = Compagne::all();

        // Retourne la vue avec les données nécessaires
        return view('welcome', compact('listeproduct', 'compagnes', 'categories'));
    }


    public function cart()
    {
        return view('home.cart');
    }



    public function homeCompagne()
    {
        $compagnes = Compagne::with('product')->get();
        $categories  = Category::all();
        return view('home.compagne', compact('compagnes', 'categories'));
    }

    public function detailCompagne()
    {
        $compagnes = Compagne::with('product')->get();
        $categories  = [];
        return view('home.detailcompagne', compact('compagnes', 'categories'));
    }






    public function homeProduct()
    {
        $listeproduct = Product::with('images')->get();
        $categories = Category::has('products')->get();
        return view('home.product', compact('listeproduct', 'categories'));
    }

    public function homeBlog()
    {
        $listepub = PubBlog::all();
        return view('home.blog', compact('listepub'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $listedeveliryPriceByCountries = PriceDeliveryByCountry::all();
        $allCountries  = Country::all();
        $allAdressePayment = PaymentAdresse::where('user_id', Auth::user()->id)->get();

        return view('home.buy', compact('product', 'allCountries', 'listedeveliryPriceByCountries', 'allAdressePayment'));
    }

    public function showProduct($id)
    {
        $product = Product::with(['images', 'sizes', 'colors'])->findOrFail($id);
        $listedeveliryPriceByCountries = PriceDeliveryByCountry::all();
        $allCountries  = Country::all();
        $allAdressePayment = [];

        return view('home.productdetail', compact('product', 'allCountries', 'listedeveliryPriceByCountries', 'allAdressePayment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
