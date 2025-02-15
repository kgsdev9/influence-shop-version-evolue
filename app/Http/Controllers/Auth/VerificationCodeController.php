<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SendNotificationCodePromotion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VerificationCodeController extends Controller
{


    private function generateUsername()
    {
        // Utiliser la donnée 'name' directement à partir de la requête ou d'une propriété déjà disponible
        $name = request()->input('name');  // Récupérer le nom directement de la requête

        // Séparer le nom complet en parties (prénom et nom de famille)
        $nameParts = explode(' ', $name);

        // Initiale du prénom (première lettre du prénom)
        $firstNameInitial = strtoupper(substr($nameParts[0], 0, 1));

        // Dernier nom de famille (en majuscules)
        $lastName = strtoupper($nameParts[count($nameParts) - 1]);

        // Générer un nom d'utilisateur basé sur "VTP" + initiale du prénom + nom de famille
        $username = 'VTP' . $firstNameInitial . $lastName;

        // Vérifier si ce nom d'utilisateur existe déjà dans la base de données
        // Si oui, ajouter un numéro aléatoire à la fin pour garantir l'unicité
        while (User::where('name', $username)->exists()) {
            // Ajouter un numéro aléatoire entre 1 et 999
            $username = $username . rand(1, 999);
        }

        return $username;
    }


    private function generateUniqueCodeProfileUsers()
    {
        // Boucle pour garantir l'unicité du codeproduct
        do {
            // Générer un codeproduct unique
            $codeproduct = 'vtp-' . Str::uuid()->toString();

            // Vérifier si ce codeproduct existe déjà
            $existingProduct = User::where('codeprofile', $codeproduct)->first();
        } while ($existingProduct); // Si ce code existe, refaire la boucle

        return $codeproduct;
    }


    private function generateCodeVente()
    {
        // Boucle pour garantir l'unicité du code
        do {
            // Générer un code unique à 4 chiffres
            $codeprofile = rand(1000, 9999);  // Génère un nombre entre 1000 et 9999

            // Vérifier si ce code existe déjà
            $existingUser = User::where('codevente', $codeprofile)->first();
        } while ($existingUser); // Si ce code existe, refaire la boucle

        return $codeprofile; // Retourne le code unique
    }



    public function sendVerificationCode(Request $request)
    {

        // Chercher l'utilisateur par email
        $user = User::where('email', $request->email)->first();

        if ($request->arg == 1) {

            if (!$user) {
                $user = User::create([
                    'name' => $this->generateUsername(),
                    'email' => $request->email,
                    'codeprofile' => $this->generateUniqueCodeProfileUsers(),
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'password' => Hash::make($request->password) ?? 12345,
                    'role_id' => 1
                ]);
            }
        } elseif ($request->arg == 2) {
            if (!$user) {
                $user = User::create([
                    'name' => $this->generateUsername(),
                    'email' => $request->email,
                    'codeprofile' => $this->generateUniqueCodeProfileUsers(),
                    'nom_entreprise' => $request->name_entreprise,
                    'namestore' => $request->name_entreprise,
                    'type_entreprise' => $request->type_entreprise ?? 'N/D',
                    'capital' => $request->capital ?? 'N/D',
                    'siteweb' => $request->siteweb,
                    'adresse' => $request->adresse,
                    'description' => $request->description,
                    'country_id' => $request->country_id,
                    'telephone' => $request->phone,
                    'password' => Hash::make($request->password ?? '12345'),
                    'role_id' => 4,
                ]);
            }
        } elseif ($request->arg == 3) {
            // dd($request->all());
            if (!$user) {
                $user = User::create([
                    'name' => $this->generateUsername(),
                    'email' => $request->email,
                    'codevente' => $this->generateCodeVente(),
                    'codeprofile' => $this->generateUniqueCodeProfileUsers(),
                    'country_id' => $request->country_id,
                    'telephone' => $request->phone,
                    'password' => Hash::make($request->password ?? '12345'),
                    'role_id' => 3,
                ]);
            }
        }

        // Vérifier si l'utilisateur est confirmé
        if ($user->confirmed_at) {
            // Si l'utilisateur est déjà confirmé, lui indiquer de se connecter
            return response()->json([
                'message' => 'Votre compte est déjà confirmé. Veuillez vous connecter.'
            ]);
        } else {


            // Générer un code de vérification
            $verificationCode = Str::random(6); // Code aléatoire de 6 caractères
            $expirationTime = Carbon::now()->addMinutes(5); // Le code expire dans 5 minutes



            // Sauvegarder le code de vérification et son expiration dans le cache
            Cache::put('verification_code_' . $user->id, $verificationCode, $expirationTime);

            // Envoyer l'email avec le code de vérification
            Mail::to($user->email)->send(new \App\Mail\VerificationCodeMail($verificationCode));

            return response()->json([
                'message' => 'Un code de vérification a été envoyé à votre adresse email.'
            ]);
        }
    }


    // Vérification du code envoyé par l'utilisateur
    public function verifyCode(Request $request)
    {
      
        $user = User::where('email', $request->email)->first();

        // Vérifier si le compte est déjà confirmé
        if ($user->confirmed_at == 1) {
            return response()->json([
                'message' => 'Votre compte est déjà vérifié. Vous pouvez vous connecter.',
            ], 400);
        }

        // Vérifier si le code de vérification existe dans le cache
        $cachedCode = Cache::get('verification_code_' . $user->id);

        if (!$cachedCode) {
            return response()->json([
                'message' => 'Le code a expiré.',
            ], 400);
        }
        // Comparer le code envoyé par l'utilisateur avec celui du cache
        if ($cachedCode === $request->verificationCode) {
            // Le code est correct, on met à jour le champ 'confirmed_at' de l'utilisateur
            $user->confirmed_at = 1; // Marquer le compte comme confirmé
            $user->save();
            if ($request->arg == 3)
            {
                $user->notify(new SendNotificationCodePromotion($user));
            }

            // Optionnellement, connecter l'utilisateur
            auth()->login($user); // Connecte l'utilisateur automatiquement

            return response()->json([
                'message' => 'Le code est correct, vous êtes maintenant connecté.',
            ]);
        }

        return response()->json([
            'message' => 'Le code de vérification est incorrect.',
        ], 400);
    }
}
