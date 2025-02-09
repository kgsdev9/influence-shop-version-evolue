<?php

namespace App\Http\Controllers\Edition;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditionProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::where('codeprofile', Auth::user()->codeprofile)->first();
        return view('dashboard.profile.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('codeprofile', Auth::user()->codeprofile)->first();

        $user->nom = $request->input('first_name');
        $user->prenom = $request->input('last_name');
        $user->telephone = $request->input('phone');

        $user->save();

        return response()->json(['success' => true]);
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
