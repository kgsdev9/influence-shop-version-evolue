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