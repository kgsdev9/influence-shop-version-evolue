@extends('layout')
@section('title', 'Publicités')
@section('content')
<main x-data="blogManager()">
    <!-- Page header -->
    <div class="py-8">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-bold">Les Evenements de la semaine</h1>
                        <p class="lead">Découvrez nos nouveautés, nos aventures, nos astuces et bien plus encore.
                            Rejoignez-nous pour vivre une expérience unique chaque semaine.</p>
                    </div>

                    <!-- Formulaire de recherche -->
                    <form class="row px-md-8 mx-md-8 needs-validation" novalidate="">
                        <div class="mb-3 col ps-0 ms-2 ms-md-0">
                            <label class="form-label visually-hidden" for="searchEvent">Recherche par nom
                                d'événement</label>
                            <input type="text" class="form-control" placeholder="Rechercher un événement"
                                name="searchEvent" id="searchEvent" x-model="searchQuery" required>
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
                <template x-for="event in filteredEvents()" :key="event . id">
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
</main>
@endsection

@push('script')
    <script>
        function blogManager() {
            return {
                searchQuery: '', // Variable pour la recherche
                blog: @json($listepub), // Les événements venant du contrôleur

                // Fonction pour filtrer les événements en fonction de la recherche
                filteredEvents() {

                    if (this.searchQuery === '') {
                        return this.blog; // Si la recherche est vide, on retourne tous les événements
                    }
                    // Filtrage basé sur le titre de l'événement (case insensitive)
                    return this.blog.filter(event => event.title.toLowerCase().includes(this.searchQuery.toLowerCase()));
                }
            };
        }
    </script>
@endpush
