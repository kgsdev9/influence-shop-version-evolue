@extends('layout')
@section('title', 'Mot de passe oublié')
@section('content')
<section class="py-lg-8 py-7 bg-white" x-data="forgotPasswordForm()" x-init="init()">
    <div class="container my-lg-8">
        <div class="row justify-content-center">
            <div class="offset-xxl-1 col-xxl-6 col-lg-8 col-md-12">
                <div class="card smooth-shadow-md" style="z-index: 1">
                    <div class="card-body p-xl-6 d-flex flex-column justify-content-center" style="height: 100%;">
                        <div class="mb-4">
                            <h1 class="mb-4 lh-1 fw-bold h2">Réinitialiser votre mot de passe</h1>
                            <p>Veuillez suivre les étapes pour récupérer votre mot de passe.</p>

                            <div>
                                <!-- Etape 1 : Email -->
                                <div x-show="step === 1">
                                    <form @submit.prevent="sendVerificationEmail">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Adresse Email</label>
                                            <input type="email" id="email" class="form-control" x-model="email"
                                                placeholder="Entrez votre email" required>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                                <span x-show="isLoading" class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
                                                Envoyer le code
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Etape 2 : Vérification du code -->
                                <div x-show="step === 2">
                                    <form @submit.prevent="verifyCodeEmail">
                                        <div class="mb-3">
                                            <label for="verification_code" class="form-label">Code de
                                                vérification</label>
                                            <input type="text" id="verification_code" class="form-control"
                                                x-model="verificationCode" placeholder="Entrez le code reçu" required>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary"
                                                @click="previousStep">Précédent</button>
                                            <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                                <span x-show="isLoading" class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
                                                Vérifier
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Etape 3 : Nouveau mot de passe -->
                                <div x-show="step === 3">
                                    <form @submit.prevent="resetPassword">
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">Nouveau mot de passe</label>
                                            <input type="password" id="new_password" class="form-control"
                                                x-model="newPassword" placeholder="Entrez votre nouveau mot de passe"
                                                required>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary"
                                                @click="previousStep">Précédent</button>
                                            <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                                <span x-show="isLoading" class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
                                                Réinitialiser
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div x-show="errorMessage" class="mt-2">
                                    <span x-text="errorMessage" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer px-6 py-4">
                        <p class="mb-0">
                            Vous vous souvenez de votre mot de passe ? <a href="/login">Connectez-vous ici</a>
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
        function forgotPasswordForm() {
            return {
                step: 1, // Étape actuelle
                email: '',
                verificationCode: '',
                newPassword: '',
                isLoading: false,
                errorMessage: '',
                init() {
                    this.email = '';
                    this.verificationCode = '';
                    this.newPassword = '';
                    this.isLoading = false;
                    this.errorMessage = '';
                },
                nextStep() {
                    this.step += 1;
                },
                previousStep() {
                    if (this.step > 1) {
                        this.step -= 1;
                    }
                },
                async sendVerificationEmail() {
                    this.isLoading = true;
                    this.errorMessage = '';
                    try {
                        const response = await fetch('/password/send-verification-email', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({ email: this.email }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            this.step = 2;  // Passer à l'étape 2
                        } else {
                            this.errorMessage = data.message || 'Une erreur est survenue.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur de communication avec le serveur.';
                    } finally {
                        this.isLoading = false;
                    }
                },

                async verifyCodeEmail() {
                    this.isLoading = true;
                    this.errorMessage = '';
                    try {
                        const response = await fetch('/password/verify-code-email', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                email: this.email,
                                verificationCode: this.verificationCode,
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            this.step = 3;  // Passer à l'étape 3
                        } else {
                            this.errorMessage = data.message || 'Code incorrect ou expiré.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur de communication avec le serveur.';
                    } finally {
                        this.isLoading = false;
                    }
                },

                async resetPassword() {
                    this.isLoading = true;
                    this.errorMessage = '';
                    try {
                        const response = await fetch('/password/reset-password', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                email: this.email,
                                password: this.newPassword,
                                verificationCode: this.verificationCode,
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            window.location.href = '/login';  // Redirection vers la page de connexion
                        } else {
                            this.errorMessage = data.message || 'Une erreur est survenue.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur de communication avec le serveur.';
                    } finally {
                        this.isLoading = false;
                    }
                },
            };
        }
    </script>
@endpush