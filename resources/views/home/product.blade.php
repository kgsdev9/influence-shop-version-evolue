@extends('layout')
@section('title', 'Tous les Produits')
@section('content')
<div x-data="productManager" x-init="init()">
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar des catégories -->
            <div class="col-lg-3  d-lg-block">
                <aside class="sidebar-fixed mt-7">
                    <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                        <div class="navbar-collapse collapse">
                            <div class="side-nav me-auto flex-column navbar-nav">
                                <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">CATEGORIES</p>
                                <template x-for="category in categories" :key="category . id">
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="checkbox" :value="category . id"
                                            x-model="selectedCategories" :id="'category-' + category . id"
                                            @change="filterProducts()">
                                        <label class="form-check-label ps-1" :for="'category-' + category . id"
                                            x-text="category.name"></label>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </nav>
                </aside>

                <!-- Sidebar des tailles -->
                <aside class="sidebar-fixed mt-7">
                    <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                        <div class="navbar-collapse collapse" id="navbarNav">
                            <div class="side-nav me-auto flex-column navbar-nav">
                                <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">TAILLES</p>
                                <template x-for="size in sizes" :key="size . id">
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="checkbox" :value="size . id"
                                            x-model="selectedSizes" :id="'size-' + size . id" @change="filterProducts()">
                                        <label class="form-check-label ps-1" :for="'size-' + size . id"
                                            x-text="size.name"></label>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </nav>
                </aside>

                <!-- Sidebar des couleurs -->
                <aside class="sidebar-fixed mt-7">
                    <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                        <div class="navbar-collapse collapse" id="navbarNav">
                            <div class="side-nav me-auto flex-column navbar-nav">
                                <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">COULEURS</p>
                                <template x-for="color in colors" :key="color . id">
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="checkbox" :value="color . id"
                                            x-model="selectedColors" :id="'color-' + color . id"
                                            @change="filterProducts()">
                                        <label class="form-check-label ps-1" :for="'color-' + color . id"
                                            x-text="color.name"></label>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </nav>
                </aside>


                <aside class="sidebar-fixed mt-7">
                    <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                        <div class="navbar-collapse collapse" id="navbarNav">
                            <div class="side-nav me-auto flex-column navbar-nav">
                                <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">PRIX</p>
                                <!-- Champs de saisie pour filtrer le prix -->
                                <div class="form-check my-1">
                                    <label for="priceMin" class="form-label">Prix Min (€)</label>
                                    <input type="number" id="priceMin" class="form-control" x-model="priceRange[0]"
                                        :min="0" :max="maxPrice" placeholder="Prix minimum" @input="filterProducts()">
                                </div>
                                <div class="form-check my-1">
                                    <label for="priceMax" class="form-label">Prix Max (€)</label>
                                    <input type="number" id="priceMax" class="form-control" x-model="priceRange[1]"
                                        :min="0" :max="maxPrice" placeholder="Prix maximum" @input="filterProducts()">
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span x-text="priceRange[0] + ' €'"></span>
                                    <span x-text="priceRange[1] + ' €'"></span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </aside>




            </div>

            <!-- Affichage des produits -->
            <div class="col-lg-9 col-sm-12">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <h3 class="pb-0 fw-bold text-dark m-0">Tous les produits</h3>
                </div>

                <!-- Affichage des produits filtrés -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-5">
                    <template x-for="product in filteredProducts" :key="product . id">
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm border-light h-100">
                                <div class="image-container" style="overflow: hidden; position: relative;">
                                    <img :src="product . images . length ? `/storage/${product . images[0] . imagename}` : '../../assets/images/default-product.jpg'" alt="Product Image"
                                        class="card-img-top img-fluid rounded-top"
                                        style="max-height: 200px; width: 100%; object-fit: contain;">
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a :href="`{{ route('product.show', '') }}/${product . id}`" class="text-inherit"
                                            x-text="product.name"></a>
                                    </h5>
                                    <p class="card-text text-muted"
                                        x-text="product.description.length > 50 ? product.description.substring(0, 50) + '...' : product.description">
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <h6 class="text-warning mb-0" x-text="product.price_vente"></h6>
                                        <a :href="`{{ route('buy.product', '') }}/${product . id}`"
                                            class="btn btn-danger btn-sm">
                                            <i class="fe fe-shopping-cart fs-3"></i> Acheter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function productManager() {
        return {
            searchQuery: '',  // Recherche par mot-clé
            selectedCategories: [],  // Catégories sélectionnées
            selectedSizes: [],  // Tailles sélectionnées
            selectedColors: [],  // Couleurs sélectionnées
            categories: @json($categories),  // Catégories récupérées depuis Laravel
            sizes: @json($sizes),  // Tailles récupérées depuis Laravel
            colors: @json($colors),  // Couleurs récupérées depuis Laravel
            products: @json($listeproduct),  // Produits récupérés depuis Laravel
            filteredProducts: [],  // Liste des produits filtrés
            isLoading: false,  // Indicateur de chargement
            priceRange: [0, 1000],  // Plage de prix par défaut (modifiée par l'utilisateur)
            maxPrice: 1000,  // Prix maximum disponible

            init() {
                this.filteredProducts = this.products;  // Affiche tous les produits par défaut
                this.isLoading = false;  // Le chargement est terminé
            },

            // Filtre les produits en fonction des catégories, tailles, couleurs et prix
            filterProducts() {
                console.log('Selected Categories:', this.selectedCategories);
                console.log('Selected Sizes:', this.selectedSizes);
                console.log('Selected Colors:', this.selectedColors);
                console.log('Price Range:', this.priceRange);

                this.filteredProducts = this.products.filter(product => {
                    // Filtrer par catégorie
                    const categoryMatch = this.selectedCategories.length === 0 || this.selectedCategories.map(String).includes(String(product.category_id));

                    // Filtrer par taille
                    const sizeMatch = this.selectedSizes.length === 0 || product.sizes.some(size => this.selectedSizes.map(String).includes(String(size.id)));

                    // Filtrer par couleur
                    const colorMatch = this.selectedColors.length === 0 || product.colors.some(color => this.selectedColors.map(String).includes(String(color.id)));

                    // Filtrer par prix
                    const priceMatch = product.price_vente >= this.priceRange[0] && product.price_vente <= this.priceRange[1];

                    return categoryMatch && sizeMatch && colorMatch && priceMatch;  // Le produit doit correspondre à tous les filtres
                });

                console.log('Filtered Products:', this.filteredProducts);  // Affiche les produits filtrés
            },

            // Réinitialiser les filtres (catégories, tailles, couleurs et prix)
            resetFilter() {
                this.selectedCategories = [];
                this.selectedSizes = [];
                this.selectedColors = [];
                this.priceRange = [0, this.maxPrice];  // Réinitialiser les prix
                this.filterProducts();  // Appliquer les filtres après réinitialisation
            },
        };
    }
</script>
@endpush

