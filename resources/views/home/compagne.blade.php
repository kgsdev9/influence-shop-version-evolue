@extends('layout')
@section('title', 'Publicités')
@section('content')
<main x-data="compagneManager()">
    <div class="py-8">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-bold">Les Campagnes Promotionnelles</h1>
                        <p class="lead">Découvrez nos campagnes en avant-première, soutenues par les meilleures entreprises.</p>
                    </div>

                    <form class="row px-md-8 mx-md-8 needs-validation" novalidate="">
                        <div class="mb-3 col ps-0 ms-2 ms-md-0">
                            <label class="form-label visually-hidden" for="searchCompagne"></label>
                            <input type="text" class="form-control" placeholder="Rechercher une campagne" name="searchCompagne"
                                id="searchCompagne" x-model="searchQuery" required>
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
                <!-- Affichage des campagnes -->
                <template x-for="compagne in filteredCompagnes()" :key="compagne.id">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-light h-100">
                            <!-- Affichage des informations de l'entreprise -->
                            <div class="card-header text-center">
                                <h5 class="card-title" x-text="compagne.entreprise.nom"></h5>
                            </div>

                            <!-- Description de la campagne -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" x-text="compagne.title"></h5>
                                <p class="card-text text-muted" x-text="compagne.description"></p>

                                <!-- URL Promotion : Affichage vidéo avec iframe -->
                                <div class="mt-3" x-show="compagne.url_promotion">
                                    <iframe width="100%" height="315" :src="compagne.url_promotion" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>

                            <!-- Statut de la campagne -->
                            <div class="card-footer text-center">
                                <span :class="compagne.status === 'active' ? 'text-success' : 'text-danger'" x-text="compagne.status"></span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</main>
@endsection

@push('script')
    <script>
        function compagneManager() {
            return {
                searchQuery: '', // Variable pour la recherche
                compagnes: @json($compagnes), // Les campagnes venant du contrôleur

                // Fonction pour filtrer les campagnes en fonction de la recherche
                filteredCompagnes() {
                    if (this.searchQuery === '') {
                        return this.compagnes; // Si la recherche est vide, on retourne toutes les campagnes
                    }
                    // Filtrage basé sur le titre de la campagne (case insensitive)
                    return this.compagnes.filter(compagne => compagne.title.toLowerCase().includes(this.searchQuery.toLowerCase()));
                }
            };
        }
    </script>
@endpush
