<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationConfirmationController extends Controller
{



    public function __construct()
    {
        $this->middleware('guest')->only(['confirmatedRegisterInfluenceurs']);
    }




    public function confirmatedRegisterInfluenceurs()
    {

        return view('notifications.confirmations.inflenceurs.register');
    }
}
