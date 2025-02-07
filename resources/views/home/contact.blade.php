@extends('layout')
@section('title', 'Contactez-Nous')
@section('content')

<section class="py-8 bg-light">
    <div class="container my-lg-8">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12 mb-8 text-center">
                <h2 class="display-4 mb-3 fw-bold">Contactez-Nous</h2>
                <p class="lead mb-5">
                    Nous serions ravis de collaborer avec vous ! Veuillez remplir le formulaire ci-dessous pour nous contacter. Vous pouvez également prendre rendez-vous directement via WhatsApp.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <form action="#" method="POST">
                            <!-- Nom de l'entreprise -->
                            <div class="form-group mb-4">
                                <label for="companyName" class="form-label">Nom de l'entreprise</label>
                                <input type="text" id="companyName" name="companyName" class="form-control" required>
                            </div>
                            <!-- Adresse -->
                            <div class="form-group mb-4">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                            <!-- Pays -->
                            <div class="form-group mb-4">
                                <label for="country" class="form-label">Pays</label>
                                <input type="text" id="country" name="country" class="form-control" required>
                            </div>
                            <!-- Ville -->
                            <div class="form-group mb-4">
                                <label for="city" class="form-label">Ville</label>
                                <input type="text" id="city" name="city" class="form-control" required>
                            </div>
                            <!-- Téléphone -->
                            <div class="form-group mb-4">
                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" required>
                            </div>
                            <!-- Email -->
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <!-- Bouton WhatsApp -->
                            <div class="form-group mb-4">
                                <label for="whatsapp" class="form-label">Prendre rendez-vous via WhatsApp</label>
                                <a href="https://wa.me/11234567890" class="btn btn-success w-100" target="_blank">
                                    Prendre Rendez-vous
                                </a>
                            </div>
                            <!-- Bouton de soumission -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
