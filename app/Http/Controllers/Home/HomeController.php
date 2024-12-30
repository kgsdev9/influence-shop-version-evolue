<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\PaymentAdresse;
use App\Models\PriceDeliveryByCountry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeproduct = Product::with('images')->get();
        return view('welcome', compact('listeproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $listedeveliryPriceByCountries = PriceDeliveryByCountry::all();
        $allCountries  = Country::all();
        $allAdressePayment = PaymentAdresse::where('user_id', Auth::user()->id)->get();

        return view('home.buy', compact('product', 'allCountries', 'listedeveliryPriceByCountries', 'allAdressePayment'));
    }

    public function showProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $listedeveliryPriceByCountries = PriceDeliveryByCountry::all();
        $allCountries  = Country::all();
        $allAdressePayment = [];

        return view('home.productdetail', compact('product', 'allCountries', 'listedeveliryPriceByCountries', 'allAdressePayment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
