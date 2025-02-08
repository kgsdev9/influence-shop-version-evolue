<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    // public function getCart()
    // {
    //     // Récupérer le panier depuis la session
    //     $cart = session()->get('cart', []);

    //     // Retourner la  vue 'home.cart' avec les produits du panier
    //     return view('home.cart', ['cart' => $cart]);
    // }

    public function getCart()
    {
        // Récupérer le panier depuis la session
        $cart = session()->get('cart', []);

        // Calculer le poids total et la valeur du poids en euros
        $totalWeight = 0;
        $totalValue = 0;

        foreach ($cart as $product) {
            $totalWeight += $product['total_weight']; // Somme des poids
            $totalValue += $product['total_value'];   // Somme des valeurs en euros pour le poids
        }

        // Retourner la vue 'home.cart' avec les produits du panier et les calculs
        return view('home.cart', [
            'cart' => $cart,
            'totalWeight' => $totalWeight,
            'totalValue' => $totalValue,
        ]);
    }





    public function addToCart(Request $request)
    {
        $product = $request->input('product');

        // Calcul du poids total pour ce produit (poids * quantité)
        $product['total_weight'] = $product['weight'] * $product['quantity'];

        // Calcul de la valeur en euros du poids total (1 kg = 1 €)
        $product['total_value'] = $product['total_weight'] * 1;  // 1€ par kg


        // Récupérer le panier actuel de la session
        $cart = session()->get('cart', []);

        // Vérifier si le produit est déjà dans le panier
        $found = false;

        // Utiliser la référence (&$item) pour pouvoir modifier les éléments du panier
        foreach ($cart as &$item) { // Notice the reference (&$item)

            if ($item['id'] == $product['id']) {

                // Si le produit existe déjà, on met à jour la quantité
                $item['quantity'] += $product['quantity'];
                // Recalculer le poids et la valeur en euros après modification de la quantité
                $item['total_weight'] = $item['weight'] * $item['quantity'];
                $item['total_value'] = $item['total_weight'] * 1;  // 1€ par kg
                $found = true;
                break;
            }
        }

        // Si le produit n'est pas trouvé, on l'ajoute au panier
        if (!$found) {
            $cart[] = $product;
        }

        // Sauvegarder le panier dans la session
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }




    public function updateQuantity(Request $request)
    {
        $index = $request->input('index');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if ($cart[$index]) {
            // Limiter le nom du produit à 10 caractères lors de la mise à jour
            if (strlen($cart[$index]['name']) > 10) {
                $cart[$index]['name'] = substr($cart[$index]['name'], 0, 10) . '...';
            }

            // Mettre à jour la quantité
            $cart[$index]['quantity'] = $quantity;

            // Recalculer le poids et la valeur en euros après modification de la quantité
            $cart[$index]['total_weight'] = $cart[$index]['weight'] * $cart[$index]['quantity'];
            $cart[$index]['total_value'] = $cart[$index]['total_weight'] * 1;  // 1€ par kg (valeur de poids)

            // Recalculer le poids total de la commande et la valeur totale
            $totalWeight = 0;
            $totalValue = 0;
            foreach ($cart as $product) {
                $totalWeight += $product['total_weight'];  // Somme des poids
                $totalValue += $product['total_value'];    // Somme des valeurs
            }

            // Sauvegarder le panier dans la session
            session()->put('cart', $cart);

            // Renvoyer les nouvelles valeurs de poids et valeur
            return response()->json([
                'success' => true,
                'totalWeight' => $totalWeight,
                'totalValue' => $totalValue
            ]);
        }

        return response()->json(['success' => false]);
    }




    public function removeProduct(Request $request)
    {
        $index = $request->input('index');
        $cart = session()->get('cart', []);
        array_splice($cart, $index, 1);  // Supprimer le produit du panier
        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
}
