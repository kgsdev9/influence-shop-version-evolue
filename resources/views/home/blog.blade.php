@extends('layout')
@section('content')
    <main>


        <!-- Page header -->
        <div class="py-8">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                        <div class="text-center mb-5">
                            <h1 class="display-2 fw-bold">Les Evenements de la semaine </h1>
                            <p class="lead">Découvrez nos nouveautés, nos aventures, nos astuces et bien plus encore.
                                Rejoignez-nous pour vivre une expérience unique chaque semaine..</p>
                        </div>
                        <!-- Form -->
                        <form class="row px-md-8 mx-md-8 needs-validation" novalidate="">
                            <div class="mb-3 col ps-0 ms-2 ms-md-0">
                                <label class="form-label visually-hidden" for="blogCategoryEmail"></label>
                                <input type="email" class="form-control" placeholder="Evenements" name="blogCategoryEmail"
                                    id="blogCategoryEmail" required="">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3 col-auto ps-0">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content -->
        <section class="pb-8">
            <div class="container">
                <div x-data="blogManager()" class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 shadow-lg card-lift">
                            <a href="blog-single.html">
                                <img src="../assets/images/blog/blogpost-3.jpg" class="card-img-top" alt="blogpost ">
                            </a>
                            <!-- Card body -->
                            <div class="card-body">
                                <a href="#" class="fs-5 fw-semibold d-block mb-3 text-danger">Compagne Publicitaire</a>
                                <h3>
                                    <a href="blog-single.html" class="text-inherit"> Découvrez l'Art du Vin : Événements Exclusifs et Offres Spéciales</a>
                                </h3>
                                <p>  Participez à nos événements de dégustation de vin et profitez de remises exceptionnelles sur nos meilleurs crus. 🎉
                                    Rejoignez-nous pour une soirée de découvertes gustatives, et faites l'expérience d'un voyage sensoriel à travers les meilleurs vignobles du monde. 🥂</p>
                                <!-- Media content -->
                                <div class="row align-items-center g-0 mt-4">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-7.jpg" alt="avatar"
                                            class="rounded-circle avatar-sm me-2">
                                    </div>
                                    <div class="col lh-1">
                                        <h5 class="mb-1">Group VTP </h5>
                                        <p class="fs-6 mb-0">Septembre 05, 2025</p>
                                    </div>
                                    <div class="col-auto">
                                        <p class="fs-6 mb-0">20 Minute</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
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

        <!-- Footer -->
        <!-- Footer -->


    </main>
@endsection

@push('script')
    <script>
        function blogManager() {
            return {
                blog: @json($listepub),
            };
        }
    </script>
@endpush
