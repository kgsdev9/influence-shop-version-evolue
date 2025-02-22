@extends('layout')
@section('title', 'Finaliser les commandes')
@section('content')
    <main class="bg-light">
        <section x-data="formSteps()">
            <div class="container  rounded-4 pe-lg-0 overflow-hidden ">
                <div class="d-flex flex-column gap-3">
                    <h5 class="mb-0 display-4 fw-bold text-warning mt-4"> Finaliser mes commandes
                    </h5>
                    <p class="mb-0 pe-xxl-8 me-xxl-5">Vous êtes sur le point de finaliser vos commandes. Assurez-vous que
                        toutes les informations sont correctes avant de valider vos achats et profiter des offres
                        exclusives.</p>

                </div>
                <div class="card mb-4 position-relative mt-4">
                    <div class="card-body">
                        <!-- Etape 1: Informations Produit -->
                        <template x-if="currentStep === 1">
                            <div>
                                <h5 class="card-title">Code de Parainage</h5>
                                <p class="card-text">Si vous avez été parrainé, entrez le code de parrainage pour profiter
                                    des avantages exclusifs.</p>


                                <div class="row">
                                    <!-- Deuxième colonne avec le formulaire -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <!-- Formulaire parannaise -->
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="code"
                                                        placeholder="code" x-model="code">
                                                    <label for="code">Code Parainage </label>
                                                    <template x-if="errors.code">
                                                        <span class="text-danger" x-text="errors.code"></span>
                                                    </template>
                                                </div>
                                            </div>
                                            <!-- Prix du produit -->
                                            <div class="col-md-3 mb-3">
                                                <div class="form-floating">
                                                    <button type="button" class="btn btn-outline-warning mt-2"
                                                        @click="showModal = true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
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
                                                            :class="selectedAdresse?.id === file.id ?
                                                                'border-success bg-light' : ''">
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
                                                                <button class="btn btn-warning btn-sm"
                                                                    @click="openModal(file)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-pencil" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M12.146 0.854a2 2 0 0 1 2.828 2.828L4.5 12.5a1 1 0 0 1-.351.211l-3.5 1a1 1 0 0 1-1.21-1.21l1-3.5a1 1 0 0 1 .211-.351L11.292 2.026a2 2 0 0 1 .854-.854zM11.793 2.5l-9.192 9.193-.548 1.925 1.924-.548 9.192-9.192a1 1 0 0 0-1.415-1.415z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm"
                                                                    @click="deleteAdresse(file.id)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z">
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
                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <div class="d-flex flex-column gap-4">
                                        <!-- Card -->
                                        <div class="card">
                                            <!-- Card Body -->
                                            <div class="card-body d-flex flex-column gap-6">
                                                <div class="">
                                                    <!-- Heading -->
                                                    <h2 class="mb-0">Merci pour votre commande</h2>
                                                    <p class="mb-0">Nous avons bien reçu votre commande, elle est
                                                        actuellement en traitement. Restez calme, vous recevrez bientôt une
                                                        confirmation !</p>
                                                </div>
                                                <div>
                                                    <template x-for="(product, index) in products" :key="index">
                                                        <div>
                                                            <div class="d-flex flex-row gap-4">
                                                                <div>
                                                                    <img :src="product.image" alt="Image du produit"
                                                                        class="img-4by3-xl rounded">
                                                                </div>
                                                                <div class="d-flex flex-column gap-2">
                                                                    <div class="d-flex flex-column gap-1">
                                                                        <h4 class="mb-0 text-primary-hover"
                                                                            x-text="product.name"></h4>
                                                                        <h5 class="mb-0" x-text="`${product.price} €`">
                                                                        </h5>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mt-3">
                                                                        <!-- Affichage de la couleur uniquement si elle existe -->
                                                                        <template x-if="product.color">
                                                                            <span class="text-dark fw-medium"
                                                                                x-text="'Couleur: ' + product.color.name"></span>
                                                                        </template>

                                                                        <!-- Affichage de la taille uniquement si elle existe -->
                                                                        <template x-if="product.taille">
                                                                            <span class="text-dark fw-medium"
                                                                                x-text="'Taille: ' + product.taille.name"></span>
                                                                        </template>
                                                                    </div>

                                                                    <span
                                                                        x-text="`Quantité: ${product.quantity || 1}`"></span>
                                                                </div>
                                                            </div>
                                                            <hr class="my-3">
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">

                                    <div class="card">
                                        <div class="card-body d-flex flex-column gap-3">
                                            <h4 class="mb-0">Récapitulatif de la commande</h4>
                                            <ul class="list-group list-group-flush">
                                                <!-- Montant HT -->
                                                <li
                                                    class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                                    <span>Montant HT :</span>
                                                    <span x-text="'€' + total.toFixed(2)"></span>
                                                </li>
                                                <!-- Poids Commande -->
                                                <li
                                                    class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                                    <span>Poids de la commande :</span>
                                                    <span x-text="totalWeight.toFixed(2) + ' kg'"></span>
                                                </li>
                                                <!-- Montant du Poids en € -->
                                                <li
                                                    class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                                    <span>Montant Poids :</span>
                                                    <span x-text="'€' + totalWeightInEuros.toFixed(2)"></span>
                                                </li>
                                                <!-- Montant TTC -->
                                                <li
                                                    class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium pb-0">
                                                    <span>Montant TTC :</span>
                                                    <span x-text="'€' + finalTotal.toFixed(2)"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <div class="px-0 d-flex justify-content-between fs-5 text-dark fw-semibold">
                                                <span>Total (EUR)</span>
                                                <span x-text="'€' + finalTotal.toFixed(2)"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid mt-4">
                                        <!-- Bouton de paiement (avec loader) -->
                                        <button type="submit" class="btn btn-outline-warning" @click="processPayment()"
                                            :disabled="isLoading">
                                            <!-- Affiche le loader si isLoading est true -->
                                            <span x-show="isLoading" class="spinner-border spinner-border-sm"
                                                role="status" aria-hidden="true"></span>
                                            <!-- Sinon, affiche le texte normal du bouton -->
                                            <span x-show="!isLoading">
                                                <i class="bi bi-credit-card"></i> Procéder au paiement
                                            </span>
                                        </button>




                                    </div>


                                </div>
                            </div>
                        </template>


                        <!-- Navigation entre les étapes -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary" @click="prevStep()"
                                :disabled="currentStep === 1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 8L9.293 3.354a.5.5 0 0 1 .708.708L6.707 8H14.5a.5.5 0 0 1 0 1H6.707l3.294 3.293a.5.5 0 0 1-.708.708L4.646 8z" />
                                </svg>
                                Précédent
                            </button>
                            <button type="button" class="btn btn-outline-secondary" @click="nextStep()"
                                :disabled="currentStep === 2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path
                                        d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                                </svg>
                                Suivant
                            </button>
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


        </section>
    </main>

@endsection

@push('script')
    <script>
        function formSteps() {
            return {
                files: [],
                currentStep: 1,
                showModal: false,
                selectedAdresse: null,
                adressepaymentid: null,
                telephone: null,
                code: '',
                isLoading: false,
                form: {
                    country_origine: '',
                    telephone: '',
                    adresse: '',
                    city: '',
                },
                products: @json($cart),
                adressepyament: @json($allAdressePayment),
                errors: {},
                isEdite: false,
                currentAdresse: '',
                nextStep() {
                    if (this.currentStep < 2) {
                        this.currentStep++;
                    }
                },

                prevStep() {
                    if (this.currentStep > 1) {
                        this.currentStep--;
                    }
                },

                selectAdresse(file) {
                    this.selectedAdresse = file;
                    this.adressepaymentid = this.selectedAdresse.id;
                    this.telephone = this.selectedAdresse.telephone;


                },

                get total() {
                    return this.products.reduce((total, product) => total + (parseFloat(product.price) * product
                        .quantity), 0);
                },
                get totalWeight() {
                    return this.products.reduce((total, product) => total + (parseFloat(product.weight) * product
                        .quantity), 0);
                },
                get totalWeightInEuros() {
                    return this.totalWeight; // 1 kg = 1€
                },
                get finalTotal() {
                    return this.total + this.totalWeightInEuros;
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

                async storeAdresse() {

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

                async processPayment() {
                    const formData = new FormData();
                    formData.append('arg', 1);
                    formData.append('telephone', this.telephone);
                    formData.append('code', this.code);
                    formData.append('adressepaymentid', this.adressepaymentid);
                    formData.append('cart', JSON.stringify(this.products)); // Assurez-vous que cart est en format JSON
                    formData.append('montantht', this.total.toFixed(2)); // Ajout du total
                    formData.append('poidtotalscmde', this.totalWeight.toFixed(2)); // Ajout du poids total
                    formData.append('poidstotalmontant', this.totalWeightInEuros.toFixed(
                        2)); // Ajout du poids converti en euros
                    formData.append('montantttc', this.finalTotal.toFixed(2)); // Ajout du montant final

                    if (!this.adressepaymentid) {
                        Swal.fire({
                            title: 'veuillez selectionner une adresse de paiement!',
                            showConfirmButton: true,
                        });

                        return;
                    }


                    if (this.isLoading) {
                        return;
                    }

                    this.isLoading = true;

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
                                window.location.href = data.payment_url;
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

            };
        }
    </script>
@endpush
