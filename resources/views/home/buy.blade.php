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
                            <div class="row">
                                <!-- Nom du produit -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="product_name"
                                            placeholder="Nom du produit" x-model="form.product_name" required>
                                        <label for="product_name">Code Influenceur </label>
                                        <template x-if="errors.product_name">
                                            <span class="text-danger" x-text="errors.product_name"></span>
                                        </template>
                                    </div>
                                </div>


                                <div class="col-md-3 mb-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="quantity" placeholder="Quantité"
                                            v-model="quantity" min="1">
                                        <label for="quantity">Quantité</label>

                                    </div>
                                </div>

                                <!-- Prix du produit -->
                                <div class="col-md-3 mb-3">
                                    <div class="form-floating">

                                        <button type="button" class="btn btn-outline-warning mt-2"
                                            @click="showModal = true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z" />
                                            </svg>
                                            Adresse
                                        </button>
                                    </div>
                                </div>



                                <hr>
                                <h6 class="mb-3">Information sur la livraison :</h6>

                                <div class="col-md-6 mb-3">
                                    <div class="custom-select-container">
                                        <div class="dropdown">
                                            <button class="btn btn-light dropdown-toggle w-100" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <template x-if="form.country_origine">
                                                    <div>
                                                        <strong x-text="form.country_origine"></strong>
                                                    </div>
                                                </template>
                                                <span x-text="form.country_origine ? '' : 'Sélectionnez un pays'"></span>
                                            </button>

                                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                                <!-- Champ de recherche -->
                                                <li class="px-2 py-1">
                                                    <input type="text" class="form-control" placeholder="Rechercher..."
                                                        x-model="searchQuery" />
                                                </li>

                                                <!-- Liste des pays filtrée -->
                                                <template x-for="deliveryprice in filteredCountries()"
                                                    :key="deliveryprice.id">
                                                    <li class="dropdown-item d-flex align-items-center"
                                                        @click="selectCountry(deliveryprice)">
                                                        <!-- Icône ou image de transport -->

                                                        <div>
                                                            <strong
                                                                x-text="deliveryprice.country_start + ' - ' + deliveryprice.country_destination"></strong>
                                                            <br />
                                                            <span class="text-muted" x-text="deliveryprice.prix"></span> -
                                                            <span class="text-muted"
                                                                x-text="deliveryprice.type_delivery"></span>
                                                        </div>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                    </div>

                                    <template x-if="errors.country_id">
                                        <span class="text-danger" x-text="errors.country_id"></span>
                                    </template>
                                </div>

                                <hr>
                                <h6 class="mb-3">Adresse de paiement :</h6>


                                <div class="row">
                                    <!-- Boucle pour les inputs de fichier -->
                                    <template x-for="(file, index) in adressepyament" :key="index">

                                        <div class="col-lg-4 col-12 mb-4">
                                            <!-- form -->
                                            <div class="border p-4 rounded-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        :id="'homeRadio' + index" />
                                                    <label class="form-check-label text-dark fw-semibold"
                                                        :for="'homeRadio' + index">
                                                        <span x-text="file.telephone || 'Home'"></span>
                                                        <!-- Dynamically set type or label -->
                                                    </label>
                                                </div>
                                                <!-- address -->
                                                <p class="mb-0">
                                                    <span x-text="file.city || 'N/A'"></span><br>
                                                    <br>
                                                    <span x-text="file.adresse || 'N/A'"></span><br>

                                                    United States
                                                </p>

                                                <div class="d-flex justify-content-between mt-3">
                                                    <button class="btn btn-warning btn-sm" @click="openModal(file)"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.146 0.854a2 2 0 0 1 2.828 2.828L4.5 12.5a1 1 0 0 1-.351.211l-3.5 1a1 1 0 0 1-1.21-1.21l1-3.5a1 1 0 0 1 .211-.351L11.292 2.026a2 2 0 0 1 .854-.854zM11.793 2.5l-9.192 9.193-.548 1.925 1.924-.548 9.192-9.192a1 1 0 0 0-1.415-1.415z" />
                                                        </svg>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" @click="deleteAdresse(file.id)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-dash-circle"
                                                            viewBox="0 0 16 16">
                                                            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </template>
                                </div>

                                <hr>
                                <h6 class="mb-3">Mode de paiement :</h6>
                                <div class="row">
                                    <!-- ORANGE MONEY -->
                                    <div class="col-md-2">
                                        <div class="d-md-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="nextDelivery">
                                                <label class="form-check-label ms-2 w-100" for="nextDelivery"></label>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="d-flex align-items-start">
                                                    <!-- img -->
                                                    <img src="{{ asset('orangemoney.png') }}" alt=""
                                                        class="img-fluid mb-2" style="max-width:70px;">

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <div class="d-md-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="nextDelivery">
                                                <label class="form-check-label ms-2 w-100"></label>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="d-flex align-items-start">
                                                    <!-- img -->
                                                    <img src="{{ asset('wave.png') }}" alt=""
                                                        class="img-fluid mb-2" style="max-width:25px;">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <div class="d-md-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="nextDelivery">
                                                <label class="form-check-label ms-2 w-100"></label>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="d-flex align-items-start">
                                                    <!-- img -->
                                                    <img src="{{ asset('Visa-Logo.png') }}" alt=""
                                                        class="img-fluid mb-2" style="max-width: 50px;">

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <div class="d-md-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="nextDelivery">
                                                <label class="form-check-label ms-2 w-100"></label>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="d-flex align-items-start">
                                                    <!-- img -->
                                                    <img src="{{ asset('PayPal-1024x271px.svg.png') }}" alt=""
                                                        class="img-fluid mb-2" style="max-width: 50px;">
                                                    <!-- text -->

                                                </div>

                                            </div>
                                        </div>

                                    </div>





                                </div>

                            </div>
                        </div>


                        <!-- Première colonne -->
                        <div class="col-md-4" style="position: relative; top: -70px;">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4 d-flex justify-content-between align-items-center">
                                        <h4 class="mb-1">Sommaire de l'achat </h4>

                                    </div>

                                    <div class="d-flex flex-row gap-4">
                                        <div>
                                            <img :src="`/storage/${product.images[0].imagename}`" alt="Image du produit"
                                                class="img-4by3-xl rounded">

                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="d-flex flex-column gap-1">
                                                <h4 class="mb-0 text-primary-hover" x-text="product.name"></h4>
                                                <h5 class="mb-0" x-text="`${product.price_vente} €`"></h5>
                                            </div>
                                            <span>Quantte:1</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body border-top pt-2">
                                    <ul class="list-group list-group-flush mb-0">
                                        <li class="d-flex justify-content-between list-group-item px-0">
                                            <span>Montant HT</span>
                                            <span class="text-dark fw-semibold"
                                                x-text="`${product.price_vente} €`"></span>
                                        </li>
                                        <li class="d-flex justify-content-between list-group-item px-0">
                                            <span>Montant Tva</span>
                                            <span class="text-dark fw-semibold">0.00 € </span>
                                        </li>
                                        <li class="d-flex justify-content-between list-group-item px-0">
                                            <span>Montant De Livraison </span>
                                            <span class="text-dark fw-semibold">0.00 € </span>
                                        </li>

                                        <li class="d-flex justify-content-between list-group-item px-0 pb-0">
                                            <span class="fs-4 fw-semibold text-dark">Montant TTC</span>
                                            <span class="fw-semibold text-dark">128.00 € </span>
                                        </li>
                                    </ul>
                                </div>

                            </div>

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
                showModal: false,
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

                filteredCountries() {
                    return this.listedeveliryPriceByCountries.filter(deliveryprice => {
                        return deliveryprice.country_start.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            deliveryprice.country_destination.toLowerCase().includes(this.searchQuery
                                .toLowerCase());
                    });
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
