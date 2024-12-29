@extends('layout')

@section('content')
    <section class="py-md-8 py-6"
        style="background-image: url(../assets/images/mentor/mentor-glow.svg); background-repeat: no-repeat; background-size: contain">
        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">
            <div class="row align-items-center gy-5 gy-xl-0">
                <div class="col-lg-6 col-12">
                    <div class="d-flex flex-column gap-4 px-lg-6 p-3">
                        <div class="d-flex flex-column gap-3">
                            <h1 class="mb-0 display-4 fw-bold">Boostez votre visibilité avec Influence Shop</h1>
                            <p class="mb-0 pe-xxl-8 me-xxl-5">Connectez-vous aux meilleurs influenceurs pour propulser
                                vos produits et atteindre une audience ciblée.</p>
                        </div>
                        <form>
                            <div class="input-group shadow">
                                <label for="productSearch" class="form-label visually-hidden">Rechercher un
                                    produit</label>
                                <input type="text" class="form-control rounded-start-3" id="productSearch"
                                    name="productSearch" placeholder="Quel produit souhaitez-vous promouvoir ?"
                                    aria-label="Quel produit souhaitez-vous promouvoir ?" aria-describedby="searchButton"
                                    required="">
                                <button class="btn btn-warning" id="searchButton" type="submit">Rechercher</button>
                            </div>
                        </form>
                        <div class="d-flex flex-row gap-1 flex-wrap">
                            <a href="#!" class="btn btn-tag">Mode</a>
                            <a href="#!" class="btn btn-tag">Technologie</a>
                            <a href="#!" class="btn btn-tag">Beauté</a>
                            <a href="#!" class="btn btn-tag">Santé</a>
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

    <section class="py-6 py-lg-2 bg-white mt-2">
        <div class="container py-lg-6">
            <!--row-->
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="text-center mb-6 d-flex flex-column gap-2">

                        <h2 class="mb-0 mx-xl-12 h1">Découvrez nos campagnes de la semaine</h2>
                        <!-- Description -->
                        <p class="mb-0">Rejoignez nos influenceurs et profitez des meilleures promotions sur vos produits
                            préférés.</p>
                    </div>
                </div>
            </div>


            <div class="row gy-4">

                <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
                    <!-- card -->
                    <div class="card h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex flex-column gap-4">
                                <div class="d-flex flex-column gap-3">
                                    <!-- heading-->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <!-- text-->

                                        <div class="d-flex align-items-center">
                                            <div class="icon-shape icon-lg rounded-3 border p-4">
                                                <i class="fe fe-shopping-cart fs-3"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="mb-0"><a href="#" class="text-inherit">E-Commerce
                                                        Project</a></h4>
                                                <span class="fs-6">Web Development</span>
                                            </div>
                                        </div>
                                        <!-- dropdown-->
                                        <div class="d-flex">
                                            <div class="dropdown dropstart">
                                                <a href="#" class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                    id="dropdownProjectSix" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownProjectSix">
                                                    <span class="dropdown-header">Settings</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit Details
                                                    </a>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-link dropdown-item-icon"></i>
                                                        Copy project link
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-save dropdown-item-icon"></i>
                                                        Save as Default
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-copy dropdown-item-icon"></i>
                                                        Duplicate
                                                    </a>

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-upload dropdown-item-icon"></i>
                                                        Import
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-printer dropdown-item-icon"></i>
                                                        Export / Print
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-users dropdown-item-icon"></i>
                                                        Move to another team
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-archive dropdown-item-icon"></i>
                                                        Archive
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Delete Project
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- para-->
                                    <div>
                                        <p class="mb-0">Donec vel tellus nec purus mollis consequat sed at urna. In sit
                                            amet vehicula odio.</p>
                                    </div>
                                </div>
                                <!-- progress -->
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex align-items-center">
                                        <!-- avatar group -->
                                        <div class="avatar-group">
                                            <span class="avatar avatar-md">
                                                <img alt="avatar" src="../../assets/images/avatar/avatar-15.jpg"
                                                    class="rounded-circle imgtooltip" data-template="sixteen ">
                                                <span id="sixteen" class="d-none">
                                                    <small class="fw-semibold">Gilbert Farr</small>
                                                </span>
                                            </span>
                                            <span class="avatar avatar-md avatar-danger imgtooltip"
                                                data-template="textFive">
                                                <span class="avatar-initials rounded-circle">GK</span>

                                                <span id="textFive" class="d-none">
                                                    <small class="fw-semibold">Geeks Only</small>
                                                </span>
                                            </span>
                                            <span class="avatar avatar-md">
                                                <img alt="avatar" src="../../assets/images/avatar/avatar-17.jpg"
                                                    class="rounded-circle imgtooltip" data-template="eighteen ">
                                                <span id="eighteen" class="d-none">
                                                    <small class="fw-semibold">Jamie Lusar</small>
                                                </span>
                                            </span>
                                            <span class="avatar avatar-md">
                                                <span class="avatar-initials rounded-circle bg-light text-dark">5+</span>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- text -->
                                    <div>
                                        <span class="badge bg-success-soft">Finished</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!-- progress bar -->

                                <div class="progress progress-tooltip" style="height: 6px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        <span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card footer -->
                        <div class="card-footer p-0">
                            <div class="d-flex justify-content-between">
                                <div class="w-50 py-3 px-4">
                                    <h6 class="mb-0">Due Date:</h6>
                                    <p class="text-dark fs-6 fw-semibold mb-0">31 June, 2022</p>
                                </div>
                                <div class="border-start w-50 py-3 px-4">
                                    <h6 class="mb-0">Budget:</h6>
                                    <p class="text-dark fs-6 fw-semibold mb-0">$2,53,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>
    </section>


    <section class="py-xl-8 py-6">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-md-10 col-12 mx-auto">
                    <div class="d-flex flex-column gap-2 text-center mb-xl-7 mb-5">
                        <h2 class="h1 mb-0">Produit incontournable de la semaine</h2>
                        <p class="mb-0 px-xl-5">Explorez des opportunités passionnantes et faites partie d'une aventure
                            marketing unique grâce à notre sélection de produits et campagnes innovants. Rejoignez-nous pour
                            transformer votre influence en succès !</p>

                    </div>
                </div>
            </div>


            <div x-data="productManager()" class="row gy-4">
                <template x-for="product in products" :key="product.id">
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
                        <div x-data="{ zoomed: false }" class="card h-100">
                            <!-- Image avec gestion de zoom -->
                            <div class="image-container" style="cursor: pointer; overflow: hidden; position: relative;">
                                <img :src="product.images.length ? `/storage/${product.images[0].imagename}` :
                                    '../../assets/images/default-product.jpg'"
                                    alt="Product Image" @click="zoomed = !zoomed" :class="zoomed ? 'zoomed' : ''"
                                    class="img-fluid rounded-top"
                                    style="max-height: 200px; width: 100%; object-fit: contain; transition: transform 0.3s ease;">
                            </div>

                            <!-- Informations produit -->
                            <div class="card-body">
                                <div class="d-flex flex-column gap-4">
                                    <div>
                                        <h4 class="mb-0"><a href="#" class="text-inherit"
                                                x-text="product.name"></a></h4>
                                        <span class="fs-6" x-text="product.description"></span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex align-items-center">
                                        <!-- avatar group -->
                                        <div class="avatar-group">
                                            <span class="avatar avatar-md">
                                                <img alt="avatar" src="../../assets/images/avatar/avatar-15.jpg"
                                                    class="rounded-circle imgtooltip" data-template="sixteen ">
                                                <span id="sixteen" class="d-none">
                                                    <small class="fw-semibold">Gilbert Farr</small>
                                                </span>
                                            </span>
                                            <span class="avatar avatar-md avatar-danger imgtooltip"
                                                data-template="textFive">
                                                <span class="avatar-initials rounded-circle">GK</span>

                                                <span id="textFive" class="d-none">
                                                    <small class="fw-semibold">Geeks Only</small>
                                                </span>
                                            </span>
                                            <span class="avatar avatar-md">
                                                <img alt="avatar" src="../../assets/images/avatar/avatar-17.jpg"
                                                    class="rounded-circle imgtooltip" data-template="eighteen ">
                                                <span id="eighteen" class="d-none">
                                                    <small class="fw-semibold">Jamie Lusar</small>
                                                </span>
                                            </span>
                                            <span class="avatar avatar-md">
                                                <span class="avatar-initials rounded-circle bg-light text-dark">5+</span>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- text -->
                                    <div>
                                        <span class="badge bg-success-soft">Promoteur</span>
                                    </div>
                                </div>


                            </div>

                            <!-- Footer de la carte -->
                            <div class="card-footer p-0">
                                <div class="d-flex justify-content-between">
                                    <div class="w-60 py-3 px-2">
                                        <a href="#!" class="btn btn-outline-secondary">
                                            <i class="fe fe-shopping-cart fs-3"></i> Acheter
                                        </a>
                                    </div>
                                    <div class="border-start w-50 py-3 px-4">
                                        <a :href="`{{ route('buy.product', '') }}/${product.id}`"
                                            class="btn btn-outline-secondary">Promouvoir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

        </div>
    </section>
@endsection
@push('script')
    <script>
        function productManager() {
            return {
                products: @json($listeproduct),
            };
        }
    </script>
@endpush
