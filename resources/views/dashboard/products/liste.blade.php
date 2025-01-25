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
                                        <h3 class="mb-0">Liste des produits </h3>
                                        <span>Gestion des produits .</span>
                                    </div>
                                    <!-- Nav -->
                                    <div class="nav btn-group flex-nowrap" role="tablist">

                                        <a href="{{ route('products.create') }}" class="btn btn-outline-secondary">
                                            <i class="fe fe-plus"></i> Création
                                        </a>
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
                                                <th scope="col">Réference</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Catégories</th>
                                                <th scope="col">Qte dispo</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="product in paginatedProducts" :key="product.id">
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div class="d-flex align-items-center flex-row gap-3">
                                                                <div>
                                                                    <img :src="product.images.length ?
                                                                    `/s3/${product.images[0].imagename}` :
                                                                    '../../assets/images/default-product.jpg'"
                                                             alt="Product Image" class="img-4by3-md rounded">



                                                                </div>
                                                                <div class="">
                                                                    <h5 class="mb-0 text-primary-hover"
                                                                        x-text="truncateText(product.name, 20)"></h5>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <h5 class="mb-0 text-primary-hover" x-text="product.price_vente">
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="mb-0 text-primary-hover" x-text="product.category.name">
                                                        </h5>
                                                    </td>

                                                    <td>
                                                        <h5 class="mb-0 text-primary-hover" x-text="product.qtedisponible">
                                                        </h5>
                                                    </td>

                                                    <td>
                                                        <a :href="`/products/${product.id}/edit`">
                                                            <button class="btn btn-outline-primary btn-sm">Editer</button>
                                                        </a>
                                                        <button class="btn btn-outline-danger btn-sm"
                                                            @click="deleteProduct(product.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z"></path>
                                                            </svg></button>

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
                                                        @click="goToPage(currentPage - 1)">Précedent</button>
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
    </main>


@endsection

@push('script')
    <script>
        function productSearch() {
            return {
                searchTerm: '',
                products: @json($products),
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
                    prixachat: '',
                    prixvente: '',
                    image: '',
                    category_id: ''
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
                            name: this.currentProduct.libelleproduct,
                            prixachat: this.currentProduct.prixachat,
                            prixvente: this.currentProduct.prixvente,
                            category_id: this.currentProduct.category.id,
                            image: null,

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
                        prixachat: '',
                        prixvente: '',
                        category_id: '',
                        image: null,
                    };
                    document.getElementById('image').value = '';
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



                filterByCategory() {
                    // Réinitialiser filteredProducts à la liste complète des produits
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

                async deleteProduct(productId) {


                    try {
                        const url =
                            `{{ route('products.destroy', ['product' => '__ID__']) }}`.replace(
                                "__ID__",
                                productId
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
                                this.products = this.products.filter(product => product.id !== productId);

                                // Après suppression, appliquer le filtre pour mettre à jour la liste affichée
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
