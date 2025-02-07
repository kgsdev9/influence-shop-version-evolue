@extends('layout')
@section('title', 'Bievnenue Sur VTP MARKET ')
@section('content')
    <main x-data="productManager()">

        <section class="py-md-8 py-2">
            <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">
                <div class="row align-items-center gy-5 gy-xl-0">
                    <div class="col-lg-6 col-12">
                        <div class="d-flex flex-column gap-4 px-lg-6 p-3">
                            <div class="d-flex flex-column gap-3">
                                <h1 class="mb-0 display-4 fw-bold">Donnez un coup de boost à votre marque</h1>
                                <p class="mb-0 pe-xxl-8 me-xxl-5">Partenairez avec les influenceurs les plus impactants pour
                                    atteindre une audience ciblée et engagée.</p>
                            </div>

                            <div class="input-group shadow">
                                <label for="productSearch" class="form-label visually-hidden">Rechercher un produit</label>
                                <input type="text" class="form-control rounded-start-3" id="productSearch"
                                    name="productSearch" placeholder="Quel produit souhaitez-vous promouvoir ?"
                                    aria-label="Quel produit souhaitez-vous promouvoir ?" aria-describedby="searchButton"
                                    required="" x-model="searchQuery" readonly />
                                <button class="btn btn-warning" type="button" @click="filterProducts">IA RECHERCHE</button>
                            </div>

                            <div class="d-flex flex-row gap-1 flex-wrap">
                                <!-- Boutons dynamiques pour les catégories -->
                                <template x-for="category in categories" :key="category.id">
                                    <button type="button" class="btn btn-tag"
                                        :class="{
                                            'btn btn-warning rounded': selectedCategory === category.id,
                                            'btn btn-tag': selectedCategory !== category.id
                                        }"
                                        @click="selectedCategory = category.id; searchQuery = category.name; filterProducts()"
                                        x-text="category.name"></button>
                                </template>


                                <!-- Bouton pour réinitialiser le filtre -->
                                <button type="button" class="btn btn-tag" @click="resetFilter">
                                    Tous les produits
                                </button>
                            </div>




                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-none d-lg-block">
                        <div class="text-center position-relative">
                            <img src="{{ asset('job-hero-section.png') }}" style="height:400px;"
                                alt="Collaboration avec des influenceurs" class="position-relative z-3">
                            <div class="position-absolute top-0 end-0 bottom-0">
                                <img src="chemin/vers/votre/graphique.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="py-xl-8 py-6">
            <div class="container">
                <!-- Placeholders (lazy loader) -->
                <div id="placeholder" class="row gy-4" x-show="isLoading">
                    <template x-for="n in 8" :key="n">
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm border-light h-100">
                                <div class="image-container bg-light" style="height: 200px;"></div>
                                <div class="card-body">
                                    <h5 class="card-title bg-light text-light" style="height: 20px; width: 80%;"></h5>
                                    <p class="card-text bg-light text-light" style="height: 15px; width: 90%;"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Produits réels -->
                <div class="row gy-4" x-show="!isLoading">
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
                                        <a :href="`/product/${product.codeproduct}`" class="text-inherit"
                                            x-text="product.name"></a>
                                    </h5>
                                    <p class="card-text text-muted"
                                        x-text="product.shortdescription.length > 50 ? product.shortdescription.substring(0, 50) + '...' : product.description">
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <h6 class="text-warning mb-0" x-text="product.price_vente"></h6>
                                        <a :href="`/buyProduct/${product.codeproduct}`" class="btn btn-danger btn-sm">
                                            <i class="fe fe-shopping-cart fs-3"></i> Acheter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

            </div>
        </section>

        <section class="py-6 py-lg-2 bg-white mt-2" style="background-color: #F5F5F5;">
            <div class="container py-lg-6">
                <!--row-->
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="text-center mb-6 d-flex flex-column gap-2">

                            <h2 class="mb-0 mx-xl-12 h1">Les évenements à ne pas manquer </h2>
                            <!-- Description -->
                            <p class="mb-0">Rejoignez nos influenceurs et profitez des meilleures promotions sur vos
                                produits
                                préférés.</p>
                        </div>
                    </div>
                </div>
                <section class="pb-8">
                    <div class="container">
                        <div class="row">
                            <template x-for="event in filteredEvents"
                                :key="event.id">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="card card-lift d-flex flex-column" style="height: 100%; min-height:300px;">
                                        <a :href="`/blog/detail/${event.codeblog}`">
                                            <img :src="event.image ? `/s3/${event.image}` : (event.images && event.images.length ?
                                                `/s3/${event.product[0].imagename}` :
                                                '../../assets/images/default-product.jpg')"
                                                alt="path full stack" class="card-img-top img-fluid"
                                                style="object-fit: cover; height: 300px;">
                                        </a>

                                        <div class="card-body d-flex flex-column gap-4" style="flex-grow: 1;">
                                            <div class="d-flex flex-column gap-2">
                                                <h2 class="mb-0 h3">
                                                    <a href="#!" class="text-inherit" x-text="event.title"></a>
                                                </h2>
                                                <p class="mb-0"
                                                    x-text="event.mini_description.length > 50 ? event.mini_description.substring(0, 50) + '...' : event.mini_description">
                                                </p>
                                            </div>

                                            <div class="d-flex flex-row align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-2 lh-1">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-clock text-gray-400" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z">
                                                            </path>
                                                            <path
                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span class="fw-medium text-gray-500"
                                                        x-text="event.date_event_debut"></span>
                                                </div>
                                                <div class="d-flex align-items-center gap-2 lh-1">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-journal-check text-gray-400" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0">
                                                            </path>
                                                            <path
                                                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2">
                                                            </path>
                                                            <path
                                                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span class="fw-medium text-gray-500">Consulter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </template>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>

@endsection

@push('script')
    <script>
        function productManager() {
            return {
                searchQuery: '', // Recherche par mot-clé
                selectedCategory: null, // ID de la catégorie sélectionnée (null = toutes les catégories)
                categories: @json($categories), // Catégories récupérées depuis le backend
                products: [], // Liste complète des produits
                filteredProducts: [], // Liste des produits filtrés
                isLoading: true, // Indique si les produits sont en cours de chargement
                blog: @json($listepub),
                init() {
                    // Simulation du chargement
                    setTimeout(() => {
                        this.products = @json($listeproduct); // Charge tous les produits depuis Laravel
                        this.filteredProducts = this.products; // Par défaut, tous les produits sont affichés
                        this.isLoading = false; // Chargement terminé
                    }, 2000); // Délai simulé (2 secondes)
                },

                filterProducts() {
                    // Vérifier si une catégorie est sélectionnée
                    this.filteredProducts = this.products.filter(product => {
                        // Si aucune catégorie n'est sélectionnée, tous les produits sont retournés
                        // Sinon, seuls les produits appartenant à la catégorie sélectionnée sont retournés
                        return this.selectedCategory === null || product.category_id === this.selectedCategory;
                    });
                },


                filteredEvents() {
                    return this.blog;
                },


                resetFilter() {
                    this.searchQuery = ''; // Réinitialise la recherche
                    this.selectedCategory = null; // Réinitialise la catégorie sélectionnée
                    this.filterProducts(); // Recharge tous les produits
                }
            };
        }
    </script>
@endpush
