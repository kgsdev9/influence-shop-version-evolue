@extends('layout')
@section('title', 'Lidte des commandes')
@section('content')
    <main x-data="productSearch()" x-init="init()">
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
                                        <h3 class="mb-0">Gestion des compagnes </h3>
                                        <span>Gestion des compagnes .</span>
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
                                            @input="filterProducts">
                                    </form>
                                </div>

                                <div class="table-invoice table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Libelle</th>
                                                <th scope="col">Produit</th>
                                                <th scope="col">Entreprise</th>
                                                <th scope="col">Date debut </th>
                                                <th scope="col">Date fin </th>

                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="product in paginatedProducts" :key="product.id">
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-inherit">

                                                            <div class="">
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="truncateText(product.name, 20)"></h5>
                                                            </div>
                                </div>
                                </a>
                                </td>

                                <td>
                                    <a href="#" class="text-inherit">

                                        <div class="">
                                            <h5 class="mb-0 text-primary-hover" x-text="product.product.name">
                                            </h5>
                                        </div>
                            </div>
                            </a>
                            </td>

                            <td>
                                <a href="#" class="text-inherit">

                                    <div class="">
                                        <h5 class="mb-0 text-primary-hover" x-text="product.user.namestore">
                                        </h5>
                                    </div>
                        </div>
                        </a>
                        </td>

                        <td>
                            <a href="#" class="text-inherit">

                                <div class="">
                                    <h5 class="mb-0 text-primary-hover" x-text="product.start_date"></h5>
                                </div>
                    </div>
                    </a>
                    </td>

                    <td>
                        <a href="#" class="text-inherit">

                            <div class="">
                                <h5 class="mb-0 text-primary-hover" x-text="product.end_date"></h5>
                            </div>
                </div>
                </a>
                </td>

                <td>
                    <button @click="openModal(product)">Edition</button>
                    <button @click="deleteCompagne(product.id)">Suppresion</button>
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
                                <button class="page-link" @click="goToPage(currentPage - 1)">Précedent</button>
                            </li>
                            <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                <button class="page-link" @click="goToPage(currentPage + 1)">Suivant</button>
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" x-text="isEdite ? 'Modification' : 'Création'"></h5>
                            <button type="button" class="btn-close" @click="hideModal()"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="submitForm">
                                <div class="row">
                                    <!-- Nom de la compagne -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nom de la compagne</label>
                                        <input type="text" id="name" class="form-control" x-model="formData.name"
                                            required>
                                    </div>

                                    <!-- Date début -->
                                    <div class="col-md-6 mb-3">
                                        <label for="start_date" class="form-label">Date debut</label>
                                        <input type="date" id="start_date" class="form-control"
                                            x-model="formData.start_date" required>
                                    </div>

                                    <!-- Date fin -->
                                    <div class="col-md-6 mb-3">
                                        <label for="end_date" class="form-label">Date de fin</label>
                                        <input type="date" id="end_date" class="form-control"
                                            x-model="formData.end_date" required>
                                    </div>

                                    <!-- Produits -->
                                    <div class="col-md-6 mb-3">
                                        <label for="product_id" class="form-label">Produits</label>
                                        <select x-model="formData.product_id" class="form-select">
                                            <option value="">Choisir un produit</option>
                                            @foreach ($listeproducts as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Entreprise -->
                                    <div class="col-md-6 mb-3">
                                        <label for="entreprise_id" class="form-label">Entreprise</label>
                                        <select x-model="formData.entreprise_id" class="form-select">
                                            <option value="">Choisir une entreprise</option>
                                            @foreach ($listeentreprise as $entreprise)
                                                <option value="{{ $entreprise->id }}">{{ $entreprise->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Budget -->
                                    <div class="col-md-6 mb-3">
                                        <label for="total_budget" class="form-label">Budget de la compagne</label>
                                        <input type="text" id="total_budget" class="form-control"
                                            x-model="formData.total_budget" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description de la compagne</label>
                                        <input type="text" id="description" class="form-control"
                                            x-model="formData.description" required>
                                    </div>
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
        function productSearch() {
            return {
                searchTerm: '',
                products: @json($listecompanges),
                filteredProducts: [],
                selectedCategory: '',
                showCategorySelect: true,
                currentPage: 1,
                productsPerPage: 10,
                totalPages: 0,
                isLoading: true,
                showModal: false,
                isEdite: false,
                formData: {
                    name: '',
                    description: '',
                    start_date: '',
                    end_date: '',
                    total_budget: '',
                    entreprise_id: '',
                    product_id: ''
                },
                currentProduct: null,

                hideModal() {

                    this.showModal = false;
                    this.currentProduct = null;
                    this.resetForm();
                    this.isEdite = false;
                },

                openModal(product = null) {
                    this.isEdite = product !== null;
                    if (this.isEdite) {
                        this.currentProduct = {
                            ...product
                        };
                        this.formData = {
                            name: this.currentProduct.name,
                            start_date: this.currentProduct.start_date,
                            end_date: this.currentProduct.end_date,
                            entreprise_id: this.currentProduct.entreprise.id,
                            product_id: this.currentProduct.product.id,
                            total_budget: this.currentProduct.total_budget,
                            description: this.currentProduct.description,
                        };
                    } else {
                        this.resetForm();

                        this.isEdite = false;
                    }
                    this.showModal = true;
                },

                handleFileChange(event) {
                    this.formData.image = event.target.files[0];
                },

                resetForm() {
                    this.formData = {
                        name: '',
                        description: '',
                        start_date: '',
                        end_date: '',
                        total_budget: '',
                        entreprise_id: '',
                        product_id: '',
                    };
                },


                async submitForm() {
                    this.isLoading = true;

                    if (!this.formData.name || this.formData.name.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Le nom de la compagne est requis.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.description || this.formData.description.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'La description de la compagne est requise.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.start_date) {
                        Swal.fire({
                            icon: 'error',
                            title: 'La date de début est requise.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.end_date) {
                        Swal.fire({
                            icon: 'error',
                            title: 'La date de fin est requise.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.total_budget || this.formData.total_budget.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Le budget total est requis.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.entreprise_id) {
                        Swal.fire({
                            icon: 'error',
                            title: 'L\'entreprise est requise.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.product_id) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Le produit est requis.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    const formData = new FormData();
                    formData.append('name', this.formData.name);
                    formData.append('description', this.formData.description);
                    formData.append('start_date', this.formData.start_date);
                    formData.append('end_date', this.formData.end_date);
                    formData.append('total_budget', this.formData.total_budget);
                    formData.append('entreprise_id', this.formData.entreprise_id);
                    formData.append('product_id', this.formData.product_id);
                    formData.append('compagne_id', this.currentProduct ? this.currentProduct.id : null);


                    try {
                        const response = await fetch('{{ route('compagne.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData,
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const product = data.compagne;

                            if (product) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Action effectuée avec succés!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                if (this.isEdite) {
                                    const index = this.products.findIndex(p => p.id === product.id);
                                    if (index !== -1) {
                                        this.products[index] = product;
                                    }

                                } else {
                                    this.products.push(product);
                                    this.products.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                                }

                                this.filterProducts();
                                this.resetForm();
                                this.hideModal();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Compagne non valide.',
                                    showConfirmButton: true
                                });
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
                    } finally {
                        this.isLoading = false;
                    }
                },


                get paginatedProducts() {
                    let start = (this.currentPage - 1) * this.productsPerPage;
                    let end = start + this.productsPerPage;
                    return this.filteredProducts.slice(start, end);
                },

                filterProducts() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredProducts = this.products.filter(user => {
                        return user.name && user.name.toLowerCase().includes(term) || user.created_at &&

                            user.created_at.toLowerCase().includes(term);
                    });
                    this.totalPages = Math.ceil(this.filteredProducts.length / this.productsPerPage);
                    this.currentPage = 1;
                },


                printProducts() {
                    let printContent = '<h1>Liste des Produits</h1>';
                    printContent +=
                        '<table border="1"><thead><tr><th>ID</th><th>Nom</th><th>Catégorie</th></tr></thead><tbody>';

                    this.filteredProducts.forEach(product => {
                        printContent +=
                            `<tr><td>${product.id}</td><td>${product.libelleproduct}</td><td>${product.category.libellecategorieproduct}</td></tr>`;
                    });

                    printContent += '</tbody></table>';

                    const printWindow = window.open('', '', 'height=500,width=800');
                    printWindow.document.write('<html><head><title>Impression des produits</title></head><body>');
                    printWindow.document.write(printContent);
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();
                    printWindow.print();
                },

                exportProducts() {
                    let csvContent = "ID,Nom,Catégorie\n";

                    this.filteredProducts.forEach(product => {
                        csvContent +=
                            `${product.id},${product.libelleproduct},${product.category.libellecategorieproduct}\n`;
                    });

                    // Créer un fichier CSV et le télécharger
                    const blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });
                    const link = document.createElement("a");
                    const url = URL.createObjectURL(blob);
                    link.setAttribute("href", url);
                    link.setAttribute("download", "produits_filtrés.csv");
                    link.click();
                },


                filterByCategory() {

                    this.filteredProducts = this.products;

                    if (this.selectedCategory) {
                        // Appliquer le filtre sur les produits par catégorie
                        this.filteredProducts = this.filteredProducts.filter(product => product.category.id === parseInt(
                            this.selectedCategory));
                    }

                    // Optionnel : Appliquer également un filtrage par recherche textuelle (si nécessaire)
                    if (this.searchTerm) {
                        this.filteredProducts = this.filteredProducts.filter(product => {
                            return product.libelleproduct.toLowerCase().includes(this.searchTerm.toLowerCase());
                        });
                    }

                    // Calculer le nombre de pages en fonction du nombre de produits filtrés
                    this.totalPages = Math.ceil(this.filteredProducts.length / this.productsPerPage);
                },

                async deleteCompagne(compagneId) {
                    try {
                        const url =
                            `{{ route('compagne.destroy', ['compagne' => '__ID__']) }}`.replace(
                                "__ID__",
                                compagneId
                            );

                        const response = await fetch(url, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                        });

                        if (response.ok) {
                            const result = await response.json();
                            if (result.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });

                                // Retirer le produit de la liste `this.products`
                                this.products = this.products.filter(product => product.id !== compagneId);


                                this.filterProducts();
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: result.message,
                                    showConfirmButton: true,
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Erreur lors de la requête.",
                                showConfirmButton: true,
                            });
                        }
                    } catch (error) {
                        console.error("Erreur réseau :", error);
                        Swal.fire({
                            icon: "error",
                            title: "Une erreur réseau s'est produite.",
                            showConfirmButton: true,
                        });
                    }
                },

                truncateText(text, length) {
                    if (text.length > length) {
                        return text.substring(0, length) + '...'; // Ajoute "..." si le texte est trop long
                    }
                    return text;
                },


                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                init() {

                    this.filterProducts();
                    this.isLoading = false;
                }
            };
        }
    </script>
@endpush
