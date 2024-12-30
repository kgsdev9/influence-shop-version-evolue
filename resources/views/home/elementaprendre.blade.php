@extends('layout')
@section('content')
    <section class="my-5 mx-3" x-data="formSteps()">

        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">

            <div class="d-flex flex-column gap-3">
                <h5 class="mb-0 display-4 fw-bold text-warning"> Achat de produit {{ $product->name }}
                </h5>
                <p class="mb-0 pe-xxl-8 me-xxl-5">Transformez votre influence en revenus. Influence Shop vous connecte
                    directement à des marques qui souhaitent promouvoir leurs produits ou services auprès de votre
                    communauté.</p>
            </div>

            <div class="card mb-4 position-relative mt-4">
                <div class="card-body">
                    <h5 class="card-title">Informations du Produit</h5>
                    <p class="card-text">Veuillez remplir les informations pour enregistrer votre produit.</p>

                    <div class="row">
                        <!-- Deuxième colonne avec le formulaire -->
                        <div class="col-md-8">
                            <!-- Section Image principale -->
                            <div class="d-flex">
                                <img src="{{ asset('assets/images/ecommerce/product-shoe-02.jpg') }}" alt="Image du produit"
                                    style="height:60px;" class="img-fluid me-4">
                                <div>
                                    <h5 class="badge bg-success text-white mb-2">Boutique Officielle</h5>
                                    <h5 class="badge bg-warning text-white">Eligible à livraison OFF</h5>
                                    <h3 class="mt-3">ATL Stabilisateur 2000VA - Affichage Numérique - Garantie 3 Mois</h3>
                                    <p>Marque: <a href="#">ATL</a> | <a href="#">Produits similaires par ATL</a>
                                    </p>
                                    <h4 class="text-primary">17,600 FCFA <span
                                            class="text-muted text-decoration-line-through">25,500 FCFA</span> <span
                                            class="text-danger">-31%</span></h4>
                                    <p>Disponible</p>
                                    <p class="text-muted">+ livraison à partir de 900 FCFA vers Bouaké Agence</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="text-warning me-2">
                                            ★★★★☆
                                        </div>
                                        <span>(450 avis vérifiés)</span>
                                    </div>
                                    <!-- Options disponibles -->
                                    <h6 class="mb-2">OPTIONS DISPONIBLES</h6>
                                    <button class="btn btn-outline-secondary mb-3">2000 Va</button>
                                    <!-- Bouton d'achat -->
                                    <button class="btn btn-warning btn-lg">J'achète</button>
                                </div>
                            </div>

                            <!-- Section Partage -->
                            <div class="mt-4">
                                <h6>PARTAGEZ CE PRODUIT</h6>
                                <a href="#" class="me-3"><i class="fab fa-facebook-square fa-2x"></i></a>
                                <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
                            </div>

                            <!-- Section Promotions -->
                            <div class="mt-4">
                                <h6>PROMOTIONS</h6>
                                <ul>
                                    <li>Plus de 100 marques officielles, garant de qualité</li>
                                    <li>Payez moins de frais en choisissant la livraison dans nos agences</li>
                                    <li>
                                        Livraison gratuite à Abidjan, Bingerville, Anyama, Yako, Bouaké, Dabou et Songon sur
                                        plus de 500 mille articles
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <!-- deuxieme colonne -->
                        <div class="col-md-4" style="position: relative; top: -70px;">


                        </div>
                    </div>



                    <template x-if="showModal">
                        <div class="modal fade show d-block" tabindex="-1" aria-modal="true"
                            style="background-color: rgba(0,0,0,0.5)">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" x-text="isEdite ? 'Modification' : 'Création'"></h5>
                                        <button type="button" class="btn-close" @click="hideModal()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="storeAdresse">
                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <label for="telephone" class="form-label">Téléphone</label>
                                                    <input type="text" id="telephone" class="form-control"
                                                        x-model="form.telephone">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="telephone" class="form-label">Ville</label>
                                                    <input type="text" id="city" class="form-control"
                                                        x-model="form.city">
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="adresse" class="form-label">Adresse</label>
                                                    <textarea id="adresse" class="form-control" x-model="form.adresse" rows="4" cols="50" required></textarea>
                                                </div>


                                                <div class="col-md-6 mb-3 mt-2">
                                                    <label for="action" class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary"
                                                        x-text="isEdite ? 'Mettre à jour' : 'Enregistrer'"></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <button type="button" class="btn btn-outline-secondary mt-4" @click="processPayment()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path
                                d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                        </svg>
                        Enregistrer
                    </button>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function formSteps() {
            return {
                listedeveliryPriceByCountries: @json($listedeveliryPriceByCountries),
                files: [],
                pricedelivery: 0,
                showModal: false,
                selectedAdresse: null,

                quantite: 1,
                form: {
                    country_origine: '',
                    telephone: '',
                    adresse: '',
                    city: '',
                },
                product: @json($product),
                adressepyament: @json($allAdressePayment),
                errors: {},
                isEdite: false,
                searchQuery: '',
                currentAdresse: '',

                selectAdresse(file) {
                    this.selectedAdresse = file;
                },
                // Validation des champs obligatoires
                validateStep() {
                    this.errors = {};

                    if (!this.product.name) this.errors.name = 'Le champ Nom du produit est requis.';
                    if (!this.product.price) this.errors.price = 'Le champ Prix est requis.';
                    if (!this.product.quantity) this.errors.quantity = 'Le champ Quantité est requis.';
                    if (!this.product.category) this.errors.category = 'Veuillez sélectionner une catégorie.';
                    if (!this.product.description) this.errors.description = 'La description est obligatoire.';

                    return Object.keys(this.errors).length === 0;
                },



                validateForm() {
                    this.errors = {}; // Réinitialiser les erreurs
                    let isValid = true;

                    if (!this.form.country_origine) {
                        this.errors.country_origine = 'Le pays d\'origine est obligatoire.';
                        isValid = false;
                    }

                    if (!this.form.telephone || !/^\d{10}$/.test(this.form.telephone)) {
                        this.errors.telephone = 'Le téléphone est obligatoire et doit comporter 10 chiffres.';
                        isValid = false;
                    }

                    if (!this.form.adresse) {
                        this.errors.adresse = 'L\'adresse est obligatoire.';
                        isValid = false;
                    }

                    if (!this.form.city) {
                        this.errors.city = 'La ville est obligatoire.';
                        isValid = false;
                    }

                    return isValid;
                },


                filteredCountries() {
                    return this.listedeveliryPriceByCountries.filter(deliveryprice => {
                        return deliveryprice.country_start.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            deliveryprice.country_destination.toLowerCase().includes(this.searchQuery
                                .toLowerCase());
                    });
                },


                calculateTTC() {
                    const priceVente = Number(this.product.price_vente) || 0;
                    const priceDelivery = Number(this.pricedelivery) || 0;
                    const quantity = Number(this.quantite) || 1; // Par défaut, quantité = 1 si elle est invalide
                    return ((priceVente * quantity) + priceDelivery).toFixed(2);
                },

                addAdresse() {
                    if (this.files.length >= 2) {
                        alert("Vous ne pouvez ajouter que 2 adresses de paiement.");
                        return;
                    }
                    this.files.push({
                        file: null,
                        preview: null
                    });
                },

                hideModal() {
                    this.showModal = false;
                    this.currentAdresse = null;
                    this.resetForm();
                    this.isEdite = false;
                },

                selectCountry(deliveryprice) {
                    this.form.country_origine = deliveryprice.country_start + ' - ' + deliveryprice.country_destination;
                    this.pricedelivery = deliveryprice.prix;
                    // this.form.country_origine = deliveryprice.country_start + ' - ' + deliveryprice.country_destination;
                    // Mettre l'ID du pays dans un champ caché ou autre logique
                    this.$nextTick(() => {
                        this.errors = {}; // Réinitialiser les erreurs après sélection
                    });
                },

                resetForm() {
                    this.form = {
                        city: '',
                        adresse: '',
                        telephone: '',
                    };
                },

                openModal(adresse = null) {

                    this.isEdite = adresse !== null;
                    if (this.isEdite) {
                        this.currentAdresse = {
                            ...adresse
                        };


                        this.form = {
                            telephone: this.currentAdresse.telephone,
                            city: this.currentAdresse.city,
                            adresse: this.currentAdresse.adresse,
                            adresse_id: this.currentAdresse.id,

                        };


                    } else {
                        alert('icici');
                        this.resetForm();
                        this.isEdite = false;
                    }
                    this.showModal = true;
                },

                async deleteAdresse(adresseId) {
                    if (!confirm('Êtes-vous sûr de vouloir supprimer cette adresse de paiement ?')) {
                        return;
                    }


                    const url =
                        `{{ route('adresse.destroy', ['adresse' => '__ID__']) }}`.replace(
                            "__ID__",
                            adresseId
                        );


                    try {
                        const response = await fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        });

                        if (response.ok) {
                            this.adressepyament = this.adressepyament.filter(adresse => adresse.id !== adresseId);
                            Swal.fire({
                                icon: 'success',
                                title: 'Adresse supprimée avec succès.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de la suppression.',
                                text: await response.text(),
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur réseau est survenue.',
                            showConfirmButton: true
                        });
                    }
                },

                // Traitement du paiement
                async processPayment() {
                    const formData = new FormData();
                    formData.append('product_id', this.product.id);

                    try {
                        const response = await fetch('{{ route('begin.payment') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();

                            if (data.payment_url) {
                                window.open(
                                    data.payment_url,
                                    'Paiement',
                                    'width=800,height=600,scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no'
                                );
                            } else {
                                alert('Erreur: ' + (data.error || 'URL de paiement introuvable.'));
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de l\'enregistrement.',
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true
                        });
                    }
                },

                async storeAdresse() {

                    const adresseLength = Array.isArray(this.adressepyament) ?
                        this.adressepyament.length :
                        this.adressepyament.trim().split(/\s+/).length;

                    if (adresseLength > 2) {
                        alert('Vous ne pouvez entrer que 2 informations de paiement.');
                        return;
                    }
                    const formData = new FormData();
                    formData.append('telephone', this.form.telephone);
                    formData.append('adresse', this.form.adresse);
                    formData.append('city', this.form.city);

                    if (!this.currentAdresse) {
                        formData.append('adresse_id', null);
                    } else {
                        formData.append('adresse_id', this.currentAdresse.id);
                    }
                    try {
                        const response = await fetch('{{ route('adresse.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const adresse = data.adresse;

                            if (this.isEdite) {
                                const index = this.adressepyament.findIndex(a => a.id === adresse.id);
                                if (index !== -1) this.adressepyament[index] = adresse;
                            } else {
                                this.adressepyament.push(adresse);

                                this.adressepyament.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                            }

                            this.resetForm();
                            this.hideModal();

                            // this.adressepyament.push(data.adresse);
                            // Reset form fields


                            // if (this.isEdite) {
                            //     const index = this.users.findIndex(u => u.id === client.id);
                            //     if (index !== -1) this.users[index] = client;
                            // } else {
                            //     this.users.push(client);

                            //     this.users.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                            // }





                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de l\'enregistrement.',
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true
                        });
                    }
                },


            };
        }
    </script>
@endpush
