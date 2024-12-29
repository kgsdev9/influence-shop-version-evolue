@extends('layout')

@section('content')
    <section class="py-lg-8 py-7 bg-white" x-data="loginForm()" x-init="init()">
        <div class="container my-lg-8">
            <!-- Hero Section -->
            <div class="row justify-content-center">

                <div class="offset-xxl-1 col-xxl-6 col-lg-8 col-md-12">
                    <!-- Card -->
                    <div class="card smooth-shadow-md" style="z-index: 1">
                        <!-- Card body -->
                        <div class="card-body p-xl-6 d-flex flex-column justify-content-center" style="height: 100%;">
                            <div class="mb-4">
                                <h1 class="mb-4 lh-1 fw-bold h2">Connexion à votre compte</h1>
                                <p>Veuillez entrer votre adresse email et mot de passe pour vous connecter à votre compte.</p>

                                <!-- Form -->
                                <div>
                                    <form @submit.prevent="submitForm">
                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Adresse Email</label>
                                            <input type="email" id="email" class="form-control"
                                                x-model="email" placeholder="Entrez votre email" required>
                                        </div>

                                        <!-- Mot de passe -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mot de passe</label>
                                            <input type="password" id="password" class="form-control"
                                                x-model="password" placeholder="Entrez votre mot de passe" required>
                                        </div>

                                        <div x-show="errorMessage" class="mt-2">
                                            <span x-text="errorMessage" class="text-danger"></span>
                                        </div>

                                        <!-- Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                                <span x-show="isLoading">Chargement...</span>
                                                <span x-show="!isLoading">Se connecter</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer px-6 py-4">
                            <p class="mb-0">
                                Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous ici</a>
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
                email: '',
                password: '',
                isLoading: false,
                errorMessage: '',
                init() {
                    this.email = '';
                    this.password = '';
                    this.isLoading = false;
                    this.errorMessage = '';
                },
                async submitForm() {
                    this.isLoading = true;
                    this.errorMessage = '';

                    try {
                        const response = await fetch('/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                email: this.email,
                                password: this.password,
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            alert(data.message);
                            window.location.href = '/dashboard';  // Redirection après une connexion réussie
                        } else {
                            alert(data.message);
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
