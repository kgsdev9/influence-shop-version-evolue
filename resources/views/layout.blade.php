<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="VTP MARKET" type="image/x-icon" href="{{ asset('flaticons.jpg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>

<body class="bg-white">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <div class="d-flex">
                <a class="navbar-brand text-dark" href="/">
                    <img src="{{ asset('logo.png') }}" alt="" height="25px;">
                </a>

            </div>
            <div class="order-lg-3">
                <div class="d-flex align-items-center">

                    <a href="{{ route('cart.home') }}"
                        class="btn btn-icon btn-light rounded-circle  d-md-inline-flex ms-2"><i
                            class="fe fe-shopping-cart align-middle"></i></a>

                    <div class="dropdown">
                        <a href="{{ route('dashboards') }}"
                            class="btn btn-light btn-icon rounded-circle d-flex align-items-center mx-2" type="button">
                            <i class="bi bi-person"></i>

                        </a>
                    </div>

                    @guest
                        <a href="{{ route('login.form') }}" class="btn btn-outline-dark btn-sm ms-2 d-none d-lg-block mx-2">
                            <i class="bi bi-box-arrow-in-right"></i> Connexion
                        </a>
                    @else
                        @can('access-entreprise')
                            <a type="button" class="btn btn-outline-warning btn-sm" href="{{ route('products.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z"></path>
                                </svg>

                            </a>
                        @endcan
                    @endguest

                    <!-- Button -->
                    <button class="navbar-toggler collapsed ms-2 ms-lg-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                </div>
            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbar-default">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('product.home') ? 'active' : '' }}"
                            href="{{ route('product.home') }}">

                            Promotion Produits
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.compagnes') ? 'active' : '' }}"
                            href="{{ route('home.compagnes') }}">
                            Promotion Entreprise
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('homeBlog') ? 'active' : '' }}"
                            href="{{ route('homeBlog') }}">
                            Promotion evenementielles
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('delivery.status') ? 'active' : '' }}"
                            href="{{ route('delivery.status') }}">
                            Suivre un colis
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    @yield('content')





    <footer class="pt-lg-8 pt-5 footer bg-white">
        <div class="container mt-lg-2">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- about company -->
                    <div class="mb-4">
                        <img src="{{ asset('logo.png') }}" style="height:30px;" alt="">


                        <div class="mt-4">
                            <p>VTP-SAS connecte les marques et les influenceurs pour des partenariats marketing,
                                facilitant la promotion des produits grâce à des collaborations ciblées sur les réseaux
                                sociaux.</p>
                            <!-- social media -->
                            <div class="fs-4 mt-4">
                                <!--Facebook-->
                                <a href="https://www.tiktok.com/@vtpmarket" target="_blank" class="me-2 text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12.07 0C5.39 0 0 5.39 0 12.07s5.39 12.07 12.07 12.07c6.64 0 12.07-5.39 12.07-12.07S18.71 0 12.07 0zm0 22.21c-5.61 0-10.21-4.6-10.21-10.21 0-5.61 4.6-10.21 10.21-10.21 5.61 0 10.21 4.6 10.21 10.21 0 5.61-4.6 10.21-10.21 10.21zM9.59 7.83c-.14 0-.26-.05-.36-.14-.24-.24-.24-.63 0-.87.58-.58 1.52-.58 2.1 0 .43.43.43 1.14 0 1.57-.16.17-.38.26-.62.26zm4.26 3.9c-.25 0-.49-.09-.69-.29-.39-.39-.39-1.02 0-1.41.65-.65 1.73-.65 2.38 0 .27.27.43.63.43 1.01 0 .79-.64 1.42-1.42 1.42zm.79-3.61c-.36 0-.67-.13-.93-.38-.54-.54-.54-1.42 0-1.96.58-.58 1.52-.58 2.1 0 .24.24.24.63 0 .87-.12.13-.27.2-.42.2z" />
                                    </svg>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-4 col-md-3 col-6">
                    <div class="mb-4">
                        <h3 class="fw-bold mb-3">RESSOURCES</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="{{ route('product.home') }}"
                                    class="nav-link {{ request()->routeIs('product.home') ? 'active' : '' }}">Nos
                                    Produits</a></li>
                            <li><a href="{{ route('homeCompagne') }}"
                                    class="nav-link {{ request()->routeIs('homeCompagne') ? 'active' : '' }}">Nos
                                    Compagnes</a></li>
                            <li><a href="{{ route('about') }}" class="nav-link">Promotion Entreprise</a></li>
                            <li><a href="{{ route('about') }}" class="nav-link">A propos</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="mb-4">
                        <!-- list -->
                        <h3 class="fw-bold mb-3">ESPACE PRO</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="{{ route('contact') }}" class="nav-link">Nous Contacter</a></li>
                            <li><a href="{{ route('faq') }}" class="nav-link">FAQ’s</a></li>
                            <li><a href="{{ route('cgu') }}" class="nav-link">Condition d'utilisation </a></li>
                            <li><a href="{{ route('soutien.home') }}" class="nav-link">Investir et soutien </a></li>
                            @guest


                                <li><a href="{{ route('register.form.promoteur') }}" class="nav-link">Devenir
                                        Promoteur</a></li>
                            </ul>
                        @endguest
                    </div>
                </div>

            </div>
            <div class="row align-items-center g-0 border-top py-2 mt-6">
                <!-- Desc -->
                <div class="col-md-10 col-12">
                    <div class="d-lg-flex align-items-center">
                        <div class="me-4">
                            <span>
                                © 2022 -
                                <span id="copyright5">
                                    <script>
                                        document.getElementById("copyright5").appendChild(document.createTextNode(new Date().getFullYear()));
                                    </script>
                                </span>
                                VTP SAS
                            </span>
                        </div>
                        <div>
                            <nav class="nav nav-footer">
                                <a class="nav-link ps-0" href="{{ route('politiqueconfidentialite') }}">Politique de
                                    confidentialité</a>
                                <a class="nav-link px-2 px-md-3" href="{{ route('politiqueretour') }}">Politique de
                                    retour</a>
                                <a class="nav-link" href="#">Propulsé par KGS informatique</a>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/alpine.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('cart', {
                items: [],
                addToCart(product) {
                    let productToAdd = {
                        id: product.id,
                        name: product.name,
                        price: product.price_vente,
                        quantity: 1,
                        weight: product.poids,
                        taille: product.taille ? product.taille.name : '',
                        color: product.color ? product.color.name : '',
                        image: product.images.length ? `/s3/${product.images[0].imagename}` :
                            '../../assets/images/default-product.jpg'
                    };
                    this.items.push(productToAdd);
                    fetch('/add-to-cart', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            },
                            body: JSON.stringify({
                                product: productToAdd
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Produit ajouté au panier!',
                                    showConfirmButton: true,
                                });
                            } else {
                                alert("Une erreur est survenue.");
                            }
                        });
                }
            });
        });
    </script>


</body>

</html>
