@extends('layout')
@section('title', 'Gestion des campagnes promotionnelles')
@section('content')
    <main x-data="compagnePromotionManagement()" x-init="init()">
        <section class="pt-5 pb-5 bg-light">
            <div class="container">
                <div class="row mt-0 mt-md-4">
                    @include('dashboard.nav-bar')
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-12">
                                <!-- Card header -->
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">Liste des campagnes promotionnelles</h3>
                                        <span>Gestion des campagnes.</span>
                                    </div>
                                    <!-- Nav -->
                                    <div class="nav btn-group flex-nowrap" role="tablist">
                                        <button class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            @click="showModal = true">
                                            <i class='fa fa-add'></i>
                                            Création
                                        </button>
                                    </div>
                                </div>

                                <div class="p-4 row">
                                    <!-- Form -->
                                    <form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
                                        <span class="position-absolute ps-3 search-icon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="search" class="form-control ps-6" x-model="searchTerm"
                                            @input="filterCompagnes">
                                    </form>
                                </div>

                                <div class="table-invoice table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Titre</th>
                                                <th scope="col">Entreprise</th>
                                                <th scope="col">Statut</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="compagne in paginatedCompagnes" :key="compagne.id">
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <h5 class="mb-0 text-primary-hover" x-text="compagne.title">
                                                            </h5>
                                                        </a>
                                                    </td>
                                                    <td x-text="compagne.entreprise.name"></td>
                                                    <td x-text="compagne.status"></td>
                                                    <td>
                                                        <button @click="openModal(compagne)">Editer</button>
                                                        <button @click="deleteCompagne(compagne.id)">Supprimer</button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12 col-md-7 offset-md-5 d-flex justify-content-end">
                                        <nav>
                                            <ul class="pagination">
                                                <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                                    <button class="page-link"
                                                        @click="goToPage(currentPage - 1)">Précédent</button>
                                                </li>
                                                <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                                    <button class="page-link"
                                                        @click="goToPage(currentPage + 1)">Suivant</button>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal for creating/editing a compagne -->
        <template x-if="showModal">
            <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                x-text="isEdit ? 'Modification de la campagne' : 'Création de la campagne'"></h5>
                            <button type="button" class="btn-close" @click="hideModal()"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="submitForm">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titre de la campagne</label>
                                    <input type="text" id="title" class="form-control" x-model="formData.title"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="entreprise_id" class="form-label">Entreprise</label>
                                    <select id="entreprise_id" class="form-control" x-model="formData.entreprise_id">
                                        <option value="" disabled selected>Selectionner</option>
                                        <!-- Option vide "Sélectionner" -->
                                        <template x-for="entreprise in entreprises" :key="entreprise.id">
                                            <option :value="entreprise.id" x-text="entreprise.nom"></option>
                                        </template>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" class="form-control" x-model="formData.description" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Statut</label>
                                    <select id="status" class="form-control" x-model="formData.status">
                                        <option value="active">Actif</option>
                                        <option value="inactive">Inactif</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="url_promotion" class="form-label">URL de la promotion</label>
                                    <input type="text" id="url_promotion" class="form-control"
                                        x-model="formData.url_promotion">
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    x-text="isEdit ? 'Mettre à jour' : 'Enregistrer'"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </main>
@endsection

@push('script')
    <script>
        function compagnePromotionManagement() {
            return {
                searchTerm: '',
                compagnes: @json($listecompanges),
                entreprises: @json($listeentreprise),
                filteredCompagnes: [],
                currentPage: 1,
                compagnesPerPage: 10,
                totalPages: 0,
                showModal: false,
                isEdit: false,
                formData: {
                    title: '',
                    entreprise_id: '',
                    description: '',
                    status: 'active',
                    url_promotion: ''
                },
                currentCompagne: null,

                hideModal() {
                    this.showModal = false;
                    this.resetForm();
                    this.isEdit = false;
                },

                openModal(compagne = null) {
                    this.isEdit = compagne !== null;
                    if (this.isEdit) {
                        this.currentCompagne = {
                            ...compagne
                        };
                        this.formData = {
                            ...this.currentCompagne
                        };
                    } else {
                        this.resetForm();
                    }
                    this.showModal = true;
                },

                resetForm() {
                    this.formData = {
                        title: '',
                        entreprise_id: '',
                        description: '',
                        status: 'active',
                        url_promotion: ''
                    };
                },

                async submitForm() {
                    if (!this.formData.title.trim() || !this.formData.entreprise_id) {
                        alert('Le titre et l\'entreprise sont requis');
                        return;
                    }

                    const formData = new FormData();
                    Object.keys(this.formData).forEach(key => {
                        formData.append(key, this.formData[key]);
                    });
                    if (this.currentCompagne) formData.append('compagne_promotion_id', this.currentCompagne.id);

                    try {
                        const response = await fetch('{{ route('compagne.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData,
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const compagne = data.compagne;
                            if (this.isEdit) {
                                const index = this.compagnes.findIndex(c => c.id === compagne.id);
                                if (index !== -1) {
                                    this.compagnes[index] = compagne;
                                }
                            } else {
                                this.compagnes.push(compagne);
                            }

                            this.filterCompagnes();
                            this.hideModal();
                        } else {
                            alert('Erreur lors de l\'enregistrement.');
                        }
                    } catch (error) {
                        alert('Erreur réseau');
                    }
                },

                get paginatedCompagnes() {
                    const start = (this.currentPage - 1) * this.compagnesPerPage;
                    const end = start + this.compagnesPerPage;
                    return this.filteredCompagnes.slice(start, end);
                },

                filterCompagnes() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredCompagnes = this.compagnes.filter(compagne =>
                        compagne.title.toLowerCase().includes(term) ||
                        compagne.description.toLowerCase().includes(term)
                    );
                    this.totalPages = Math.ceil(this.filteredCompagnes.length / this.compagnesPerPage);
                    this.currentPage = 1;
                },

                deleteCompagne(id) {
                    if (confirm('Êtes-vous sûr de vouloir supprimer cette campagne ?')) {
                        fetch(`{{ url('compagnes') }}/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.compagnes = this.compagnes.filter(compagne => compagne.id !== id);
                                    this.filterCompagnes();
                                } else {
                                    alert('Erreur lors de la suppression.');
                                }
                            });
                    }
                },

                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                init() {
                    this.filterCompagnes();
                }
            };
        }
    </script>
@endpush
