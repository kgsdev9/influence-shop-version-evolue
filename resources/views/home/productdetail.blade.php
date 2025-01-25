@extends('layout')
@section('content')
<section class="my-5 mx-3" x-data="formSteps()">
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
                            <!-- Image principale -->
                            <div class="col-12">
                                <div>
                                    <a :href="`/storage/${product . images[selectedImage] . imagename}`"
                                        class="glightbox" data-gallery="gallery1">
                                        <img :src="`/storage/${product . images[selectedImage] . imagename}`"
                                            alt="Image principale du produit" class="img-fluid rounded-3"
                                            style="width:400px; height:400px; object-fit: cover;" />
                                    </a>


                                </div>
                            </div>

                            <!-- Images secondaires -->
                            <div>
                                <div x-show="product && product.images && product.images.length > 1">
                                    <div class="row">
                                        <template x-for="(image, index) in product.images.slice(1)" :key="index">
                                            <div class="col-md-2 col-6 mb-4 d-flex justify-content-center">
                                                <div class="w-100" style="height:40px;">
                                                    <a href="javascript:void(0)" @click="selectedImage = index + 1"
                                                        class="glightbox" :data-gallery="'gallery1'">
                                                        <img :src="`/storage/${image . imagename}`"
                                                            alt="Image secondaire"
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
                                        <a class="d-flex align-items-center text-inherit fw-semibold mb-0"
                                           >
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
                            <div class="mb-4">
                                <h3 class="mb-4">Commentaires</h3>
                                <div class="row align-items-center mb-4">
                                    <div class="col-md-4 mb-4 mb-md-0">
                                        <!-- rating -->
                                        <h3 class="display-2 fw-bold">4.5</h3>
                                        <span class="fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-star-fill text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-star-fill text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-star-fill text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-star-fill text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-star-fill text-success"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        <p class="mb-0">595 Verified Buyers</p>
                                    </div>
                                    <div class="offset-lg-1 col-lg-7 col-md-8">
                                        <!-- progress -->
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-nowrap me-3">
                                                <span class="d-inline-block align-middle me-1">5</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-secondary"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="w-100">
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <span class="ms-3">420</span>
                                        </div>
                                        <!-- progress -->
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-nowrap me-3">
                                                <span class="d-inline-block align-middle me-1">4</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-secondary"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="w-100">
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="50"></div>
                                                </div>
                                            </div>
                                            <span class="ms-3">90</span>
                                        </div>
                                        <!-- progress -->
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-nowrap me-3">
                                                <span class="d-inline-block align-middle me-1">3</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-secondary"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="w-100">
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="35"></div>
                                                </div>
                                            </div>
                                            <span class="ms-3">33</span>
                                        </div>
                                        <!-- progress -->
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-nowrap me-3">
                                                <span class="d-inline-block align-middle me-1">2</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-secondary"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="w-100">
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 22%" aria-valuenow="22" aria-valuemin="0"
                                                        aria-valuemax="22"></div>
                                                </div>
                                            </div>
                                            <span class="ms-3">12</span>
                                        </div>
                                        <!-- progress -->
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-nowrap me-3">
                                                <span class="d-inline-block align-middle me-1">1</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-secondary"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="w-100">
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 14%" aria-valuenow="14" aria-valuemin="0"
                                                        aria-valuemax="14"></div>
                                                </div>
                                            </div>
                                            <span class="ms-3">40</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- review -->
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
                            </div>

                        </div>
                    </div>


                    <div class="col-xl-6 col-12">
                        <div class="my-5 mx-lg-8">
                            <!-- heading -->
                            <div class="d-flex flex-column gap-2">
                                <h4 class="mb-0" x-text="product.name"></h4>
                                <div>
                                    <!-- review -->
                                    <span>
                                        <span class="me-1 text-dark fw-semibold">
                                            4.4
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor"
                                                class="bi bi-star-fill text-success ms-1 align-baseline"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        592 avis
                                    </span>
                                </div>
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
                                <h5 class="mb-2 mb-md-0">Couleur</h5>
                                <div>
                                    <!-- Dynamically generate color radio buttons -->
                                    <div class="btn-group" role="group" aria-label="Couleur">
                                        <template x-for="(color, index) in product.colors" :key="index">
                                            <div>
                                                <input type="radio" class="btn-check" :id="'btnradioColor' + index" name="color" :value="color.name" />
                                                <label :for="'btnradioColor' + index" class="btn rounded-circle me-2 btn-icon btn-xs border border-2 border-white shadow"
                                                    :class="'btn-' + color.name.toLowerCase()"
                                                    x-text="color.name">
                                                    <i class="fe fe-check icon-checked"></i>
                                                </label>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="mb-6 d-md-flex justify-content-between align-items-center">
                                <!-- size -->
                                <h5 class="mb-2 mb-md-0">Taille</h5>
                                <div>
                                    <div class="btn-group" role="group" aria-label="Taille">
                                        <!-- Dynamically generate radio buttons for each size -->
                                        <template x-for="(size, index) in product.sizes" :key="index">
                                            <div>
                                                <input type="radio" class="btn-check" :id="'btnradio' + index" name="size" :value="size.name" />
                                                <label class="btn btn-outline-light border rounded-circle me-2 text-body btn-icon btn-md" :for="'btnradio' + index" x-text="size.name"></label>
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
                                        <a href="shopping-cart.html" class="btn btn-danger">
                                            <i class="fe fe-shopping-cart me-2"></i>
                                            Acheter
                                        </a>
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
                        <!-- Jumia Express Section -->
                        <div class="mb-3">
                            <h6 class="text-danger fw-bold">VTP <span class="text-warning">EXPRESS</span></h6>
                            <p class="small text-muted">Livraison en maximum 48h dans le monde . <a href="#"
                                    class="text-decoration-underline">Détails</a></p>
                        </div>

                        <!-- Choisissez le lieu Section -->
                        <div class="mb-3">
                            <label for="region" class="form-label">Choisissez le lieu</label>
                            <select id="region" class="form-select mb-2">
                                <option>Vallée du Bandama</option>
                                <option>Lagunes</option>
                                <option>Bas-Sassandra</option>
                            </select>
                            <select id="agence" class="form-select">
                                <option>Bouaké Agence</option>
                                <option>Yamoussoukro Agence</option>
                                <option>Korhogo Agence</option>
                            </select>
                        </div>

                        <!-- Point Relais Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-geo-alt-fill text-primary me-2 fs-5"></i>
                                <div>
                                    <p class="fw-bold mb-1">Point relais</p>
                                    <p class="small text-muted mb-0">Frais de livraison 500 FCFA (livraison gratuite si
                                        supérieur à 5,000 FCFA).</p>
                                    <p class="small text-muted">Prêt pour le retrait entre <strong>02 janvier</strong>
                                        et <strong>03 janvier</strong> si vous commandez dans les prochaines
                                        <strong>7hrs 0mins</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Politique de retour Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-arrow-counterclockwise text-success me-2 fs-5"></i>
                                <div>
                                    <p class="fw-bold mb-1">Politique de retour</p>
                                    <p class="small text-muted">Retours gratuits sur 10 jours.</p>
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
                files: [],
                pricedelivery: 0,
                showModal: false,
                selectedAdresse: null,

                quantite: 1,
                form: {
                    country_origine: '',
                    telephone: '',
                    adresse: '',
                    city: '',
                },
                product: @json($product),
                adressepyament: @json($allAdressePayment),
                errors: {},
                isEdite: false,
                searchQuery: '',
                currentAdresse: '',

                selectAdresse(file) {
                    this.selectedAdresse = file;
                },
                // Validation des champs obligatoires
                validateStep() {
                    this.errors = {};

                    if (!this.product.name) this.errors.name = 'Le champ Nom du produit est requis.';
                    if (!this.product.price) this.errors.price = 'Le champ Prix est requis.';
                    if (!this.product.quantity) this.errors.quantity = 'Le champ Quantité est requis.';
                    if (!this.product.category) this.errors.category = 'Veuillez sélectionner une catégorie.';
                    if (!this.product.description) this.errors.description = 'La description est obligatoire.';

                    return Object.keys(this.errors).length === 0;
                },



                validateForm() {
                    this.errors = {}; // Réinitialiser les erreurs
                    let isValid = true;

                    if (!this.form.country_origine) {
                        this.errors.country_origine = 'Le pays d\'origine est obligatoire.';
                        isValid = false;
                    }

                    if (!this.form.telephone || !/^\d{10}$/.test(this.form.telephone)) {
                        this.errors.telephone = 'Le téléphone est obligatoire et doit comporter 10 chiffres.';
                        isValid = false;
                    }

                    if (!this.form.adresse) {
                        this.errors.adresse = 'L\'adresse est obligatoire.';
                        isValid = false;
                    }

                    if (!this.form.city) {
                        this.errors.city = 'La ville est obligatoire.';
                        isValid = false;
                    }

                    return isValid;
                },


                filteredCountries() {
                    return this.listedeveliryPriceByCountries.filter(deliveryprice => {
                        return deliveryprice.country_start.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            deliveryprice.country_destination.toLowerCase().includes(this.searchQuery
                                .toLowerCase());
                    });
                },


                calculateTTC() {
                    const priceVente = Number(this.product.price_vente) || 0;
                    const priceDelivery = Number(this.pricedelivery) || 0;
                    const quantity = Number(this.quantite) || 1; // Par défaut, quantité = 1 si elle est invalide
                    return ((priceVente * quantity) + priceDelivery).toFixed(2);
                },

                addAdresse() {
                    if (this.files.length >= 2) {
                        alert("Vous ne pouvez ajouter que 2 adresses de paiement.");
                        return;
                    }
                    this.files.push({
                        file: null,
                        preview: null
                    });
                },

                hideModal() {
                    this.showModal = false;
                    this.currentAdresse = null;
                    this.resetForm();
                    this.isEdite = false;
                },

                selectCountry(deliveryprice) {
                    this.form.country_origine = deliveryprice.country_start + ' - ' + deliveryprice.country_destination;
                    this.pricedelivery = deliveryprice.prix;
                    // this.form.country_origine = deliveryprice.country_start + ' - ' + deliveryprice.country_destination;
                    // Mettre l'ID du pays dans un champ caché ou autre logique
                    this.$nextTick(() => {
                        this.errors = {}; // Réinitialiser les erreurs après sélection
                    });
                },

                resetForm() {
                    this.form = {
                        city: '',
                        adresse: '',
                        telephone: '',
                    };
                },

                openModal(adresse = null) {

                    this.isEdite = adresse !== null;
                    if (this.isEdite) {
                        this.currentAdresse = {
                            ...adresse
                        };


                        this.form = {
                            telephone: this.currentAdresse.telephone,
                            city: this.currentAdresse.city,
                            adresse: this.currentAdresse.adresse,
                            adresse_id: this.currentAdresse.id,

                        };


                    } else {
                        alert('icici');
                        this.resetForm();
                        this.isEdite = false;
                    }
                    this.showModal = true;
                },

                async deleteAdresse(adresseId) {
                    if (!confirm('Êtes-vous sûr de vouloir supprimer cette adresse de paiement ?')) {
                        return;
                    }


                    const url =
                        `{{ route('adresse.destroy', ['adresse' => '__ID__']) }}`.replace(
                            "__ID__",
                            adresseId
                        );


                    try {
                        const response = await fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        });

                        if (response.ok) {
                            this.adressepyament = this.adressepyament.filter(adresse => adresse.id !== adresseId);
                            Swal.fire({
                                icon: 'success',
                                title: 'Adresse supprimée avec succès.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de la suppression.',
                                text: await response.text(),
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur réseau est survenue.',
                            showConfirmButton: true
                        });
                    }
                },

                // Traitement du paiement
                async processPayment() {
                    const formData = new FormData();
                    formData.append('product_id', this.product.id);

                    try {
                        const response = await fetch('{{ route('begin.payment') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();

                            if (data.payment_url) {
                                window.open(
                                    data.payment_url,
                                    'Paiement',
                                    'width=800,height=600,scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no'
                                );
                            } else {
                                alert('Erreur: ' + (data.error || 'URL de paiement introuvable.'));
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de l\'enregistrement.',
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true
                        });
                    }
                },

                async storeAdresse() {

                    const adresseLength = Array.isArray(this.adressepyament) ?
                        this.adressepyament.length :
                        this.adressepyament.trim().split(/\s+/).length;

                    if (adresseLength > 2) {
                        alert('Vous ne pouvez entrer que 2 informations de paiement.');
                        return;
                    }
                    const formData = new FormData();
                    formData.append('telephone', this.form.telephone);
                    formData.append('adresse', this.form.adresse);
                    formData.append('city', this.form.city);

                    if (!this.currentAdresse) {
                        formData.append('adresse_id', null);
                    } else {
                        formData.append('adresse_id', this.currentAdresse.id);
                    }
                    try {
                        const response = await fetch('{{ route('adresse.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const adresse = data.adresse;

                            if (this.isEdite) {
                                const index = this.adressepyament.findIndex(a => a.id === adresse.id);
                                if (index !== -1) this.adressepyament[index] = adresse;
                            } else {
                                this.adressepyament.push(adresse);

                                this.adressepyament.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                            }

                            this.resetForm();
                            this.hideModal();

                            // this.adressepyament.push(data.adresse);
                            // Reset form fields


                            // if (this.isEdite) {
                            //     const index = this.users.findIndex(u => u.id === client.id);
                            //     if (index !== -1) this.users[index] = client;
                            // } else {
                            //     this.users.push(client);

                            //     this.users.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                            // }





                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de l\'enregistrement.',
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true
                        });
                    }
                },


            };
        }
    </script>
@endpush
