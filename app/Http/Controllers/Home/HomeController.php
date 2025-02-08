<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Category;
use App\Models\Compagne;
use App\Models\Couleur;
use App\Models\Country;
use App\Models\Order;
use App\Models\PaymentAdresse;
use App\Models\PriceDeliveryByCountry;
use App\Models\Product;
use App\Models\PubBlog;
use App\Models\Taille;
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
        $listeproduct = Product::with(['images', 'taille', 'color'])->get();


        // Récupère toutes les catégories qui ont des produits associés
        $categories = Category::has('products')->get();

        // Récupère toutes les campagnes (compagnes)
        $compagnes = Compagne::all();

        $listepub = PubBlog::all();
        // Retourne la vue avec les données nécessaires
        return view('welcome', compact('listeproduct', 'compagnes', 'categories', 'listepub'));
    }


    public function contact()
    {
        return view('home.contact');
    }

    public function sommaireCmde()
    {
        $allAdressePayment = PaymentAdresse::where('user_id', Auth::user()->id)->get();
        $cart = session()->get('cart', []);
        $totalWeight = 0;
        $totalValue = 0;

        foreach ($cart as $product) {
            $totalWeight += $product['total_weight'];
            $totalValue += $product['total_value'];
        }
        return view('home.orders', [
            'cart' => $cart,
            'totalWeight' => $totalWeight,
            'totalValue' => $totalValue,
            'allAdressePayment' => $allAdressePayment,

        ]);
    }







    public function about()
    {
        return view('home.about');
    }

    public function programmeAffiliation()
    {
        $listeabonnement = Abonnement::all();
        return view('dashboard.affiliation.listeabonnementaffiliation', compact('listeabonnement'));
    }

    public function deliveryStatus()
    {

        return view('home.statusorders');
    }



    public function homeCompagne()
    {
        $compagnes = Compagne::with('product.images')->get();
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
        $listeproduct = Product::with(['images', 'taille', 'color'])->get();

        $categories = Category::has('products')->get();
        $colors = Couleur::has('products')->get();
        $tailles = Taille::has('products')->get();

        return view('home.product', compact('listeproduct', 'categories', 'colors', 'tailles'));
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
    public function buyProduct($codeproduct)
    {
        $product = Product::with('images')->where('codeproduct', $codeproduct)->first();;
        $listedeveliryPriceByCountries = PriceDeliveryByCountry::all();
        $allCountries  = Country::all();
        $allAdressePayment = PaymentAdresse::where('user_id', Auth::user()->id)->get();

        return view('home.buy', compact('product', 'allCountries', 'listedeveliryPriceByCountries', 'allAdressePayment'));
    }





    public function detailBlog($codeproduct)
    {
        $detailblog = PubBlog::where('codeblog', $codeproduct)->first();


        return view('home.detailblog', compact('detailblog'));
    }
    public function showProduct($codeproduct)
    {
        $product = Product::with(['images', 'taille', 'color'])->where('codeproduct', $codeproduct)->first();

        $allCountries  = Country::all();
        $allAdressePayment = [];

        return view('home.productdetail', compact('product', 'allCountries', 'allAdressePayment'));
    }
}
