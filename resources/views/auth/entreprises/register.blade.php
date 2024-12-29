@extends('layout')
@section('content')
    <section class="my-5 mx-3" x-data="formSteps()">

        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">

            <div class="d-flex flex-column gap-3">
                <h1 class="mb-0 display-4 fw-bold text-warning">Rejoignez InfluenceShop pour promouvoir vos produits auprès
                    d’une audience ciblée et engagée.
                </h1>
                <p class="mb-0 pe-xxl-8 me-xxl-5">Boostez la visibilité de vos produits. InfluenceShop vous connecte aux
                    influenceurs qui peuvent promouvoir vos produits ou services directement auprès de leurs communautés..
                </p>
            </div>

            <div class="card mb-4 position-relative mt-4">
                <div class="card-body">
                    <h5 class="card-title">Informations sur votre entreprises</h5>
                    <p class="card-text">Veuillez remplir vos informations pour enrichir votre profil.</p>
                    <div>
                        <div class="row">
                            <!-- Nom -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nom" placeholder="Nom"
                                        x-model="form.name_entreprise" required>
                                    <label for="nom">Nom De l'entreprise</label>
                                    <template x-if="errors.name_entreprise">
                                        <span class="text-danger" x-text="errors.name_entreprise"></span>
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
                                    <input type="text" class="form-control" id="telephone" placeholder="Telephone"
                                        x-model="form.phone" required>
                                    <label for="telephone">Telephone</label>
                                    <template x-if="errors.phone">
                                        <span class="text-danger" x-text="errors.phone"></span>
                                    </template>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="siteweb" placeholder="siteweb"
                                        x-model="form.siteweb" required>
                                    <label for="siteweb">Site web </label>
                                    <template x-if="errors.siteweb">
                                        <span class="text-danger" x-text="errors.siteweb"></span>
                                    </template>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="adresse" placeholder="Adresse"
                                        x-model="form.adresse">
                                    <label for="adresse">Adresse</label>
                                    <template x-if="errors.adresse">
                                        <span class="text-danger" x-text="errors.adresse"></span>
                                    </template>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
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


                            <div class="col-md-4 mb-3">
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



                            <!-- Bio -->
                            <div class="col-md-9 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="description" placeholder="description" x-model="form.description"></textarea>
                                    <label for="bio">Description de votre entreprise</label>
                                    <template x-if="errors.description">
                                        <span class="text-danger" x-text="errors.description"></span>
                                    </template>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="code" placeholder="code"
                                        x-model="form.code" required>
                                    <label for="telephone">Code de connexion</label>
                                    <template x-if="errors.code">
                                        <span class="text-danger" x-text="errors.code"></span>
                                    </template>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-secondary "
                        @click="storeEntreprise()">Enregistrer</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function formSteps() {
            return {

                form: {
                    name_entreprise: '',
                    email: '',
                    phone: '',
                    siteweb: '',
                    adresse: '',
                    city_id: '',
                    country_id: '',
                    description: '',
                    code: '',
                },
                errors: {},
                validateEmail(email) {
                    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return regex.test(email);
                },


                validateForm() {
                    this.errors = {}; // Réinitialiser les erreurs

                    // Validation des champs
                    if (!this.form.name_entreprise) this.errors.name_entreprise = 'Le nom est requis.';
                    if (!this.form.email) {
                        this.errors.email = 'Le champ Email est requis.';
                    } else if (!this.validateEmail(this.form.email)) {
                        this.errors.email = 'L\'adresse email n\'est pas valide.';
                    }

                    if (!this.form.phone) this.errors.phone = 'Le champ Téléphone est requis.';
                    if (!this.form.adresse) this.errors.adresse = 'Veuillez saisir votre adresse.';
                    if (!this.form.country_id) this.errors.country_id = 'Veuillez sélectionner un pays.';
                    if (!this.form.description) this.errors.description = 'Veuillez décrire votre entreprise.';
                    if (!this.form.city_id) this.errors.city_id = 'Veuillez sélectionner une ville.';
                    if (!this.form.code) this.errors.code = 'Veuillez un saisir votre code.';

                    // Retourne true si tout est valide
                    return Object.keys(this.errors).length === 0;
                },

                async storeEntreprise() {


                    if (!this.validateForm()) {

                        return;
                    }
                    const formData = new FormData();
                    formData.append('name_entreprise', this.form.name_entreprise);
                    formData.append('code', this.form.code);
                    formData.append('email', this.form.email);
                    formData.append('phone', this.form.phone);
                    formData.append('city_id', this.form.city_id);
                    formData.append('country_id', this.form.country_id);
                    formData.append('adresse', this.form.adresse);
                    formData.append('description', this.form.description);
                    formData.append('siteweb', this.form.siteweb);

                    try {

                        const response = await fetch('{{ route('entreprise.submit') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();

                            // window.location.href = '/confirmationregister';
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

                // storeEntreprise() {

                //     if (!this.validateForm()) {

                //         return;
                //     }


                //     const formData = new FormData();
                //     formData.append('name_entreprise', this.form.name_entreprise);
                //     formData.append('code', this.form.code);
                //     formData.append('email', this.form.email);
                //     formData.append('phone', this.form.phone);
                //     formData.append('city_id', this.form.city_id);
                //     formData.append('country_id', this.form.country_id);
                //     formData.append('adresse', this.form.adresse);
                //     formData.append('description', this.form.description);



                // },
            }
        }
    </script>
@endpush
