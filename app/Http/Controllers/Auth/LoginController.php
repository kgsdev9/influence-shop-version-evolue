<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->only(['login', 'loginUser']);
    }


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

            // Vérification si le compte est confirmé (confirmed_at est non nul)
            if ($user->confirmed_at) {
                // Le compte est confirmé, on le connecte
                return response()->json([
                    'message' => 'Connexion réussie',
                    'user' => $user,
                ], 200);
            }

            // Si le compte n'est pas confirmé
            Auth::logout();
            return response()->json([
                'message' => 'Votre compte n\'a pas encore été activé.',
            ], 403);
        }

        // Si l'authentification échoue
        return response()->json([
            'message' => 'Identifiants invalides',
        ], 401);
    }
}
