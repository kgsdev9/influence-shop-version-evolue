@extends('layout')
@section('title', 'Detail ' . $product->name)
@section('content')
    <section class="my-5 mx-3" x-data="formSteps()" x-init="init()">
        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">
            <div class="d-flex flex-column gap-3">
                <h5 class="mb-0 display-4 fw-bold text-warning"> Detail de produit {{ $product->name }}
                </h5>

            </div>

            <div class="row mt-4 ">
                <div class="col-md-9 ">
                    <div class="row ">

                        <div class="col-xl-6 col-12" x-data="{ selectedImage: 0 }">
                            <div class="row gy-4">


                                <div class="col-12">
                                    <div>
                                        <!-- Image principale avec transition Alpine.js -->
                                        <a :href="`/s3/${product.images[selectedImage].imagename}`" class="glightbox"
                                            data-gallery="gallery1">
                                            <img :src="product.images.length ? `/s3/${product.images[selectedImage].imagename}` :
                                                '../../assets/images/default-product.jpg'"
                                                alt="Image principale du produit" class="img-fluid rounded-3"
                                                style="width:400px; height:400px; object-fit: cover;"
                                                x-transition:enter="transition ease-in-out duration-500 opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in-out duration-500 opacity-100"
                                                x-transition:leave-end="opacity-0" />
                                        </a>
                                    </div>
                                </div>

                                <!-- Images secondaires avec transition Alpine.js -->
                                <div>
                                    <div x-show="product && product.images && product.images.length > 1">
                                        <div class="row">
                                            <template x-for="(image, index) in product.images" :key="index">
                                                <div class="col-md-2 col-6 mb-4 d-flex justify-content-center">
                                                    <div class="w-100" style="height:40px;">
                                                        <a href="javascript:void(0)" @click="selectedImage = index"
                                                            class="glightbox" :data-gallery="'gallery1'">
                                                            <img :src="`/s3/${image.imagename}`" alt="Image secondaire"
                                                                class="img-fluid rounded-3 w-100 h-100"
                                                                style="object-fit: cover;" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>





                                <hr class="mt-4 mb-2" />
                                <div class="mb-4">
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush">
                                        <!-- List group item -->
                                        <li class="list-group-item px-0">
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center text-inherit fw-semibold mb-0">
                                                <div class="me-auto">Fiche technique produit </div>

                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show">
                                                {{ $product->description }}
                                            </div>
                                        </li>



                                    </ul>
                                </div>
                                @can('buy-product')
                                    <div class="mb-4">
                                        <div class="border-top py-4 mt-4">
                                            <div class="border d-inline-block px-2 py-1 rounded-pill mb-3">
                                                <span class="text-dark fw-semibold">
                                                    4.4
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="currentColor" class="bi bi-star-fill text-success"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <!-- text -->
                                            <p> awesome , I never thought about geeks that awesome shoes.very pretty.
                                            </p>
                                            <div>
                                                <span>James Ennis</span>
                                                <span class="ms-4">28 Nov 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>


                        <div class="col-xl-6 col-12">
                            <div class="my-5 mx-lg-8">
                                <!-- heading -->
                                <div class="d-flex flex-column gap-2">
                                    <h4 class="mb-0" x-text="product.name"></h4>

                                </div>
                                <hr class="my-3" />
                                <div class="mb-5 d-flex flex-column gap-1">
                                    <!-- text -->
                                    <h4 class="mb-0">
                                        <span x-text="product.price_vente"> </span>

                                        <span class="text-warning">Profitez de -45% sur ce produit exceptionnel !</span>
                                    </h4>
                                    <span>Profitez de notre offre spéciale, taxes incluses !</span>

                                </div>
                                <!-- color -->
                                <div class="mb-4 d-md-flex justify-content-between align-items-center">

                                    <div>
                                        <!-- Dynamically generate color radio buttons -->
                                        <div class="btn-group" role="group" aria-label="Couleur">
                                            <template x-for="(color, index) in product.colors" :key="index">
                                                <div>
                                                    <input type="radio" class="btn-check" :id="'btnradioColor' + index"
                                                        name="color" :value="color.name" />
                                                    <label :for="'btnradioColor' + index"
                                                        class="btn rounded-circle me-2 btn-icon btn-xs border border-2 border-white shadow"
                                                        :class="'btn-' + color.name.toLowerCase()" x-text="color.name">
                                                        <i class="fe fe-check icon-checked"></i>
                                                    </label>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                                <div x-show="sizes.length > 0"
                                    class="mb-6 d-md-flex justify-content-between align-items-center">

                                    <div>
                                        <div class="btn-group" role="group" aria-label="Taille">
                                            <template x-for="(size, index) in sizes" :key="index">
                                                <div>
                                                    <input type="radio" class="btn-check" :id="'btnradio' + index"
                                                        name="size" :value="size.name" />
                                                    <label
                                                        class="btn btn-outline-light border rounded-circle me-2 text-body btn-icon btn-md"
                                                        :for="'btnradio' + index" x-text="size.name"></label>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>






                                <!-- row -->
                                <div class="row row flex-md-row flex-column gap-2 gap-md-0">
                                    <!-- col -->
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <!-- btn -->
                                            <button @click="$store.cart.addToCart(product)" class="btn btn-danger btn-sm">
                                                <i class="fe fe-shopping-cart fs-3"></i> Ajouter au Panier
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!-- Promotion VTP EXPRESS Livraison -->
                            <div class="mb-3">
                                <h6 class="text-danger fw-bold">VTP <span class="text-warning">EXPRESS</span></h6>
                                <p class="small text-muted">Profitez de notre service de livraison partout dans le monde à
                                    des prix abordables. <a href="#" class="text-decoration-underline">Découvrez nos
                                        tarifs</a></p>
                            </div>

                            <!-- Point Relais Section -->
                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-geo-alt-fill text-primary me-2 fs-5"></i>
                                    <div>
                                        <p class="fw-bold mb-1">Livraison en Point Relais</p>
                                        <p class="small text-muted mb-0">Nos frais de livraison sont abordables et nous
                                            offrons même la livraison gratuite pour des achats supérieurs à un certain
                                            montant.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Politique de retour Section -->
                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-arrow-counterclockwise text-success me-2 fs-5"></i>
                                    <div>
                                        <p class="fw-bold mb-1">Politique de retour facile</p>
                                        <p class="small text-muted">Retours gratuits sous 10 jours. Achetez en toute
                                            confiance !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function formSteps() {
            return {
                listedeveliryPriceByCountries: @json($listedeveliryPriceByCountries),
                product: @json($product),
                sizes: '',
                init() {
                    this.sizes = Array.isArray(this.product.sizes) ? this.product.sizes : [];
                    console.log(this.sizes.length); // Affiche la longueur d'un tableau propre
                }

            };
        }
    </script>
@endpush
