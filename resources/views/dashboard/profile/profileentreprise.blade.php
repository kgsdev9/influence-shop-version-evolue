@extends('layout')
@section('title', 'Edition profil entreprise')
@section('content')
    <main x-data="profileManagement()" x-init="init()">
        <section class="pt-5 pb-5 bg-light">
            <div class="container">
                <div class="row mt-0 mt-md-4">
                    @include('dashboard.nav-bar')
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0">Modifier le Profil Entreprise</h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <img src="../assets/images/avatar/avatar-1.jpg" id="img-uploaded"
                                                class="avatar-xl rounded-circle" alt="avatar">
                                        </div>
                                    </div>
                                    <hr class="my-5">

                                    <!-- Formulaire de modification -->
                                    <div>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input x-model="email" type="email" class="form-control"
                                                    placeholder="Email" required readonly>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Nom de l'entreprise</label>
                                                <input x-model="nom_entreprise" type="text" class="form-control"
                                                    placeholder="Nom de l'entreprise" required>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Code Profil</label>
                                                <input x-model="codeprofile" type="text" class="form-control"
                                                    placeholder="Code Profil" readonly>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Type d'entreprise</label>
                                                <input x-model="type_entreprise" type="text" class="form-control"
                                                    placeholder="Type d'entreprise" required>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Capital</label>
                                                <input x-model="capital" type="text" class="form-control"
                                                    placeholder="Capital" required>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Site Web</label>
                                                <input x-model="siteweb" type="text" class="form-control"
                                                    placeholder="Site Web" required>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Adresse</label>
                                                <input x-model="adresse" type="text" class="form-control"
                                                    placeholder="Adresse" required>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Description</label>
                                                <textarea x-model="description" class="form-control" placeholder="Description de l'entreprise"></textarea>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Pays</label>
                                                <select x-model="country_id" class="form-select" required>
                                                    <option value="">Sélectionnez un pays</option>
                                                    @foreach ($allCountries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Mot de passe</label>
                                                <input x-model="password" type="password" class="form-control"
                                                    placeholder="Mot de passe">
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2" @click="saveChanges()">
                                                    <button class="btn btn-warning">
                                                        Modifier
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button @click="confirmDelete()" class="btn btn-danger">
                                                        Supprimer le compte
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal for Account Deletion -->
        <template x-if="showDeleteModal">
            <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" @click="showDeleteModal = false"></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
                            <div>
                                <button @click="deleteAccount" class="btn btn-danger">Oui, supprimer</button>
                                <button @click="showDeleteModal = false" class="btn btn-secondary">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

    </main>
@endsection

@push('script')
    <script>
        function profileManagement() {
            return {
                user: @json($user),
                email: '',
                nom_entreprise: '',
                codeprofile: '',
                type_entreprise: '',
                capital: '',
                siteweb: '',
                adresse: '',
                description: '',
                country_id: '',
                password: '',
                showDeleteModal: false,

                init() {
                    this.email = this.user.email;
                    this.nom_entreprise = this.user.nom_entreprise;
                    this.codeprofile = this.user.codeprofile;
                    this.type_entreprise = this.user.type_entreprise;
                    this.capital = this.user.capital;
                    this.siteweb = this.user.siteweb;
                    this.adresse = this.user.adresse;
                    this.description = this.user.description;
                    this.country_id = this.user.country_id;
                },

                saveChanges() {
                    fetch('{{ route('profile.update') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                email: this.email,
                                nom_entreprise: this.nom_entreprise,
                                codeprofile: this.codeprofile,
                                type_entreprise: this.type_entreprise,
                                capital: this.capital,
                                siteweb: this.siteweb,
                                adresse: this.adresse,
                                description: this.description,
                                country_id: this.country_id,
                                password: this.password,
                                arg: 2
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Profil ajouté au panier!',
                                    showConfirmButton: true,

                                });
                            } 
                        });
                },

                confirmDelete() {
                    this.showDeleteModal = true;
                },

                deleteAccount() {
                    fetch('{{ route('profile.delete') }}', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.href = '{{ route('login') }}';
                            } else {
                                alert('Échec de la suppression du compte.');
                            }
                        });
                }
            };
        }
    </script>
@endpush
