@extends('layout')
@section('title', 'Tous les Produits')
@section('content')
    <div class="bg-light">
        <div x-data="productManager" x-init="init()">

            <!-- Section d'en-tête -->
            <div class="py-5"
                style="background-image: url('{{ asset('shopping-bag-cart.jpg') }}'); background-position: center center; background-size: cover; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row justify-content-center py-5">
                        <div class="col-md-6 text-center">
                            <!-- Titre -->
                            <h1 class="text-white">Trouvez tout ce que vous recherchez en un clic</h1>
                            <p class="mb-4 text-white">Découvrez des produits qui correspondent à vos attentes et besoins.
                            </p>
                            <!-- Formulaire de recherche -->
                            <div class="rounded position-relative">
                                <input class="form-control form-control-lg ps-5" type="search" placeholder="Rechercher..."
                                    aria-label="Search" x-model="searchQuery" @input="filterProducts">
                                <button
                                    class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y"
                                    type="submit"><i class="bi bi-search fs-5 ps-1"> </i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Section de filtre et produits -->
            <div class="container-fluid  py-5">
                <div class="row">

                    <!-- Barre latérale - Filtrer par catégories -->
                    <div class="col-lg-3 col-sm-12 mt-4">
                        <!-- Filtrer par Catégories -->
                        <div class="card shadow-sm border-light">
                            <div class="card-header">
                                <h5 class="mb-0">Filtrer par catégorie</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <template x-for="category in categories" :key="category.id">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" :id="'category-' + category.id"
                                                :value="category.id" x-model="selectedCategories"
                                                @change="filterProducts">
                                            <label class="form-check-label" :for="'category-' + category.id"
                                                x-text="category.name"></label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Filtrage par Couleur -->
                        <div class="card shadow-sm border-light mt-2">
                            <div class="card-header">
                                <h5 class="mb-0">Filtrer par couleur</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <template x-for="color in colors" :key="color.id">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" :id="'color-' + color.id"
                                                :value="color.id" x-model="selectedColors" @change="filterProducts">
                                            <label class="form-check-label" :for="'color-' + color.id"
                                                x-text="color.name"></label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>


                        <!-- Filtrage par Taille -->
                        <div class="card shadow-sm border-light mt-2">
                            <div class="card-header">
                                <h5 class="mb-0">Filtrer par taille</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <template x-for="size in tailles" :key="size.id">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" :id="'size-' + size.id"
                                                :value="size.id" x-model="selectedSizes" @change="filterProducts">
                                            <label class="form-check-label" :for="'size-' + size.id"
                                                x-text="size.name"></label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Contenu principal - Affichage des produits -->
                    <div class="col-lg-9 col-sm-12">
                        <!-- Affichage des produits filtrés -->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mb-5 mt-2">
                            <template x-for="product in filteredProducts" :key="product.id">
                                <div class="col-md-3 mb-4">
                                    <div class="card shadow-sm border-light h-100">
                                        <!-- Image -->
                                        <div class="image-container" style="overflow: hidden; position: relative;">
                                            <a :href="`/product/detail/${product.codeproduct}`">
                                                <img :src="product.images.length ? `/s3/${product.images[0].imagename}` :
                                                    '../../assets/images/default-product.jpg'"
                                                    alt="Product Image" class="card-img-top img-fluid rounded-top"
                                                    style="max-height: 200px; width: 100%; object-fit: contain;">
                                            </a>
                                        </div>

                                        <!-- Informations produit -->
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                <a :href="`/product/detail/${product.codeproduct}`" class="text-inherit"
                                                    x-text="product.name"></a>
                                            </h5>
                                            {{-- <p class="card-text text-muted"
                                                x-text="product.shortdescription.length > 50 ? product.shortdescription.substring(0, 50) + '...' : product.description">
                                            </p> --}}

                                            <!-- Taille et Couleur -->
                                            <div class="d-flex justify-content-between mt-3"
                                                x-show="product.taille || product.color">
                                                <template x-if="product.taille">
                                                    <span class="text-muted"
                                                        x-text="`Taille: ${product.taille.name}`"></span>
                                                </template>
                                                <template x-if="product.color">
                                                    <span class="text-muted"
                                                        x-text="`Couleur: ${product.color.name}`"></span>
                                                </template>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <h6 class="text-warning mb-0" x-text="product.price_vente + ' €'"></h6>

                                                <button @click="$store.cart.addToCart(product)"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fe fe-shopping-cart fs-3"></i>
                                                </button>
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

    </div>
@endsection

@push('script')
    <script>
        function productManager() {
            return {
                searchQuery: '',
                categories: @json($categories),
                colors: @json($colors),
                tailles: @json($tailles),

                selectedCategories: [],
                selectedSizes: [],
                selectedColors: [],
                products: @json($listeproduct),
                filteredProducts: [],

                init() {
                    this.filteredProducts = this.products;
                },

                filterProducts() {
                    console.log('Catégories sélectionnées:', this.selectedCategories);
                    console.log('Tailles sélectionnées:', this.selectedSizes);
                    console.log('Couleurs sélectionnées:', this.selectedColors);
                    console.log('Recherche:', this.searchQuery);

                    // Filtrage des produits par catégorie sélectionnée
                    this.filteredProducts = this.products.filter(product => {

                        // Filtrage par catégorie
                        const categoryMatch = this.selectedCategories.length === 0 ||
                            this.selectedCategories.map(String).includes(String(product.category_id));

                        // Filtrage par taille
                        const sizeMatch = this.selectedSizes.length === 0 ||
                            this.selectedSizes.map(String).includes(String(product.taille_id));

                        // Filtrage par couleur
                        const colorMatch = this.selectedColors.length === 0 ||
                            this.selectedColors.map(String).includes(String(product.couleur_id));

                        // Filtrage par recherche de texte
                        const searchMatch = this.searchQuery === '' || product.name.toLowerCase().includes(this
                            .searchQuery.toLowerCase());

                        // Retourner vrai si toutes les conditions sont remplies
                        return categoryMatch && sizeMatch && colorMatch && searchMatch;
                    });

                    console.log('Produits filtrés:', this.filteredProducts);
                },

                resetFilter() {
                    this.selectedCategories = [];
                    this.filterProducts();
                },
            };
        }
    </script>
@endpush
