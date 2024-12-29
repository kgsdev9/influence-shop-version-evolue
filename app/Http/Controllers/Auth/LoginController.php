<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
       
        // Vérification des informations d'identification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentification réussie, obtenir l'utilisateur
            $user = Auth::user();

            // Renvoi de la réponse en JSON
            return response()->json([
                'message' => 'Connexion réussie',
                'user' => $user,
            ], 200);
        }

        // Si l'authentification échoue
        return response()->json([
            'message' => 'Identifiants invalides',
        ], 401);
    }
}
