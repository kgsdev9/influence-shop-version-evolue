<?php

namespace App\Http\Controllers\Auth\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class EntrepriseRegisterController extends Controller
{
    public function registerEntrepriseForm()
    {

        $allCountries   = Country::all();
        return view('auth.entreprises.register', compact('allCountries'));
    }
}
