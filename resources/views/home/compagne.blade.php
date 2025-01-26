@extends('layout')
@section('title', 'Publicités')
@section('content')
<main x-data="blogManager()">

    <div class="py-8">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-bold">Les Produits Sponsorisé de la Semaine</h1>
                        <p class="lead">Découvrez nos produits en avant-première, soutenus par les meilleurs
                            influenceurs pour une expérience shopping unique.</p>
                    </div>

                    <form class="row px-md-8 mx-md-8 needs-validation" novalidate="">
                        <div class="mb-3 col ps-0 ms-2 ms-md-0">
                            <label class="form-label visually-hidden" for="searchEvent"></label>
                            <input type="text" class="form-control" placeholder="Rechercher produit" name="searchEvent"
                                id="searchEvent" x-model="searchQuery" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <section class="pb-8">
        <div class="container">
            <div class="row">
                <!-- Affichage des produits sponsorisés -->
                <template x-for="event in filteredEvents()" :key="event.id">
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm border-light h-100">
                            <!-- Image du produit -->
                            <div class="image-container" style="overflow: hidden; position: relative;">
                                <a :href="`/product/detail/${event.product.id}`">
                                    <img :src="event.product.images.length ? `/s3/${event.product.images[0].imagename}` : '../../assets/images/default-product.jpg'"
                                        alt="Product Image"
                                        class="card-img-top img-fluid rounded-top"
                                        style="max-height: 200px; width: 100%; object-fit: contain;">
                                </a>
                            </div>

                            <!-- Informations produit -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    <a :href="`/product/detail/${event.product.id}`" class="text-inherit" x-text="event.product.name"></a>
                                </h5>
                                <p class="card-text text-muted" x-text="event.product.shortdescription.length > 50 ? event.product.shortdescription.substring(0, 50) + '...' : event.product.description"></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <h6 class="text-warning mb-0" x-text="event.product.price_vente"></h6>
                                    <a :href="`/buyProduct/${event.product.id}`" class="btn btn-danger btn-sm">
                                        <i class="fe fe-shopping-cart fs-3"></i> Acheter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Button pour charger plus -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-6">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mt-4">
                        <a href="#" class="btn btn-primary">
                            <div class="spinner-border spinner-border-sm me-2" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            Chargement
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('script')
    <script>
        function blogManager() {
            return {
                searchQuery: '', // Variable pour la recherche
                compagnes: @json($compagnes), // Les campagnes venant du contrôleur

                // Fonction pour filtrer les événements en fonction de la recherche
                filteredEvents() {
                    if (this.searchQuery === '') {
                        return this.compagnes; // Si la recherche est vide, on retourne tous les événements
                    }
                    // Filtrage basé sur le nom du produit (case insensitive)
                    return this.compagnes.filter(event => event.product.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
                }
            };
        }
    </script>
@endpush
