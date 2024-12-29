@extends('layout')
@section('content')
    <section class="my-5 mx-3" x-data="formSteps()">

        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">

            <div class="d-flex flex-column gap-3">
                <h1 class="mb-0 display-4 fw-bold text-warning"> Monétisez votre audience et collaborez avec les plus grandes
                    marques
                </h1>
                <p class="mb-0 pe-xxl-8 me-xxl-5">Transformez votre influence en revenus. Influence Shop vous connecte
                    directement à des marques qui souhaitent promouvoir leurs produits ou services auprès de votre
                    communauté.</p>
            </div>

            <div class="card mb-4 position-relative mt-4" x-show="step === 1" class="step active">
                <div class="card-body">


                    <h5 class="card-title">Informations du Profil</h5>
                    <p class="card-text">Veuillez remplir vos informations pour enrichir votre profil.</p>
                    <div>
                        <div class="row">
                            <!-- Nom -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nom" placeholder="Nom"
                                        x-model="form.nom" required>
                                    <label for="nom">Nom</label>
                                    <template x-if="errors.nom">
                                        <span class="text-danger" x-text="errors.nom"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Prénom -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="prenom" placeholder="Prenom"
                                        x-model="form.prenom" required>
                                    <label for="prenom">Prenom</label>
                                    <template x-if="errors.prenom">
                                        <span class="text-danger" x-text="errors.prenom"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        x-model="form.email" required>
                                    <label for="email">Email</label>
                                    <template x-if="errors.email">
                                        <span class="text-danger" x-text="errors.email"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Téléphone -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="telephone" placeholder="Téléphone"
                                        x-model="form.phone" required>
                                    <label for="telephone">Téléphone</label>
                                    <template x-if="errors.phone">
                                        <span class="text-danger" x-text="errors.phone"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Numéro WhatsApp -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="whatsapp" placeholder="Numéro WhatsApp"
                                        x-model="form.whatsapp">
                                    <label for="whatsapp">Numéro WhatsApp</label>
                                </div>
                            </div>

                            <!-- Adresse -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="adresse" placeholder="Adresse"
                                        x-model="form.adresse">
                                    <label for="adresse">Adresse</label>
                                    <template x-if="errors.adresse">
                                        <span class="text-danger" x-text="errors.adresse"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Catégorie -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="category_id" x-model="form.category_id" required>
                                        <option value="" selected>Selectionner une catégorie</option>
                                        @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">Catégorie mise en avant</label>
                                    <template x-if="errors.category_id">
                                        <span class="text-danger" x-text="errors.category_id"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Pays -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="country_id" x-model="form.country_id" required>
                                        <option value="" selected>Sélectionnez un pays</option>
                                        @foreach ($allCountries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="country_id">Pays</label>
                                    <template x-if="errors.country_id">
                                        <span class="text-danger" x-text="errors.country_id"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Ville -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="city_id" x-model="form.city_id" required>
                                        <option value="" selected>Sélectionnez une ville</option>
                                        @foreach ($allCites as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="city_id">Ville</label>
                                    <template x-if="errors.city_id">
                                        <span class="text-danger" x-text="errors.city_id"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Tarif Moyen -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="average_rate"
                                        placeholder="Tarif moyen" x-model="form.average_rate">
                                    <label for="average_rate">Tarif moyen (€)</label>
                                </div>
                            </div>

                            <!-- Bio -->
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="bio" placeholder="Bio" x-model="form.bio"></textarea>
                                    <label for="bio">Bio</label>
                                </div>
                            </div>


                        </div>


                    </div>

                    <button type="button" class="btn btn-outline-secondary " @click="nextStep()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path
                                d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                        </svg>
                        Suivant
                    </button>

                </div>
            </div>

            <div class="card mb-4 position-relative mt-4" x-show="step === 2" class="step active">
                <div class="card-body">
                    <h5 class="card-title">Quelle est la valeur de votre compte ? </h5>
                    <p class="card-text">Renseigner les informations sur vos réseaux sociaux.</p>


                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="form-floating">
                                <input type="text" x-model="newProfile.namecompte" class="form-control"
                                    id="nom" placeholder="Nom du compte"
                                    :class="{ 'is-invalid': errors.namecompte }" required>
                                <label for="nom">Nom du compte</label>
                                <div x-show="errors.namecompte" class="invalid-feedback">
                                    Ce champ est requis.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-floating">
                                <select x-model="newProfile.reseausocial" class="form-select" id="reseausocial"
                                    :class="{ 'is-invalid': errors.reseausocial }" required>
                                    <option value="" disabled selected>Sélectionnez un réseau social</option>
                                    <template x-for="network in socialNetworks" :key="network">
                                        <option :value="network" x-text="network"></option>
                                    </template>
                                </select>
                                <label for="reseausocial">Réseau Social</label>
                                <div x-show="errors.reseausocial" class="invalid-feedback">
                                    Ce champ est requis.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-floating">
                                <input type="number" x-model="newProfile.nbabonne" class="form-control" id="nbabonne"
                                    placeholder="Abonnés" :class="{ 'is-invalid': errors.nbabonne }" required>
                                <label for="nbabonne">Nombre d'abonnés</label>
                                <div x-show="errors.nbabonne" class="invalid-feedback">
                                    Ce champ est requis.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="d-flex justify-content-start gap-2">
                                <button type="button" class="btn btn-primary" @click="addProfile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z" />
                                    </svg>
                                </button>

                                <button type="button" class="btn btn-danger" @click="clearAllProfiles">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <template x-for="(profile, index) in form.socialProfiles" :key="index">
                            <div class="col-md-4 mb-3"> <!-- col-md-4 pour que chaque carte prenne un tiers de la ligne -->
                                <div class="card p-3">
                                    <div class="d-flex align-items-start">
                                        <!-- Icone du réseau social (SVG) -->
                                        <div class="me-3">
                                            <svg width="40" height="40" viewBox="0 0 16 16" fill="#6c757d"
                                                class="bi bi-facebook">
                                                <path
                                                    d="M8 0C3.58 0 0 3.58 0 8c0 4.417 3.418 8 8 8 3.84 0 7.104-2.698 7.74-6.417H10.2v-2.5h5.58V8h-5.58V6.5c0-1.475.77-2.5 2.153-2.5H15V1.21c-1.199-.263-2.511-.41-3.845-.41C9.594.8 8 2.16 8 4.035v2.065H5.995v2.5h2.005V16.42c-2.858.717-5.996-1.515-6.27-4.748.304.028.617.042.92.042 3.42 0 6.2-2.778 6.2-6.21 0-3.423-2.78-6.21-6.2-6.21z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <!-- Affichage des valeurs ajoutées -->
                                            <h5 class="card-title m-0" x-text="profile.namecompte">Nom du Compte</h5>
                                            <p class="text-muted m-0" x-text="profile.reseausocial">Type de Réseau</p>
                                            <p class="text-muted" x-text="'Abonnés: ' + profile.nbabonne">Abonnés: 5,000
                                            </p>
                                        </div>
                                        <!-- Bouton supprimer -->
                                        <button @click="removeProfile(index)" class="btn btn-light btn-sm ms-auto"
                                            title="Supprimer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div x-show="form.socialProfiles.length > 0" class="alert alert-success mt-3">
                        Profils ajoutés avec succès !
                    </div>

                    <button type="button" class="btn btn-secondary  gap-2" @click="prevStep()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path
                                d="M11.293 13.293a1 1 0 0 1 0-1.414L7.414 8l3.879-3.879a1 1 0 1 1 1.414 1.414L9.414 8l5.172 5.172a1 1 0 0 1-1.414 1.414z" />
                        </svg>
                        <span>Précédent</span>
                    </button>

                    <button type="button" class="btn btn-outline-secondary " @click="nextStep()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path
                                d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                        </svg>
                        Suivant
                    </button>
                </div>
            </div>


            <div class="card mb-4 position-relative mt-4" x-show="step === 3" class="step active">

                <section class="container d-flex flex-column vh-20">

                    <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                        <!-- Docs -->
                        <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-12 text-center text-lg-start">
                            <h1 class="display-3 mb-2 fw-bold">Plus qu'une dernière étape</h1>
                            <p class="mb-4 fs-4">Félicitations ! Vous êtes sur le point de rejoindre les influenceurs
                                d'Influence Shop. Il vous suffit de compléter cette dernière étape pour faire partie de
                                notre réseau.</p>

                            <hr class="my-4">
                            <div>
                                <h3 class="mb-3">Veuillez entrer le code pour accéder à votre espace unique.</h3>

                                <div class="col-md-10">
                                    <div class="form-floating">
                                        <input type="text" x-model="form.codeprive" class="form-control mb-2"
                                            id="uniqueCode" placeholder="Entrer un code privé unique" required>
                                        <label for="uniqueCode">Code privé unique</label>
                                    </div>
                                </div>

                                <div class="col-md-10 d-grid">
                                    <button type="button" @click="submitInfluencor()"
                                        class="btn btn-warning mb-2">Términer</button>
                                </div>

                                <div class="col-md-10 d-grid mt-2">
                                    <button type="button" class="btn btn-secondary mb-2"
                                        @click="prevStep()">Retourner</button>
                                </div>

                            </div>
                        </div>
                        <!-- img -->
                        <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
                            <img src="{{ asset('3d-girl.png') }}" alt="maintenance" class="w-100">
                        </div>
                    </div>


                </section>
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
                    whattssap: '',
                    city_id: '',
                    country_id: '',
                    adresse: '',
                    category_id: '',
                    bio: '',
                    average_rate: '',
                    socialProfiles: [],
                },
                socialNetworks: ['Facebook', 'Instagram', 'Twitter', 'TikTok'],
                errors: {},

                newProfile: {
                    namecompte: '',
                    reseausocial: '',
                    nbabonne: ''
                },

                nextStep() {
                    if (this.step == 1) {
                        // Appeler la fonction validateStep
                        const isValid = this.validateStep();

                        // Si la validation échoue, arrêter ici
                        if (!isValid) {
                            return;
                        }
                    }

                    // Incrémenter l'étape si on est en-dessous de 3
                    if (this.step < 3) {
                        this.step++;
                    }
                },


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


                validateEmail(email) {
                    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return regex.test(email);
                },



                clearAllProfiles() {
                    this.form.socialProfiles = [];

                    this.newProfile = {
                        namecompte: '',
                        reseausocial: '',
                        nbabonne: ''
                    };

                },

                addProfile() {

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
