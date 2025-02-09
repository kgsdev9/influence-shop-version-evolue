@extends('layout')
@section('title', 'Edition profile')
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
                                    <h3 class="mb-0">Profile Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <img src="../assets/images/avatar/avatar-1.jpg" id="img-uploaded"
                                                class="avatar-xl rounded-circle" alt="avatar">
                                        </div>
                                    </div>
                                    <hr class="my-5">

                                    <div>
                                        <!-- Personal Info Form -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label">Nom</label>
                                            <input x-model="firstName" type="text" class="form-control" required="">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label">Prénom</label>
                                            <input x-model="lastName" type="text" class="form-control" required="">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="profileEditPhone">Téléphone</label>
                                            <input x-model="phone" type="text" class="form-control" placeholder="Phone"
                                                required="">
                                        </div>

                                        <div class="row">
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
                phone: '',
                lastName: '',
                firstName: '',
                showDeleteModal: false,
                init() {
                    this.firstName = this.user.nom;
                    this.lastName = this.user.prenom;
                    this.phone = this.user.telephone;
                },

                saveChanges() {
                    fetch('{{ route('profile.update') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                first_name: this.firstName,
                                last_name: this.lastName,
                                phone: this.phone,
                                arg: 1,
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Profil mis à jour avec succès!');
                            } else {
                                alert('Erreur lors de la mise à jour du profil.');
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
