<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <style>
        /* Styles de zoom */
        .image-container img.zoomed {
            transform: scale(1.5);
            /* Zoom à 150% */
            cursor: zoom-out;
        }

        .image-container img {
            cursor: zoom-in;
        }
    </style>
</head>

<body class="bg-white">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <div class="d-flex">
                <a class="navbar-brand text-dark" href="/">GROUP VTP </a>

            </div>
            <div class="order-lg-3">
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a href="{{route('dashboards')}}"
                            class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button">
                            <i class="bi bi-person"></i>
                            
                        </a>

                    </div>


                    {{-- <a href="{{route('cart.home')}}"
                        class="btn btn-icon btn-light rounded-circle d-none d-md-inline-flex ms-2">
                        <i class="fe fe-shopping-cart align-middle"></i>
                    </a> --}}
                    <a href="{{ route('login.form') }}" class="btn btn-outline-dark btn-sm ms-2 d-none d-lg-block">
                        <i class="bi bi-box-arrow-in-right"></i> Connexion
                    </a>


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
                        <a class="nav-link" href="{{ route('product.home') }}">
                            <i class="bi bi-box"></i>
                            Nos Produits
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.compagnes')}}">
                            <i class="bi bi-hand-thumbs-up"></i> <!-- Icône pour "Nos Compagnes" -->
                            Nos Compagnes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('homeBlog')}}">
                            <i class="bi bi-megaphone"></i> <!-- Icône pour "Nos Publicités" -->
                            Nos Publicités
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
                        GROUP VTP


                        <div class="mt-4">
                            <p>VTP GROUP connecte les marques et les influenceurs pour des partenariats marketing,
                                facilitant la promotion des produits grâce à des collaborations ciblées sur les réseaux
                                sociaux.</p>
                            <!-- social media -->
                            <div class="fs-4 mt-4">
                                <!--Facebook-->
                                <a href="#" class="me-2 text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                        </path>
                                    </svg>
                                </a>
                                <!--Twitter-->
                                <a href="#" class="me-2 text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                        </path>
                                    </svg>
                                </a>

                                <!--GitHub-->
                                <a href="#" class="text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <!-- list -->
                        <h3 class="fw-bold mb-3">Ressources</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="#" class="nav-link">A Propos</a></li>
                            <li><a href="{{ route('product.home') }}" class="nav-link">Nos Produits</a></li>
                            <li><a href="#" class="nav-link">Nos Compagnes</a></li>
                            <li><a href="#" class="nav-link">Nos Influenceurs</a></li>
                            <li><a href="#" class="nav-link">Nos Partenaires</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <!-- list -->
                        <h3 class="fw-bold mb-3">Support</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="{{ route('register.entreprise') }}" class="nav-link">Devenir Vendeur</a>
                            </li>
                            <li><a href="#" class="nav-link">Dévenir Influenceur</a></li>
                            <li><a href="#" class="nav-link">Condition d'utilisation </a></li>
                            <li><a href="#" class="nav-link">FAQ’s</a></li>
                            <li><a href="#" class="nav-link">Condition d'utilisation </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <!-- contact info -->
                    <div class="mb-4">
                        <h3 class="fw-bold mb-3">Nous Contacter</h3>
                        <p>Societé Anonyme Jouissant de toute legalité conforme. </p>
                        <p class="mb-1">
                            Email:
                            <a href="#" class="text-dark">contact@influenceshop.fr.com</a>
                        </p>
                        <p>
                            Télephone:
                            <span class="text-dark fw-semibold">(0033) 123 456 789</span>
                        </p>
                        <div class="d-flex">
                            <a href="#"><img src="../../assets/images/svg/appstore.svg" alt="" class="img-fluid"></a>
                            <a href="#" class="ms-2"><img src="../../assets/images/svg/playstore.svg" alt=""
                                    class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center g-0 border-top py-2 mt-6">
                <!-- Desc -->
                <div class="col-md-10 col-12">
                    <div class="d-lg-flex align-items-center">
                        <div class="me-4">
                            <span>
                                ©
                                <span id="copyright5">
                                    <script>
                                        document.getElementById("copyright5").appendChild(document.createTextNode(new Date().getFullYear()));
                                    </script>2024
                                </span>
                                VTP GROUP
                            </span>
                        </div>
                        <div>
                            <nav class="nav nav-footer">
                                <a class="nav-link ps-0" href="#">Politique de confidentialité</a>
                                <a class="nav-link px-2 px-md-3" href="#">Politique de coockie</a>
                                <a class="nav-link d-none d-lg-block" href="#">Vos Informations sont protégées .
                                </a>
                                <a class="nav-link" href="#">Termes et condition</a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Links -->
                <div class="col-12 col-md-2 d-md-flex justify-content-end">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-body" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fe fe-globe me-2 align-middle"></i>
                            Langues
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="me-2">
                                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_5543_19736)">
                                                <path d="M0 0.5H16V12.5H0V0.5Z" fill="#012169"></path>
                                                <path
                                                    d="M1.875 0.5L7.975 5.025L14.05 0.5H16V2.05L10 6.525L16 10.975V12.5H14L8 8.025L2.025 12.5H0V11L5.975 6.55L0 2.1V0.5H1.875Z"
                                                    fill="white"></path>
                                                <path
                                                    d="M10.6 7.525L16 11.5V12.5L9.225 7.525H10.6ZM6 8.025L6.15 8.9L1.35 12.5H0L6 8.025ZM16 0.5V0.575L9.775 5.275L9.825 4.175L14.75 0.5H16ZM0 0.5L5.975 4.9H4.475L0 1.55V0.5Z"
                                                    fill="#C8102E"></path>
                                                <path d="M6.025 0.5V12.5H10.025V0.5H6.025ZM0 4.5V8.5H16V4.5H0Z"
                                                    fill="white"></path>
                                                <path d="M0 5.325V7.725H16V5.325H0ZM6.825 0.5V12.5H9.225V0.5H6.825Z"
                                                    fill="#C8102E"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_5543_19736">
                                                    <rect width="16" height="12" fill="white"
                                                        transform="translate(0 0.5)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="me-2">
                                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_5543_19744)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.5H16V12.5H0V0.5Z"
                                                    fill="white"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0 0.5H5.3325V12.5H0V0.5Z" fill="#002654"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.668 0.5H16.0005V12.5H10.668V0.5Z" fill="#CE1126"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_5543_19744">
                                                    <rect width="16" height="12" fill="white"
                                                        transform="translate(0 0.5)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    Français
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="me-2">
                                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_5543_19751)">
                                                <path d="M0 8.5H16V12.5H0V8.5Z" fill="#FFCE00"></path>
                                                <path d="M0 0.5H16V4.5H0V0.5Z" fill="black"></path>
                                                <path d="M0 4.5H16V8.5H0V4.5Z" fill="#DD0000"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_5543_19751">
                                                    <rect width="16" height="12" fill="white"
                                                        transform="translate(0 0.5)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    Deutsch
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/alpine.js') }}" defer></script>
    @stack('script')
</body>

</html>
