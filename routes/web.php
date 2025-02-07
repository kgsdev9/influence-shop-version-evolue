<?php

use App\Http\Controllers\Abonnement\AbonnementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DeliveryPrice\DeliveryPriceController;
use App\Http\Controllers\Demarrage\CompagneProductController;
use App\Http\Controllers\Edition\EditionProfileController;
use App\Http\Controllers\Facture\FactureController;
use App\Http\Controllers\Gestion\GestionCompagneController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\NotificationConfirmationController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\Payment\PaymentAdresseController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\PaymentAdrese\PaymentAdresseUserController;
use App\Http\Controllers\PaymentLink\PaymentLinkController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SearchController;
use App\Http\Controllers\Souscription\SouscriptionController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Vente\VenteController;

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
Route::get('/blog', [HomeController::class, 'homeBlog'])->name('homeBlog');
Route::get('/blog/detail/{id}', [HomeController::class, 'detailBlog'])->name('detail.blog');


Route::get('/programme-affiliation', [HomeController::class, 'programmeAffiliation'])->name('programme.affiliation');
Route::get('/statusdelivery', [HomeController::class, 'deliveryStatus'])->name('delivery.status');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');







Route::get('/compaign', [HomeController::class, 'homeCompagne'])->name('homeCompagne');
Route::get('/products/home', [HomeController::class, 'homeProduct'])->name('product.home');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart.home');

Route::get('/buyProduct/{id}', [HomeController::class, 'buyProduct'])->name('buy.product')->middleware('auth');
Route::get('/product/detail/{id}', [HomeController::class, 'showProduct'])->name('product.show');


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

Route::get('/compagnes', [HomeController::class, 'homeCompagne'])->name('home.compagnes');
Route::get('/detail/compagne/{id}', [HomeController::class, 'detailCompagne'])->name('detailCompagne');

Route::get('/produits', [DashboardController::class, 'homeProducts'])->name('home.entreprise');
Route::get('/entreprises', [DashboardController::class, 'homeEntreprises'])->name('home.entreprise');
Route::get('/publicites', [DashboardController::class, 'homePublicites'])->name('home.publicites');
Route::resource('/products', ProductController::class);
Route::resource('/orders', OrdersController::class);
Route::resource('/ventes', VenteController::class);
Route::post('/begin-transaction', [PaymentController::class, 'initialisePayment'])->name('begin.payment');
Route::get('/payementstatus', [PaymentController::class, 'PaymentStatutUpdate'])->name('payment.status');
Route::get('/payementfailled', [PaymentController::class, 'paymentFailled'])->name('payment.failed');
Route::get('/payementsuccess', [PaymentController::class, 'payementSuccess'])->name('payment.success');
Route::delete('delete/payment/{paymentId}', [PaymentController::class, 'destroy'])->name('destroy.payment');

// pour le souscription
Route::get('/payementsuccess', [PaymentController::class, 'saveSouscrive'])->name('save.souscrive.status');
Route::get('/suscesssuscribe', [PaymentController::class, 'souscriveIsSuccess'])->name('souscrive.success');
Route::get('/failledsouscribe', [PaymentController::class, 'souscriptionFailled'])->name('souscrive.failled');


// pour la souscrption
Route::resource('/adresse', PaymentAdresseController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/city', CityController::class);
Route::resource('/countries', CountryController::class);
Route::resource('/deliveryprice', DeliveryPriceController::class);
Route::resource('/paiementadresse', PaymentAdresseUserController::class);
Route::resource('/compagne', GestionCompagneController::class);
Route::resource('/users', UsersController::class);
Route::resource('/blogs', BlogController::class);
Route::resource('/linkspayment', PaymentLinkController::class);
Route::resource('/abonnement', AbonnementController::class);
Route::resource('/souscribers', SouscriptionController::class);
Route::get('/factures', [FactureController::class, 'index'])->name('facture.index');;
Route::get('/editionprofile', [EditionProfileController::class, 'profile'])->name('profile.index');;

// verification code

Route::post('/send-verification-code', [VerificationCodeController::class, 'sendVerificationCode']);
Route::post('/verify-code', [VerificationCodeController::class, 'verifyCode']);


Route::prefix('password')->group(function () {
    // Route pour envoyer l'email de vérification

    Route::get('/reset-password', [ResetPasswordController::class, 'formResetPassword'])->name('reset.password');;
    Route::post('send-verification-email', [ResetPasswordController::class, 'sendVerificationEmail']);

    // Route pour vérifier le code envoyé par email
    Route::post('verify-code-email', [ResetPasswordController::class, 'verifyCodeEmail']);

    // Route pour réinitialiser le mot de passe
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);
});


Route::get('/faq', function () {
    return view('home.faq');
})->name('faq');


Route::get('/conditiongenerale', function () {
    return view('home.conditiongenerale');
})->name('cgu');


Route::get('/politique-confidentialite', function () {
    return view('home.poltiquedeconfidentialite');
})->name('politiqueconfidentialite');

Route::get('/politique-retour', function () {
    return view('home.politiqueretour');
})->name('politiqueretour');
