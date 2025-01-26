@extends('layout')
@section('title', 'Bievnenue Sur VTP MARKET ')
@section('content')
<main x-data="productManager()">

    <section class="py-md-8 py-6"
        style="background-image: url(../assets/images/mentor/mentor-glow.svg); background-repeat: no-repeat; background-size: contain">
        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">
            <div class="row align-items-center gy-5 gy-xl-0">
                <div class="col-lg-6 col-12">
                    <div class="d-flex flex-column gap-4 px-lg-6 p-3">
                        <div class="d-flex flex-column gap-3">
                            <h1 class="mb-0 display-4 fw-bold">Boostez votre marque avec VTP MARKET</h1>
                            <p class="mb-0 pe-xxl-8 me-xxl-5">Collaborez avec les meilleurs influenceurs pour toucher une audience qualifiée.</p>
                        </div>



                        <div class="input-group shadow">
                            <label for="productSearch" class="form-label visually-hidden">Rechercher un produit</label>
                            <input
                            type="text"
                            class="form-control rounded-start-3"
                            id="productSearch"
                            name="productSearch"
                            placeholder="Quel produit souhaitez-vous promouvoir ?"
                            aria-label="Quel produit souhaitez-vous promouvoir ?"
                            aria-describedby="searchButton"
                            required=""
                            x-model="searchQuery"
                            readonly
                        />
                            <button class="btn btn-warning" type="button" @click="filterProducts">Rechercher</button>
                        </div>

                        <div class="d-flex flex-row gap-1 flex-wrap">
                            <!-- Boutons dynamiques pour les catégories -->
                            <template x-for="category in categories" :key="category.id">
                                <button
                                    type="button"
                                    class="btn btn-tag"
                                    :class="{
                                        'btn btn-warning rounded': selectedCategory === category.id,
                                        'btn btn-tag': selectedCategory !== category.id
                                    }"
                                    @click="selectedCategory = category.id; searchQuery = category.name; filterProducts()"
                                    x-text="category.name"
                                ></button>
                            </template>


                            <!-- Bouton pour réinitialiser le filtre -->
                            <button
                                type="button"
                                class="btn btn-tag"
                                @click="resetFilter"
                            >
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
                                <a :href="`/product/detail/${product.id}`">
                                    <img :src="product.images.length ? `/s3/${product.images[0].imagename}` : '../../assets/images/default-product.jpg'"
                                        alt="Product Image"
                                        class="card-img-top img-fluid rounded-top"
                                        style="max-height: 200px; width: 100%; object-fit: contain;">
                                </a>
                            </div>

                            <!-- Informations produit -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    <a :href="`/product/${product.id}`" class="text-inherit" x-text="product.name"></a>
                                </h5>
                                <p class="card-text text-muted" x-text="product.shortdescription.length > 50 ? product.shortdescription.substring(0, 50) + '...' : product.description"></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <h6 class="text-warning mb-0" x-text="product.price_vente"></h6>
                                    <a :href="`/buyProduct/${product.id}`" class="btn btn-danger btn-sm">
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




    <section class="py-6 py-lg-2 bg-white mt-2">
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
                        <template x-for="event in filteredEvents()" :key="event . id">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <!-- Card -->
                                <div class="card mb-4 shadow-lg card-lift">
                                    <a :href="`/blog/detail/${event . id}`">
                                        <img src="../assets/images/blog/blogpost-3.jpg" class="card-img-top" alt="blogpost ">
                                    </a>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <a :href="`/blog/detail/${event . id}`"
                                            class="fs-5 fw-semibold d-block mb-3 text-danger" x-text="event.category"></a>
                                        <h3>
                                            <a :href="`/blog/detail/${event . id}`" class="text-inherit"
                                                x-text="event.title"></a>
                                        </h3>
                                        <p x-text="event.mini_description"></p>
                                        <!-- Media content -->
                                        <div class="row align-items-center g-0 mt-4">
                                            <div class="col-auto">
                                                <img src="../assets/images/avatar/avatar-7.jpg" alt="avatar"
                                                    class="rounded-circle avatar-sm me-2">
                                            </div>
                                            <div class="col lh-1">
                                                <h5 class="mb-1" x-text="event.organizer"></h5>
                                                <p class="fs-6 mb-0" x-text="event.date"></p>
                                            </div>
                                            <div class="col-auto">
                                                <p class="fs-6 mb-0">20 Minutes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Button pour charger plus -->
                       
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

                if (this.searchQuery === '') {
                    return this.blog; // Si la recherche est vide, on retourne tous les événements
                }
                // Filtrage basé sur le titre de l'événement (case insensitive)
                return this.blog.filter(event => event.title.toLowerCase().includes(this.searchQuery.toLowerCase()));
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
