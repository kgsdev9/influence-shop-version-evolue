@extends('layout')
@section('title', 'Espace de connexion')
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
                                <h1 class="mb-4 lh-1 fw-bold h2 text-center">Connexion à votre compte</h1>
                                <p class="text-center">Veuillez entrer votre adresse email et mot de passe pour vous connecter à votre compte.
                                </p>

                                <!-- Form -->
                                <div>
                                    <form @submit.prevent="submitForm">
                                        <!-- Email -->
                                        <div class="mb-3 form-floating">
                                            <input type="email" id="email" class="form-control" x-model="email"
                                                placeholder="Entrez votre email" required>
                                            <label for="email" class="form-label">Adresse Email</label>
                                        </div>

                                        <!-- Mot de passe -->
                                        <div class="mb-3 form-floating">
                                            <input type="password" id="password" class="form-control" x-model="password"
                                                placeholder="Entrez votre mot de passe" required>
                                            <label for="password" class="form-label">Mot de passe</label>
                                        </div>

                                        <div x-show="errorMessage" class="mt-2">
                                            <span x-text="errorMessage" class="text-danger"></span>
                                        </div>

                                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                            <div class="form-check">

                                            </div>
                                            <div>
                                                <a class="text-dark" href="{{ route('reset.password') }}">Mot de passe
                                                    oublié?</a>
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-outline-warning" :disabled="isLoading">
                                                <span x-show="isLoading">Chargement...</span>
                                                <span x-show="!isLoading"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z">
                                                        </path>
                                                    </svg> &nbsp; Se connecter</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer px-6 py-4">
                            <p class="mb-0 text-center">
                                Vous n'avez pas de compte ? <a href="/register" class="text-dark">Inscrivez-vous ici</a>
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
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                            body: JSON.stringify({
                                email: this.email,
                                password: this.password,
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            alert(data.message);
                            window.location.href = '/dashboard'; // Redirection après une connexion réussie
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
