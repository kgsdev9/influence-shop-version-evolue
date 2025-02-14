<?php

namespace App\Http\Controllers\Souscription;

use App\Http\Controllers\Controller;
use App\Models\Souscription;
use Illuminate\Http\Request;

class SouscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listesouscriptions = Souscription::with(['user', 'abonnement'])->get();

        return view('dashboard.souscriptions.index', compact('listesouscriptions'));
    }


}
