@extends('layout')

@section('content')
    <section class="py-lg-8 py-7 bg-white" x-data="confirmationForm()" x-init="init()">
        <div class="container my-lg-8">
            <!-- Hero Section -->
            <div class="row justify-content-center">

                <div class="offset-xxl-1 col-xxl-6 col-lg-8 col-md-12">
                    <!-- Card -->
                    <div class="card smooth-shadow-md" style="z-index: 1">
                        <!-- Card body -->
                        <div class="card-body p-xl-6 d-flex flex-column justify-content-center" style="height: 100%;">
                            <div class="mb-4">
                                <h1 class="mb-4 lh-1 fw-bold h2">Confirmer votre inscription</h1>
                                <p>Nous vous avons envoyé un code par email pour confirmer votre inscription. Veuillez
                                    entrer ce code ci-dessous.</p>

                                <!-- Form -->
                                <div>
                                    <form @submit.prevent="submitForm">
                                        <!-- Code d'Influenceur -->
                                        <div class="mb-3">
                                            <label for="influenceurCode" class="form-label">Code d'influenceur</label>
                                            <input type="text" id="influenceurCode" class="form-control"
                                                x-model="codeinfluenceur" placeholder="Entrez votre code d'influenceur"
                                                required>

                                        </div>

                                        <div x-show="errorMessage" class="mt-2">
                                            <span x-text="errorMessage" class="text-danger"></span>
                                        </div>

                                        <!-- Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                                <span x-show="isLoading">Chargement...</span>
                                                <span x-show="!isLoading">Confirmer</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- Card Footer -->
                        <div class="card-footer px-6 py-4">
                            <p class="mb-0">
                                Si vous n'avez pas reçu le code, veuillez vérifier votre boîte de réception ou essayer à
                                nouveau.
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
        function confirmationForm() {
            return {
                codeinfluenceur: '',
                isLoading: false,
                errorMessage: '',
                init() {
                    this.codeinfluenceur = '';
                    this.isLoading = false;
                    this.errorMessage = '';
                },
                async submitForm() {

                    this.isLoading = true;


                    this.errorMessage = '';

                    try {
                        const response = await fetch('/confirmatedcodeinfluenceurs', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                            body: JSON.stringify({
                                codeinfluenceur: this.codeinfluenceur
                            }),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            alert(data.message);
                            window.location.href = '/dashboard';
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
