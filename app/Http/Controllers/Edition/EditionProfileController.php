<?php

namespace App\Http\Controllers\Edition;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditionProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $allCountries  = Country::all();

        $user = User::where('codeprofile', Auth::user()->codeprofile)->first();
        if ($user->role->name == "entreprise") {

            return view('dashboard.profile.profileentreprise', compact('user', 'allCountries'));
        } elseif ($user->role->name == "utilisateur") {
            return view('dashboard.profile.profile', compact('user'));
        } elseif ($user->role->name == "influenceur") {
            return view('dashboard.profile.influenceur', compact('user', 'allCountries'));
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('codeprofile', Auth::user()->codeprofile)->first();
        if ($request->arg  == 1) {
            $user->nom = $request->input('first_name');
            $user->prenom = $request->input('last_name');
            $user->telephone = $request->input('phone');
            $user->save();
            return response()->json(['success' => true]);
        } elseif ($request->arg  == 2) {
            $user->nom_entreprise = $request->input('nom_entreprise');
            $user->type_entreprise = $request->input('type_entreprise') ?? 'N/D';
            $user->capital = $request->input('capital') ?? 'N/D';
            $user->siteweb = $request->input('siteweb');
            $user->adresse = $request->input('adresse');
            $user->description = $request->input('description');
            $user->country_id = $request->input('country_id');
            $user->telephone = $request->input('telephone');
            if ($request->input('password') !== null) {
                $user->password = Hash::make($request->input('password'));
            }
            // Sauvegarder les changements
            $user->save();
            return response()->json(['success' => true]);
        } elseif ($request->arg  == 3)
        {
            $user->nom = $request->input('first_name');
            $user->prenom = $request->input('last_name');
            $user->country_id = $request->input('country_id');
            $user->telephone = $request->input('phone');
            $user->save();
            if ($request->input('password') !== null) {
                $user->password = Hash::make($request->input('password'));
            }
            // Sauvegarder les changements
            $user->save();
            return response()->json(['success' => true]);
        }
    }


    public function deleteAccount()
    {
        $user = User::where('codeprofile', Auth::user()->codeprofile)->first();

        // Supprimer le compte de l'utilisateur
        $user->delete();

        // Déconnecter l'utilisateur
        Auth::logout();

        return response()->json(['success' => true]);
    }
}
