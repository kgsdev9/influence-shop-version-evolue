@extends('layout')
@section('title', 'Liste des entreprises')
@section('content')
<main x-data="entrepriseManagement()" x-init="init()">
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
                                    <h3 class="mb-0">Liste des entreprises</h3>
                                    <span>Gestion des entreprises.</span>
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
                                        @input="filterCompanies">
                                </form>
                            </div>

                            <div class="table-invoice table-responsive">
                                <table class="table mb-0 text-nowrap table-centered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="company in paginatedCompanies" :key="company.id">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-inherit">
                                                        <h5 class="mb-0 text-primary-hover" x-text="company.entreprise.nom"></h5>
                                                    </a>
                                                </td>
                                                <td x-text="company.email"></td>
                                                <td x-text="company.statut"></td>
                                                <td>
                                                    <button @click="openModal(company)">Editer</button>
                                                    <button @click="deleteCompany(company.id)">Supprimer</button>
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
                                            </li>
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

    <!-- Modal for creating/editing an entreprise -->
    <template x-if="showModal">
        <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" x-text="isEdit ? 'Modification de l\'entreprise' : 'Création d\'une entreprise'"></h5>
                        <button type="button" class="btn-close" @click="hideModal()"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitForm">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom de l'entreprise</label>
                                <input type="text" id="nom" class="form-control" x-model="formData.nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" x-model="formData.email" required>
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" id="telephone" class="form-control" x-model="formData.telephone">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" id="adresse" class="form-control" x-model="formData.adresse">
                            </div>
                            <div class="mb-3">
                                <label for="statut" class="form-label">Statut</label>
                                <input type="text" id="statut" class="form-control" x-model="formData.statut">
                            </div>
                            <div class="mb-3">
                                <label for="category_entreprise_id" class="form-label">Catégorie d'entreprise</label>
                                <select id="category_entreprise_id" class="form-control" x-model="formData.category_entreprise_id">
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.id" x-text="category.name"></option>
                                    </template>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" x-text="isEdit ? 'Mettre à jour' : 'Enregistrer'"></button>
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
    function entrepriseManagement() {
        return {
            searchTerm: '',
            companies: @json($company),
            categories: @json($listeCategoryEntreprise),
            filteredCompanies: [],
            currentPage: 1,
            companiesPerPage: 10,
            totalPages: 0,
            showModal: false,
            isEdit: false,
            formData: {
                nom: '',
                email: '',
                telephone: '',
                adresse: '',
                statut: '',
                category_entreprise_id: ''
            },
            currentCompany: null,

            hideModal() {
                this.showModal = false;
                this.resetForm();
                this.isEdit = false;
            },

            openModal(company = null) {
                this.isEdit = company !== null;
                if (this.isEdit) {
                    this.currentCompany = { ...company };
                    this.formData = { ...this.currentCompany };
                } else {
                    this.resetForm();
                }
                this.showModal = true;
            },

            resetForm() {
                this.formData = {
                    nom: '',
                    email: '',
                    telephone: '',
                    adresse: '',
                    statut: '',
                    category_entreprise_id: ''
                };
            },

            async submitForm() {
                if (!this.formData.nom.trim() || !this.formData.email.trim()) {
                    alert('Le nom et l\'email sont requis');
                    return;
                }

                const formData = new FormData();
                Object.keys(this.formData).forEach(key => {
                    formData.append(key, this.formData[key]);
                });
                if (this.currentCompany) formData.append('company_id', this.currentCompany.id);

                try {
                    const response = await fetch('{{ route('entreprise.store') }}', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: formData,
                    });

                    if (response.ok) {
                        const data = await response.json();
                        const company = data.company;
                        if (this.isEdit) {
                            const index = this.companies.findIndex(c => c.id === company.id);
                            if (index !== -1) {
                                this.companies[index] = company;
                            }
                        } else {
                            this.companies.push(company);
                        }

                        this.filterCompanies();
                        this.hideModal();
                    } else {
                        alert('Erreur lors de l\'enregistrement.');
                    }
                } catch (error) {
                    alert('Erreur réseau');
                }
            },

            get paginatedCompanies() {
                const start = (this.currentPage - 1) * this.companiesPerPage;
                const end = start + this.companiesPerPage;
                return this.filteredCompanies.slice(start, end);
            },

            filterCompanies() {
                const term = this.searchTerm.toLowerCase();
                this.filteredCompanies = this.companies.filter(company =>
                    company.nom.toLowerCase().includes(term) ||
                    company.email.toLowerCase().includes(term)
                );
                this.totalPages = Math.ceil(this.filteredCompanies.length / this.companiesPerPage);
                this.currentPage = 1;
            },

            deleteCompany(id) {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?')) {
                    fetch(`{{ url('entreprises') }}/${id}`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.companies = this.companies.filter(company => company.id !== id);
                            this.filterCompanies();
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
                this.filterCompanies();
            }
        };
    }
</script>
@endpush
