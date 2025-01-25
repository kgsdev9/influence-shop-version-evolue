<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->only(['formResetPassword', 'sendVerificationEmail', 'verifyCodeEmail', 'resetPassword']);
    }


    public function formResetPassword()
    {
        return view('auth.resetpassword');
    }

    // Fonction pour envoyer un email avec le code de vérification
    public function sendVerificationEmail(Request $request)
    {
        // Chercher l'utilisateur par email
        $user = User::where('email', $request->email)->first();

        // Si l'utilisateur n'existe pas, retourner une erreur
        if (!$user) {
            return response()->json([
                'message' => 'L\'adresse email n\'existe pas.',
            ], 404);
        }

        // Générer un code de vérification
        $verificationCode = Str::random(6); // Code aléatoire de 6 caractères
        $expirationTime = Carbon::now()->addMinutes(5); // Le code expire dans 5 minutes

        // Sauvegarder le code de vérification et son expiration dans le cache
        Cache::put('verification_code_' . $user->id, $verificationCode, $expirationTime);

        // Envoyer l'email avec le code de vérification
        Mail::to($user->email)->send(new \App\Mail\ResetPasswordMail($verificationCode));

        return response()->json([
            'message' => 'Un code de vérification a été envoyé à votre adresse email.',
        ]);
    }

    // Fonction pour vérifier le code envoyé par email
    public function verifyCodeEmail(Request $request)
    {


        // Chercher l'utilisateur par email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'L\'adresse email n\'existe pas.',
            ], 404);
        }

        // Vérifier si le code de vérification est correct
        $cacheKey = 'verification_code_' . $user->id;
        $cachedCode = Cache::get($cacheKey);

        if (!$cachedCode || $cachedCode !== $request->verificationCode) {
            return response()->json([
                'message' => 'Code de vérification incorrect ou expiré.',
            ], 400);
        }

        // Si le code est correct, on demande le nouveau mot de passe
        return response()->json([
            'message' => 'Code de vérification validé. Veuillez entrer un nouveau mot de passe.',
        ]);
    }

    // Fonction pour réinitialiser le mot de passe de l'utilisateur
    public function resetPassword(Request $request)
    {

        // Chercher l'utilisateur par email
        $user = User::where('email', $request->email)->first();


        if (!$user) {
            return response()->json([
                'message' => 'L\'adresse email n\'existe pas.',
            ], 404);
        }

        // Vérifier si le code de vérification est correct
        $cacheKey = 'verification_code_' . $user->id;
        $cachedCode = Cache::get($cacheKey);

      

        if (!$cachedCode || $cachedCode !== $request->verificationCode) {
            return response()->json([
                'message' => 'Code de vérification incorrect ou expiré.',
            ], 400);
        }

        // Mettre à jour le mot de passe de l'utilisateur
        $user->password = Hash::make($request->password);
        $user->save();

        // Effacer le code de vérification après usage
        Cache::forget($cacheKey);

        return response()->json([
            'message' => 'Votre mot de passe a été réinitialisé avec succès.',
        ]);
    }
}
