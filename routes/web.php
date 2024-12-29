<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\NotificationConfirmationController;
use App\Http\Controllers\Payment\PaymentAdresseController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SearchController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/buyProduct/{id}', [HomeController::class, 'buyProduct'])->name('buy.product');


Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search-tiktok', [SearchController::class, 'search'])->name('search.tiktok');

Route::get('/register', [RegisterController::class, 'registerForm'])->name('register.form');
Route::get('/login', [LoginController::class, 'login'])->name('login.form');
Route::post('/login', [LoginController::class, 'loginUser'])->name('login');




Route::post('/infuenceur', [RegisterController::class, 'submitInfluenceForm'])->name('infuenceur');
Route::get('/registerform-entreprise', [RegisterController::class, 'registerFormEntreprise'])->name('register.entreprise');
Route::post('/submit/entreprise', [RegisterController::class, 'storeEntreprise'])->name('entreprise.submit');
Route::get('/confirmationregister', [NotificationConfirmationController::class, 'confirmatedRegisterInfluenceurs'])->name('confirmated.register.influenceurs');

Route::post('/confirmatedcodeinfluenceurs', [RegisterController::class, 'confirmatedAcompteInfluenceur'])->name('confirmated.code.influenceurs');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboards');

Route::get('/compagnes', [HomeController::class, 'homeCompagnes'])->name('home.compagnes');
Route::get('/produits', [DashboardController::class, 'homeProducts'])->name('home.entreprise');
Route::get('/entreprises', [DashboardController::class, 'homeEntreprises'])->name('home.entreprise');
Route::get('/publicites', [DashboardController::class, 'homePublicites'])->name('home.publicites');
Route::resource('/products', ProductController::class);

Route::post('/begin-transaction', [PaymentController::class, 'initialisePayment'])->name('begin.payment');



Route::get('/sucess', [PaymentController::class, 'succespayment'])->name('payment.success');
Route::get('/failled-payment', [PaymentController::class, 'failledpayment'])->name('payment.failed');
Route::resource('/adresse', PaymentAdresseController::class);
