@extends('layout')
@section('title')
@section('content')
    <main class="bg-light">
        <section x-data="formSteps()">
            <div class="container  rounded-4 pe-lg-0 overflow-hidden ">
                <div class="d-flex flex-column gap-3">
                    <h5 class="mb-0 display-4 fw-bold text-warning mt-4"> Finaliser mes commandes
                    </h5>
                    <p class="mb-0 pe-xxl-8 me-xxl-5">Transformez votre influence en revenus. Influence Shop vous connecte
                        directement à des marques qui souhaitent promouvoir leurs produits ou services auprès de votre
                        communauté.</p>
                </div>
                <div class="card mb-4 position-relative mt-4">
                    <div class="card-body">
                        <!-- Etape 1: Informations Produit -->
                        <template x-if="currentStep === 1">
                            <div>
                                <h5 class="card-title">Informations du Produit</h5>
                                <p class="card-text">Veuillez remplir les informations pour enregistrer votre produit.</p>

                                <div class="row">
                                    <!-- Deuxième colonne avec le formulaire -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <!-- Nom du produit -->
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="product_name"
                                                        placeholder="Nom du produit" x-model="form.product_name" required>
                                                    <label for="product_name">Code Parainage </label>
                                                    <template x-if="errors.product_name">
                                                        <span class="text-danger" x-text="errors.product_name"></span>
                                                    </template>
                                                </div>
                                            </div>
                                            <!-- Prix du produit -->
                                            <div class="col-md-3 mb-3">
                                                <div class="form-floating">
                                                    <button type="button" class="btn btn-outline-warning mt-2"
                                                        @click="showModal = true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z" />
                                                        </svg>
                                                        Adresse
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6 class="mb-3">Adresse de paiement :</h6>
                                            <div class="row">
                                                <template x-for="(file, index) in adressepyament" :key="index">
                                                    <div class="col-lg-4 col-12 mb-4">
                                                        <!-- Formulaire d'adresse -->
                                                        <div class="border p-4 rounded-3"
                                                            :class="selectedAdresse?.id === file.id ? 'border-success bg-light' : ''">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" :id="'homeRadio' + index"
                                                                    @click="selectAdresse(file)" />
                                                                <label class="form-check-label text-dark fw-semibold"
                                                                    :for="'homeRadio' + index">
                                                                    <span x-text="file.telephone || 'Home'"></span>
                                                                </label>
                                                            </div>
                                                            <!-- Adresse -->
                                                            <p class="mb-0">
                                                                <span x-text="file.city || 'N/A'"></span><br><br>
                                                                <span x-text="file.adresse || 'N/A'"></span><br>
                                                            </p>

                                                            <div class="d-flex justify-content-between mt-3">
                                                                <button class="btn btn-warning btn-sm" @click="openModal(file)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor" class="bi bi-pencil"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M12.146 0.854a2 2 0 0 1 2.828 2.828L4.5 12.5a1 1 0 0 1-.351.211l-3.5 1a1 1 0 0 1-1.21-1.21l1-3.5a1 1 0 0 1 .211-.351L11.292 2.026a2 2 0 0 1 .854-.854zM11.793 2.5l-9.192 9.193-.548 1.925 1.924-.548 9.192-9.192a1 1 0 0 0-1.415-1.415z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm"
                                                                    @click="deleteAdresse(file.id)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor" class="bi bi-dash-circle"
                                                                        viewBox="0 0 16 16">
                                                                        <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Etape 2: Liste des articles -->
                        <template x-if="currentStep === 2">
                            <div>
                                <h5 class="card-title">Sommaire de l'achat</h5>
                                <div class="d-flex flex-column gap-4">
                                    <template x-for="(product, index) in cart.products" :key="index">
                                        <div class="d-flex flex-row gap-4">
                                            <div>
                                                <!-- Affichage de l'image du produit -->
                                                <img :src="product.image" alt="Image du produit" class="img-4by3-xl rounded">
                                            </div>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex flex-column gap-1">
                                                    <!-- Nom du produit -->
                                                    <h4 class="mb-0 text-primary-hover" x-text="product.name"></h4>
                                                    <!-- Prix du produit -->
                                                    <h5 class="mb-0" x-text="`${product.price} €`"></h5>
                                                </div>
                                                <!-- Quantité du produit -->
                                                <span x-text="`Quantité: ${product.quantity || 1}`"></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <div class="mt-4">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-medium text-dark">Sub Total :</span>
                                        <span class="fw-medium text-dark" x-text="`${cart.sub_total} €`"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-medium text-dark">Discount ({{ cart.discount_percentage }}%):</span>
                                        <span class="fw-medium text-dark" x-text="`-${cart.discount_amount} €`"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-medium text-dark">Shipping Charge :</span>
                                        <span class="fw-medium text-dark" x-text="`${cart.shipping_charge} €`"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-medium text-dark">Tax Vat {{ cart.tax_percentage }}% (included):</span>
                                        <span class="fw-medium text-dark" x-text="`${cart.tax_amount} €`"></span>
                                    </div>
                                    <div class="d-flex justify-content-between fw-semibold">
                                        <span class="text-dark">Paid by Customer</span>
                                        <span class="text-dark" x-text="`${cart.total_amount} €`"></span>
                                    </div>
                                </div>
                            </div>
                        </template>


                        <!-- Navigation entre les étapes -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary" @click="prevStep()" :disabled="currentStep === 1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path d="M4.646 8L9.293 3.354a.5.5 0 0 1 .708.708L6.707 8H14.5a.5.5 0 0 1 0 1H6.707l3.294 3.293a.5.5 0 0 1-.708.708L4.646 8z" />
                                </svg>
                                Précédent
                            </button>
                            <button type="button" class="btn btn-outline-secondary" @click="nextStep()" :disabled="currentStep === 2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                                </svg>
                                Suivant
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script>
        function formSteps() {
            return {
                currentStep: 1,
                form: {
                    product_name: '',
                    // autres champs
                },
                cart: @json($cart),
                adressepyament: @json($allAdressePayment),
                errors: {},
                selectedAdresse: null,

                // Fonction pour passer à l'étape suivante
                nextStep() {
                    if (this.currentStep < 2) {
                        this.currentStep++;
                    }
                },

                // Fonction pour revenir à l'étape précédente
                prevStep() {
                    if (this.currentStep > 1) {
                        this.currentStep--;
                    }
                },

                selectAdresse(file) {
                    this.selectedAdresse = file;
                },

                openModal(adresse = null) {
                    this.showModal = true;
                    this.currentAdresse = adresse || {};
                    this.form.telephone = this.currentAdresse.telephone || '';
                    this.form.city = this.currentAdresse.city || '';
                    this.form.adresse = this.currentAdresse.adresse || '';
                },

                hideModal() {
                    this.showModal = false;
                }
            };
        }
    </script>
@endpush
