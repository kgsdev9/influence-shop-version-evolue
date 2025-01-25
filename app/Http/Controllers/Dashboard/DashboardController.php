<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        // Vérifie si l'utilisateur est connecté et son rôle
        if (Auth::check()) {
            // Récupérer l'utilisateur
            $user = Auth::user();

            // Initialiser les variables
            $orders = [];
            $products = [];

            // Si l'utilisateur a le rôle 'utilisateur'
            if ($user->role->name == "utilisateur") {
                // Filtrer les commandes pour cet utilisateur
                $orders = Order::where('user_id', $user->id)->get();

                // Filtrer les produits pour cet utilisateur
                $products = Product::where('user_id', $user->id)->get();
            } else {
                // Sinon, récupérer toutes les commandes et produits
                $orders = Order::all();
                $products = Product::all();
            }

            // Retourner la vue du dashboard avec les commandes et produits filtrés
            return view('dashboard.base.base', compact('orders', 'products'));
        }

        // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
        return redirect()->route('login');
    }
}
