<?php

namespace App\Http\Controllers\Auth\Promoteur;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class PromoteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerFormPromoteur()
    {
        $allCountries = Country::all();
        return view('auth.influenceur.formregister', compact('allCountries'));
    }
}
