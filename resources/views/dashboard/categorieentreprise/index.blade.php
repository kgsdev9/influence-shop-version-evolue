@extends('layout')
@section('title', 'Liste des catégories d\'entreprises')
@section('content')
<main x-data="categoryEntrepriseSearch()" x-init="init()">
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
                                    <h3 class="mb-0">Liste des catégories d'entreprises</h3>
                                    <span>Gestion des catégories.</span>
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
                                        @input="filterCategories">
                                </form>
                            </div>

                            <div class="table-invoice table-responsive">
                                <table class="table mb-0 text-nowrap table-centered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="category in paginatedCategories" :key="category.id">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-inherit">
                                                        <h5 class="mb-0 text-primary-hover" x-text="category.name"></h5>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button @click="openModal(category)">Editer</button>
                                                    <button @click="deleteCategory(category.id)">Supprimer</button>
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

    <template x-if="showModal">
        <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" x-text="isEdite ? 'Modification' : 'Création'"></h5>
                        <button type="button" class="btn-close" @click="hideModal()"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom de la catégorie</label>
                                <input type="text" id="name" class="form-control" x-model="formData.name" required>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                x-text="isEdite ? 'Mettre à jour' : 'Enregistrer'"></button>
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
    function categoryEntrepriseSearch() {
        return {
            searchTerm: '',
            categories: @json($listecategoryentreprise),
            filteredCategories: [],
            currentPage: 1,
            categoriesPerPage: 10,
            totalPages: 0,
            showModal: false,
            isEdite: false,
            formData: { name: '' },
            currentCategory: null,

            hideModal() {
                this.showModal = false;
                this.currentCategory = null;
                this.resetForm();
                this.isEdite = false;
            },

            openModal(category = null) {
                this.isEdite = category !== null;
                if (this.isEdite) {
                    this.currentCategory = { ...category };
                    this.formData = { name: this.currentCategory.name };
                } else {
                    this.resetForm();
                }
                this.showModal = true;
            },

            resetForm() {
                this.formData = { name: '' };
            },

            async submitForm() {
                if (!this.formData.name.trim()) {
                    alert('Le nom de la catégorie est requis');
                    return;
                }

                const formData = new FormData();
                formData.append('name', this.formData.name);
                if (this.currentCategory) formData.append('category_entreprise_id', this.currentCategory.id);

                try {
                    const response = await fetch('{{ route('categoryentreprise.store') }}', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: formData,
                    });

                    if (response.ok) {
                        const data = await response.json();
                        const category = data.category;
                        if (this.isEdite) {
                            const index = this.categories.findIndex(c => c.id === category.id);
                            if (index !== -1) {
                                this.categories[index] = category;
                            }
                        } else {
                            this.categories.push(category);
                        }

                        this.filterCategories();
                        this.hideModal();
                    } else {
                        alert('Erreur lors de l\'enregistrement.');
                    }
                } catch (error) {
                    alert('Erreur réseau');
                }
            },

            get paginatedCategories() {
                const start = (this.currentPage - 1) * this.categoriesPerPage;
                const end = start + this.categoriesPerPage;
                return this.filteredCategories.slice(start, end);
            },

            filterCategories() {
                const term = this.searchTerm.toLowerCase();
                this.filteredCategories = this.categories.filter(category => category.name.toLowerCase().includes(term));
                this.totalPages = Math.ceil(this.filteredCategories.length / this.categoriesPerPage);
                this.currentPage = 1;
            },

            deleteCategory(id) {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
                    fetch(`{{ url('categories') }}/${id}`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.categories = this.categories.filter(category => category.id !== id);
                            this.filterCategories();
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
                this.filterCategories();
            }
        };
    }
</script>
@endpush
