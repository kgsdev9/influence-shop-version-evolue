@extends('layout')
@section('title', 'Espace d\'inscription')
@section('title', 'Inscription')
@section('content')
    <section class="py-lg-8 py-7 bg-white" x-data="formSteps()" x-init="init()"
        style="background-image: url({{ asset('baground-colors.jpg') }}); background-size: cover; background-position: center;">
        <div class="container my-lg-8">
            <!-- Hero Section -->
            <div class="row justify-content-center">

                <div class="offset-xxl-1 col-xxl-6 col-lg-8 col-md-12">
                    <!-- Card -->
                    <div class="card smooth-shadow-md" style="z-index: 1">
                        <!-- Card body -->
                        <div class="card-body p-xl-6 d-flex flex-column justify-content-center" style="height: 100%;">
                            <div class="mb-4">
                                <h1 class="mb-4 lh-1 fw-bold h2 text-center">Inscription de l'influenceur</h1>
                                <p class="text-center">En quelques étapes simples, vous pourrez inscrire votre profil
                                    d'influenceur sur notre plateforme.</p>

                                <!-- Form -->
                                <div>
                                    <!-- Etape 1 : Informations personnelles -->
                                    <div x-show="step === 1">
                                        <form @submit.prevent="nextStep">
                                            <!-- Nom complet -->
                                            <div class="mb-3 form-floating">
                                                <input type="text" id="full_name" class="form-control"
                                                    x-model="form.full_name" placeholder="Entrez votre nom complet"
                                                    required>
                                                <label for="full_name" class="form-label">Nom complet</label>
                                            </div>

                                            <!-- Téléphone -->
                                            <div class="mb-3 form-floating">
                                                <input type="text" id="phone" class="form-control"
                                                    x-model="form.phone" placeholder="Entrez votre téléphone" required>
                                                <label for="phone" class="form-label">Téléphone</label>
                                            </div>

                                            <div class="mb-3 form-floating">
                                                <select class="form-select" id="country_id" x-model="form.country_id"
                                                    required>
                                                    <option value="" selected>Sélectionnez un pays</option>
                                                    @foreach ($allCountries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="country_id" class="form-label">Pays</label>
                                            </div>

                                            <div class="mb-3 form-floating">
                                                <input type="password" id="password" class="form-control"
                                                    x-model="form.password" placeholder="Entrez votre mot de passe"
                                                    required>
                                                <label for="password" class="form-label">Mot de passe</label>
                                            </div>


                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-warning">Suivant</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Etape 2 : Demande de l'email et envoi du code -->
                                    <div x-show="step === 2">
                                        <form @submit.prevent="sendVerificationCode">
                                            <!-- Email -->
                                            <div class="mb-3 form-floating">
                                                <input type="email" id="email" class="form-control"
                                                    x-model="form.email" placeholder="Entrez l'email" required>
                                                <label for="email" class="form-label">Email</label>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    @click="previousStep">Précédent</button>
                                                <button type="submit" class="btn btn-warning" :disabled="isLoading">
                                                    <span x-show="isLoading" class="spinner-border spinner-border-sm"
                                                        role="status" aria-hidden="true"></span>
                                                    Envoyer le code
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Etape 3 : Vérification du code -->
                                    <div x-show="step === 3">
                                        <form @submit.prevent="verifyCode">
                                            <!-- Code de validation -->
                                            <div class="mb-3">
                                                <label for="verification_code" class="form-label">Code de validation</label>
                                                <input type="text" id="verification_code" class="form-control"
                                                    x-model="form.verification_code" placeholder="Entrez le code reçu"
                                                    required>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    @click="previousStep">Précédent</button>
                                                <button type="submit" class="btn btn-warning" :disabled="isLoading">
                                                    <span x-show="isLoading" class="spinner-border spinner-border-sm"
                                                        role="status" aria-hidden="true"></span>
                                                    Vérifier
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Erreur -->
                                    <div x-show="errorMessage" class="mt-2">
                                        <span x-text="errorMessage" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer px-6 py-4">
                            <p class="mb-0 text-center">
                                Vous avez déjà un compte ? <a href="/login" class="text-dark">Connectez-vous ici</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function formSteps() {
            return {
                step: 1, // Étape actuelle
                form: {
                    full_name: '',
                    email: '',
                    phone: '',
                    password: '',
                    country_id: '',
                    verification_code: '',
                    arg: 3
                },
                isLoading: false,
                errorMessage: '',
                init() {
                    this.form = {
                        full_name: '',
                        email: '',
                        phone: '',
                        country_id: '',
                        verification_code: '',
                        arg: 3
                    };
                    this.isLoading = false;
                    this.errorMessage = '';
                },
                nextStep() {
                    this.step = 2;
                },
                previousStep() {
                    if (this.step > 1) {
                        this.step -= 1; // Revenir à l'étape précédente
                    }
                },
                async sendVerificationCode() {
                    this.isLoading = true;
                    this.errorMessage = '';
                    try {
                        const response = await fetch('/send-verification-code', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                            body: JSON.stringify({
                                full_name: this.form.full_name,
                                email: this.form.email,
                                phone: this.form.phone,
                                password: this.form.password,
                                country_id: this.form.country_id,
                                verificationCode: this.form.verification_code,
                                arg: 3
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            this.step = 3; // Passer à l'étape 3 après l'envoi du code
                        } else {
                            this.errorMessage = data.message || 'Une erreur est survenue.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur de communication avec le serveur.';
                    } finally {
                        this.isLoading = false;
                    }
                },

                async verifyCode() {
                    this.isLoading = true;
                    this.errorMessage = '';
                    try {
                        const response = await fetch('/verify-code', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                            body: JSON.stringify({
                                full_name: this.form.full_name,
                                email: this.form.email,
                                phone: this.form.phone,
                                password: this.form.password,
                                country_id: this.form.country_id,
                                verificationCode: this.form.verification_code,
                                arg: 3
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            window.location.href = '/dashboard'; // Rediriger vers le tableau de bord après vérification
                        } else {
                            this.errorMessage = data.message || 'Code incorrect ou expiré.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur de communication avec le serveur.';
                    } finally {
                        this.isLoading = false;
                    }
                }
            };
        }
    </script>
@endpush
