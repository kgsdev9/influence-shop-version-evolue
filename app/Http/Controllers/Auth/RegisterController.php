<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationeEmailInfluenceur;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Entreprise;
use App\Models\Influenceur;
use App\Models\InfluenceurSocialProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->only(['registerForm', 'submitInfluenceForm']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
        $allCountries = Country::all();

        $allCites = City::all();
        $allCategories = Category::all();
        return view('auth.register', compact('allCountries', 'allCites', 'allCategories'));
    }



    public function submitInfluenceForm(Request $request)
    {

        // Vérifier si l'influenceur existe déjà avec l'email
        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->nom,
                'password'  => Hash::make($request->codeprive),
                'role_id' => 3
            ]
        );

        // Vérifier si l'influenceur existe déjà avec l'email
        $influenceur = Influenceur::updateOrCreate(
            ['email' => $request->email],  // Condition de recherche (email)
            [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'phone' => $request->phone,
                'codeprive' => $request->codeprive,
                'whattssap' => $request->whattssap,
                'city_id' => $request->city_id,
                'user_id' => $user->id,
                'country_id' => $request->country_id,
                'adresse' => $request->adresse,
                'category_id' => $request->category_id,
                'bio' => $request->bio,
                'average_rate' => $request->average_rate,
                'codeinfluenceur' => $request->email ? Influenceur::generateUniqueCode() : $influenceur->codeinfluenceur, // Utiliser le code existant si l'influenceur existe déjà
            ]
        );

        // Décoder les profils sociaux JSON en tableau
        $socialProfiles = json_decode($request->input('socialProfiles'), true);

        // Enregistrer ou mettre à jour chaque profil social lié à l'influenceur
        foreach ($socialProfiles as $profile) {
            // Mettre à jour ou créer le profil social lié à cet influenceur
            InfluenceurSocialProfile::updateOrCreate(
                [
                    'namesocialprofile' => $profile['namecompte'],
                    'influenceur_id' => $influenceur->id
                ],
                [
                    'link' => $profile['reseausocial'],
                    'followers' => $profile['nbabonne'],
                ]
            );
        }


        Mail::to($influenceur->email)->send(new ConfirmationeEmailInfluenceur($influenceur));

        return response()->json([
            'success' => true,
            'message' => 'Formulaire soumis avec succès et profils sociaux enregistrés ou mis à jour!',
        ]);
    }


    public function confirmatedAcompteInfluenceur(Request $request)
    {

        // Rechercher l'utilisateur avec le code d'influenceur
        $influenceur = Influenceur::where('codeinfluenceur', $request->codeinfluenceur)->first();

        if ($influenceur) {

            $user =  User::where('id', $influenceur->id)->first();
            // Authentifier l'utilisateur
            Auth::login($user);

            // Retourner une réponse JSON avec un message de succès et les informations de l'utilisateur
            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie ! Bienvenue sur votre tableau de bord.',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ], 200);
        }

        // Si aucun utilisateur n'est trouvé (rare grâce à exists dans la validation)
        return response()->json([
            'success' => false,
            'message' => 'Le code d\'influenceur est invalide ou n\'existe pas.',
        ], 404);
    }

    public function registerFormEntreprise()
    {
        $allCountries = Country::all();
        $allCites = City::all();
        return view('auth.entreprises.register', compact('allCountries', 'allCites'));
    }



    public function storeEntreprise(Request $request)
    {

        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name_entreprise,
                'password'  => Hash::make($request->code),
                'role_id' => 4
            ]
        );

        // Création ou mise à jour de l'entreprise
        $entreprise = Entreprise::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name_entreprise,
                'description' => $request->description,
                'address' => $request->adresse,
                'phone' => $request->phone,
                'website' => $request->website,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Enregistré!',
        ]);
    }
}
