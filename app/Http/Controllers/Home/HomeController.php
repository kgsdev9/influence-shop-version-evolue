<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Compagne;
use App\Models\Country;
use App\Models\Order;
use App\Models\PaymentAdresse;
use App\Models\PriceDeliveryByCountry;
use App\Models\Product;
use App\Models\PubBlog;
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
        $listeproduct = Product::with(['images', 'sizes', 'colors'])->get();
        $categories = Category::has('products')->get();
        $sizes = $listeproduct->flatMap(function ($product) {
            return $product->sizes;
        })->unique('id');
        $colors = $listeproduct->flatMap(function ($product) {
            return $product->colors;
        })->unique('id');

        // Calculer le prix maximal
        $maxPrice = $listeproduct->max('price_vente');

        return view('home.product', compact('listeproduct', 'categories', 'sizes', 'colors', 'maxPrice'));
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

   
}
