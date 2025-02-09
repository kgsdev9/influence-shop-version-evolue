@extends('layout')
@section('title', 'Espace d\'inscription')
@section('title', 'Inscription')
@section('content')
    <section class="py-lg-8 py-7 bg-white" x-data="loginForm()" x-init="init()"
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
                                <h1 class="mb-4 lh-1 fw-bold h2 text-center">Inscrivez-vous</h1>
                                <p class="text-center">En quelques étapes simples, vous pourrez accéder à notre plateforme.
                                </p>

                                <!-- Form -->
                                <div>
                                    <!-- Etape 1 : Nom, Prénom, Mot de passe -->
                                    <div x-show="step === 1">
                                        <form @submit.prevent="nextStep">
                                            <!-- Nom -->
                                            <div class="mb-3 form-floating">
                                                <input type="text" id="last_name" class="form-control" x-model="lastName"
                                                    placeholder="Entrez votre nom" required>
                                                <label for="last_name" class="form-label">Nom</label>
                                            </div>

                                            <!-- Prénom -->
                                            <div class="mb-3 form-floating">
                                                <input type="text" id="first_name" class="form-control"
                                                    x-model="firstName" placeholder="Entrez votre prénom" required>
                                                <label for="first_name" class="form-label">Prénom</label>
                                            </div>

                                            <!-- Mot de passe -->
                                            <div class="mb-3 form-floating">
                                                <input type="password" id="password" class="form-control"
                                                    x-model="password" placeholder="Entrez votre mot de passe" required>
                                                <label for="password" class="form-label">Mot de passe</label>
                                            </div>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-warning">Suivant</button>
                                            </div>
                                        </form>

                                    </div>

                                    <!-- Etape 2 : Email -->
                                    <div x-show="step === 2">
                                        <form @submit.prevent="sendVerificationCode">
                                            <!-- Email -->
                                            <div class="mb-3 form-floating">
                                                <input type="email" id="email" class="form-control" x-model="email"
                                                    placeholder="Entrez votre email" required>
                                                <label for="email" class="form-label">Adresse Email</label>
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
                                            <!-- Code de vérification -->
                                            <div class="mb-3">
                                                <label for="verification_code" class="form-label">Code de
                                                    vérification</label>
                                                <input type="text" id="verification_code" class="form-control"
                                                    x-model="verificationCode" placeholder="Entrez le code reçu" required>
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
        function loginForm() {
            return {
                step: 1, // Étape actuelle
                firstName: '',
                lastName: '',
                email: '',
                password: '',
                verificationCode: '',
                isLoading: false,
                errorMessage: '',
                init() {
                    this.firstName = '';
                    this.lastName = '';
                    this.email = '';
                    this.password = '';
                    this.verificationCode = '';
                    this.isLoading = false;
                    this.errorMessage = '';
                },
                nextStep() {
                    // Passer à l'étape suivante
                    this.step += 1;
                },
                previousStep() {
                    // Revenir à l'étape précédente
                    if (this.step > 1) {
                        this.step -= 1;
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
                                email: this.email,
                                nom: this.firstName,
                                prenom: this.lastName,
                                password: this.password,
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {

                            if (data.message === "Votre compte est déjà confirmé. Veuillez vous connecter.") {

                                this.errorMessage = data.message;

                                // window.location.href = '/login';
                            } else {
                                this.step = 3;
                            }
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
                                email: this.email,
                                nom: this.firstName,
                                prenom: this.lastName,
                                password: this.password,
                                verificationCode: this.verificationCode,
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            // Connecter l'utilisateur et rediriger
                            window.location.href = '/dashboard'; // Redirection après une vérification réussie
                        } else {
                            this.errorMessage = data.message || 'Code incorrect ou expiré.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur de communication avec le serveur veuillez reessayer plus tard.';
                    } finally {
                        this.isLoading = false;
                    }
                },
            };
        }
    </script>
@endpush
