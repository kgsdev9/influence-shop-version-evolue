@extends('layout')
@section('title', 'A propos de VTP GROUP')
@section('content')
<section class="py-8 bg-white">
    <div class="container my-lg-4">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 col-md-12 col-12 mb-8">
                <!-- Caption -->
                <h1 class="display-2 fw-bold mb-3">
                    Bonjour, nous sommes
                    <span class="text-warning">VTP GROUP</span>
                </h1>
                <!-- Para -->
                <p class="h2 mb-3">
                    Nous connectons les marques et les influenceurs pour des partenariats marketing efficaces, facilitant la promotion des produits via des collaborations ciblées sur les réseaux sociaux.
                </p>
                <p class="mb-0 h4 text-body lh-lg">
                    VTP GROUP offre des solutions sur mesure pour aider les marques à atteindre leur audience cible par l'intermédiaire d'influenceurs clés. Nous simplifions la gestion de campagnes marketing et assurons des résultats mesurables grâce à des collaborations authentiques et stratégiques.
                </p>
            </div>
        </div>
        <!-- Gallery -->
        <div class="gallery mb-8">
            <!-- gallery-item -->
            <figure class="gallery__item gallery__item--1 mb-0">
                <img src="../assets/images/about/vtp-img-1.jpg" alt="Image Galerie 1" class="gallery__img rounded-3">
            </figure>
            <!-- gallery-item -->
            <figure class="gallery__item gallery__item--2 mb-0">
                <img src="../assets/images/about/vtp-img-2.jpg" alt="Image Galerie 2" class="gallery__img rounded-3">
            </figure>
            <!-- gallery-item -->
            <figure class="gallery__item gallery__item--3 mb-0">
                <img src="../assets/images/about/vtp-img-3.jpg" alt="Image Galerie 3" class="gallery__img rounded-3">
            </figure>
            <!-- gallery-item -->
            <figure class="gallery__item gallery__item--4 mb-0">
                <img src="../assets/images/about/vtp-img-4.jpg" alt="Image Galerie 4" class="gallery__img rounded-3">
            </figure>
            <!-- gallery-item -->
            <figure class="gallery__item gallery__item--5 mb-0">
                <img src="../assets/images/about/vtp-img-5.jpg" alt="Image Galerie 5" class="gallery__img rounded-3">
            </figure>
            <!-- gallery-item -->
            <figure class="gallery__item gallery__item--6 mb-0">
                <img src="../assets/images/about/vtp-img-6.jpg" alt="Image Galerie 6" class="gallery__img rounded-3">
            </figure>
        </div>
        <div class="row">
            <!-- Row -->
            <div class="col-md-6 offset-right-md-6">
                <!-- Heading -->
                <h1 class="display-4 fw-bold mb-3">Notre impact global</h1>
                <!-- Para -->
                <p class="lead">VTP GROUP est le partenaire privilégié pour des marques désireuses d'atteindre une large audience via des partenariats stratégiques avec des influenceurs. Nous facilitons des collaborations authentiques pour maximiser l'impact marketing sur les réseaux sociaux.</p>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Counter -->
                <div class="border-top pt-4 mt-6 mb-5">
                    <h1 class="display-3 fw-bold mb-0">50K+</h1>
                    <p class="text-uppercase">Campagnes réalisées</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Counter -->
                <div class="border-top pt-4 mt-6 mb-5">
                    <h1 class="display-3 fw-bold mb-0">200+</h1>
                    <p class="text-uppercase">Influenceurs partenaires</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Counter -->
                <div class="border-top pt-4 mt-6 mb-5">
                    <h1 class="display-3 fw-bold mb-0">100+</h1>
                    <p class="text-uppercase">Marques collaborant avec nous</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Counter -->
                <div class="border-top pt-4 mt-6 mb-5">
                    <h1 class="display-3 fw-bold mb-0">10M+</h1>
                    <p class="text-uppercase">Followers atteints</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-white">
    <div class="container my-lg-8">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-12 mb-8">
                <!-- heading -->
                <h2 class="display-4 mb-3 fw-bold">Nos Influenceurs</h2>
                <!-- lead -->
                <p class="lead mb-5">
                    VTP GROUP connecte les marques et les influenceurs pour des partenariats marketing. Rejoignez-nous pour faciliter la promotion des produits à travers des collaborations ciblées sur les réseaux sociaux.
                </p>
                <!-- btn -->
                <a href="#" class="btn btn-primary">Découvrez nos partenariats</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-1.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="one">
                    <!-- text -->
                    <div id="one" class="d-none">
                        <div class="mb-0 fw-semibold">Paul Haney</div>
                        <span>Influenceur mode</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-2.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="two">
                    <!-- text -->
                    <div id="two" class="d-none">
                        <div class="mb-0 fw-semibold">Gail Lanier</div>
                        <span>Créatrice de contenu lifestyle</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-3.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="three">
                    <!-- text -->
                    <div id="three" class="d-none">
                        <div class="mb-0 fw-semibold">Gail Lanier</div>
                        <span>Influenceuse beauté</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-4.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="four">
                    <!-- text -->
                    <div id="four" class="d-none">
                        <div class="mb-0 fw-semibold">Mary Holler</div>
                        <span>Ambassadrice de marque</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-5.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="five">
                    <!-- text -->
                    <div id="five" class="d-none">
                        <div class="mb-0 fw-semibold">Gilbert Farr</div>
                        <span>Influenceur fitness</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-6.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="six">
                    <!-- text -->
                    <div id="six" class="d-none">
                        <div class="mb-0 fw-semibold">Charlie Holland</div>
                        <span>Influenceur voyage</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-7.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="seven">
                    <!-- text -->
                    <div id="seven" class="d-none">
                        <div class="mb-0 fw-semibold">James Butler</div>
                        <span>Créateur de contenu tech</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-8.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="eight">
                    <!-- text -->
                    <div id="eight" class="d-none">
                        <div class="mb-0 fw-semibold">Richard Lane</div>
                        <span>Influenceur food</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-9.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="eleven">
                    <!-- text -->
                    <div id="eleven" class="d-none">
                        <div class="mb-0 fw-semibold">Gail Lanier</div>
                        <span>Expert en SEO</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-10.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="twelve">
                    <!-- text -->
                    <div id="twelve" class="d-none">
                        <div class="mb-0 fw-semibold">Mary Holler</div>
                        <span>Créatrice de contenu lifestyle</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-11.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="thirteen">
                    <!-- text -->
                    <div id="thirteen" class="d-none">
                        <div class="mb-0 fw-semibold">Gilbert Farr</div>
                        <span>Influenceur mode</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                    <!-- avatar -->
                    <img src="../assets/images/avatar/avatar-12.jpg" alt="avatar" class="imgtooltip img-fluid rounded-circle" data-template="fourteen">
                    <!-- text -->
                    <div id="fourteen" class="d-none">
                        <div class="mb-0 fw-semibold">James Butler</div>
                        <span>Influenceur tech</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
