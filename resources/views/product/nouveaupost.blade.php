@extends('layout')
@section('content')
    <section class="my-5 mx-3" x-data="formSteps()">

        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">

            <div class="d-flex flex-column gap-3">
                <h1 class="mb-0 display-4 fw-bold text-warning"> Enregistrer un nouveau produit
                </h1>
                <p class="mb-0 pe-xxl-8 me-xxl-5">Transformez votre influence en revenus. Influence Shop vous connecte
                    directement à des marques qui souhaitent promouvoir leurs produits ou services auprès de votre
                    communauté.</p>
            </div>

            <div class="card mb-4 position-relative mt-4">
                <div class="card-body">
                    <h5 class="card-title">Informations du Produit</h5>
                    <p class="card-text">Veuillez remplir les informations pour enregistrer votre produit.</p>
                    <div>
                        <div class="row">
                            <!-- Nom du produit -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_name"
                                        placeholder="Nom du produit" x-model="form.product_name" required>
                                    <label for="product_name">Nom du produit</label>
                                    <template x-if="errors.product_name">
                                        <span class="text-danger" x-text="errors.product_name"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Prix du produit -->
                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_price" placeholder="Prix"
                                        x-model="form.product_price" required>
                                    <label for="product_price">Prix (€)</label>
                                    <template x-if="errors.product_price">
                                        <span class="text-danger" x-text="errors.product_price"></span>
                                    </template>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_price" placeholder="Prix"
                                        x-model="form.product_price" required>
                                    <label for="product_price">Qte Dispo</label>
                                    <template x-if="errors.product_price">
                                        <span class="text-danger" x-text="errors.product_price"></span>
                                    </template>
                                </div>
                            </div>


                            <!-- Catégorie du produit -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="product_category" x-model="form.product_category"
                                        required>
                                        <option value="" selected>Selectionner une catégorie</option>
                                        @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product_category">Catégorie du produit</label>
                                    <template x-if="errors.product_category">
                                        <span class="text-danger" x-text="errors.product_category"></span>
                                    </template>
                                </div>
                            </div>

                            <h6 class="mb-3">Ajoutez des photos :</h6>

                            <div x-data="{ files: [] }">
                                <div class="row">
                                    <!-- Boucle pour les inputs de fichier -->
                                    <template x-for="(file, index) in files" :key="index">

                                        <div class="col-md-3 col-sm-3 text-center mt-2">
                                            <div class="border rounded shadow-sm p-2 bg-light position-relative"
                                                style="cursor: pointer; border: 1px solid #ddd;"
                                                @click="document.getElementById(`fileInput${index}`).click()">
                                                <!-- Aperçu de l'image -->
                                                <template x-if="file.preview">
                                                    <img :src="file.preview" class="img-fluid rounded"
                                                        style="max-height: 150px; width: 100%; object-fit: cover;"
                                                        alt="Aperçu">
                                                </template>
                                                <template x-if="!file.preview">
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="height: 150px;">
                                                        <i class="bi bi-camera"
                                                            style="font-size: 2rem; color: #6c757d;"></i>
                                                    </div>
                                                </template>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm mt-2"
                                                @click="files.splice(index, 1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z" />
                                                </svg>
                                            </button>
                                            <input type="file" :id="'fileInput' + index" class="d-none" accept="image/*"
                                                @change="handleFileChange($event, index)">
                                        </div>
                                    </template>



                                </div>

                                <div class="col-md-2 mt-2">
                                    <button type="button" class="btn btn-outline-warning btn-sm" @click="addFileSlot()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z" />
                                        </svg>
                                    </button>


                                </div>

                            </div>



                            <!-- Description du produit -->
                            <div class="col-md-12 mb-3 mt-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_description"
                                        placeholder="Description du produit" x-model="form.product_description" required>
                                    <label for="product_description">Description du produit</label>
                                    <template x-if="errors.product_description">
                                        <span class="text-danger" x-text="errors.product_description"></span>
                                    </template>
                                </div>
                            </div>



                        </div>

                    </div>

                    <button type="button" class="btn btn-outline-secondary mt-4" @click="nextStep()">
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
                step: 1,
                form: {
                    nom: '',
                    prenom: '',
                    codeprive: '',
                    email: '',
                    phone: '',

                },
                socialNetworks: ['Facebook', 'Instagram', 'Twitter', 'TikTok'],
                errors: {},

                validateStep() {
                    this.errors = {}; // Réinitialiser les erreurs

                    // Validation des champs
                    if (!this.form.nom) this.errors.nom = 'Le champ Nom est requis.';
                    if (!this.form.prenom) this.errors.prenom = 'Le champ Prénom est requis.';
                    if (!this.form.email) {
                        this.errors.email = 'Le champ Email est requis.';
                    } else if (!this.validateEmail(this.form.email)) {
                        this.errors.email = 'L\'adresse email n\'est pas valide.';
                    }
                    if (!this.form.phone) this.errors.phone = 'Le champ Téléphone est requis.';
                    if (!this.form.adresse) this.errors.adresse = 'Le champ Adresse est requis.';
                    if (!this.form.category_id) this.errors.category_id = 'Veuillez sélectionner une catégorie.';
                    if (!this.form.country_id) this.errors.country_id = 'Veuillez sélectionner un pays.';
                    if (!this.form.city_id) this.errors.city_id = 'Veuillez sélectionner une ville.';

                    // Retourne true si tout est valide
                    return Object.keys(this.errors).length === 0;
                },


                addFileSlot() {
                    this.files.push({
                        preview: null
                    });
                },
                handleFileChange(event, index) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.files[index].preview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                },

                clearAllProfiles() {
                    this.form.socialProfiles = [];

                    this.newProfile = {
                        namecompte: '',
                        reseausocial: '',
                        nbabonne: ''
                    };

                },

                addTag() {

                    this.errors.namecompte = !this.newProfile.namecompte;
                    this.errors.reseausocial = !this.newProfile.reseausocial;
                    this.errors.nbabonne = !this.newProfile.nbabonne;

                    // Si tous les champs sont valides, ajouter le profil
                    if (!this.errors.namecompte && !this.errors.reseausocial && !this.errors.nbabonne) {

                        this.form.socialProfiles.push({
                            ...this.newProfile
                        });

                        // Réinitialiser le formulaire après ajout
                        this.newProfile = {
                            namecompte: '',
                            reseausocial: '',
                            nbabonne: ''
                        };
                    }
                },


                removeProfile(index) {
                    // Suppression d'un profil social par son index
                    this.form.socialProfiles.splice(index, 1);
                },

                prevStep() {
                    if (this.step > 1) {
                        this.step--;
                    }
                },

                async submitInfluencor() {

                    const formData = new FormData();
                    formData.append('nom', this.form.nom);
                    formData.append('prenom', this.form.prenom);
                    formData.append('codeprive', this.form.codeprive);
                    formData.append('email', this.form.email);
                    formData.append('phone', this.form.phone);
                    formData.append('whattssap', this.form.whattssap);
                    formData.append('city_id', this.form.city_id);
                    formData.append('country_id', this.form.country_id);
                    formData.append('adresse', this.form.adresse);
                    formData.append('category_id', this.form.category_id);
                    formData.append('bio', this.form.bio);
                    formData.append('average_rate', this.form.average_rate);
                    formData.append('socialProfiles', JSON.stringify(this.form.socialProfiles));

                    try {

                        const response = await fetch('{{ route('infuenceur') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();

                            window.location.href = '/confirmationregister';
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
                    } finally {
                        // this.isLoading = false;
                    }
                },

            }
        }
    </script>
@endpush
