@extends('layout')
@section('content')
    <section class="my-5 mx-3" x-data="productForm({{ json_encode($product) }}, {{ json_encode($allCategories) }})" x-init="init()">
        <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">
            <div class="d-flex flex-column gap-3">
                <h1 class="mb-0 display-4 fw-bold text-warning"> Modifier un produit </h1>
                <p class="mb-0 pe-xxl-8 me-xxl-5">Transformez votre influence en revenus. Influence Shop vous connecte
                    directement à des marques qui souhaitent promouvoir leurs produits ou services auprès de votre
                    communauté.</p>
            </div>

            <div class="card mb-4 position-relative mt-4">
                <div class="card-body">
                    <h5 class="card-title">Informations du Produit</h5>
                    <p class="card-text">Veuillez remplir les informations pour enregistrer votre produit.</p>
                    <div>
                        <div class="row">
                            <!-- Nom du produit -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_name"
                                        placeholder="Nom du produit" x-model="form.product_name" required>
                                    <label for="product_name">Nom du produit</label>
                                    <template x-if="errors.product_name">
                                        <span class="text-danger" x-text="errors.product_name"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Prix du produit -->
                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_price" placeholder="Prix"
                                        x-model="form.product_price" required>
                                    <label for="product_price">Prix (€)</label>
                                    <template x-if="errors.product_price">
                                        <span class="text-danger" x-text="errors.product_price"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Quantité disponible -->
                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="qtedispo" placeholder="Qte"
                                        x-model="form.qtedispo" required>
                                    <label for="qtedispo">Qte Dispo</label>
                                    <template x-if="errors.qtedispo">
                                        <span class="text-danger" x-text="errors.qtedispo"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Catégorie du produit -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="product_category" x-model="form.product_category"
                                        required>
                                        <option value="" selected>Selectionner une catégorie</option>
                                        <template x-for="category in allCategories" :key="category.id">
                                            <option :value="category.id"
                                                x-bind:selected="form.product_category == category.id">
                                                <span x-text="category.name"></span>
                                            </option>
                                        </template>
                                    </select>
                                    <label for="product_category">Catégorie du produit</label>
                                    <template x-if="errors.product_category">
                                        <span class="text-danger" x-text="errors.product_category"></span>
                                    </template>
                                </div>
                            </div>

                            <h6 class="mb-3">Ajoutez ou modifiez des photos :</h6>

                            <div>
                                <div class="row">
                                    <!-- Affichage des images existantes -->
                                    <template x-for="(image, index) in product_images" :key="index">
                                        <div class="col-md-3 col-sm-3 text-center mt-2">
                                            <div class="border rounded shadow-sm p-2 bg-light position-relative">
                                                <!-- Aperçu de l'image -->
                                                <img :src="'/s3/' + image.imagename" class="img-fluid rounded"
                                                    style="max-height: 150px; width: 100%; object-fit: cover;"
                                                    :alt="'Image ' + (index + 1)">
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm mt-2"
                                                @click="removeImage(image.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </template>

                                    <!-- Ajout de nouvelles images -->
                                    <template x-for="(file, index) in files" :key="index">
                                        <div class="col-md-3 col-sm-3 text-center mt-2">
                                            <div class="border rounded shadow-sm p-2 bg-light position-relative"
                                                style="cursor: pointer;" @click="document.getElementById(`fileInput${index}`).click()">
                                                <template x-if="file.preview">
                                                    <img :src="file.preview" class="img-fluid rounded"
                                                        style="max-height: 150px; width: 100%; object-fit: cover;"
                                                        alt="Aperçu">
                                                </template>
                                                <template x-if="!file.preview">
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="height: 150px;">
                                                        <i class="bi bi-camera"
                                                            style="font-size: 2rem; color: #6c757d;"></i>
                                                    </div>
                                                </template>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm mt-2"
                                                @click="files.splice(index, 1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z" />
                                                </svg>
                                            </button>
                                            <input type="file" :id="'fileInput' + index" class="d-none" accept="image/*"
                                                @change="handleFileChange($event, index)">
                                        </div>
                                    </template>

                                    <!-- Bouton pour ajouter une image -->
                                    <div class="col-md-3 col-sm-3 text-center mt-2">
                                        <div class="border rounded shadow-sm p-2 bg-light position-relative"
                                            style="cursor: pointer;" @click="addImage()">
                                            <div class="d-flex align-items-center justify-content-center"
                                                style="height: 150px;">
                                                <i class="bi bi-plus-circle" style="font-size: 2rem; color: #6c757d;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Description du produit -->
                            <div class="col-md-12 mb-3 mt-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_description"
                                        placeholder="Description du produit" x-model="form.product_description" required>
                                    <label for="product_description">Description du produit</label>
                                    <template x-if="errors.product_description">
                                        <span class="text-danger" x-text="errors.product_description"></span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-secondary mt-4" @click="updateProduct()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path
                                d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                        </svg>
                        Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function productForm(initialData, categories) {
            return {
                files: [],
                allCategories: categories,
                product_images: initialData.images || [],
                form: {
                    product_name: initialData.name,
                    product_id:initialData.id,
                    produy: initialData.name,
                    product_price: initialData.price_vente,
                    product_description: initialData.description,
                    qtedispo: initialData.qtedisponible,
                    product_category: initialData.category_id,
                },
                errors: {},
                init() {

                },
                validateStep() {
                    this.errors = {};
                    if (!this.form.product_name) this.errors.product_name = 'Le champ Nom du produit est requis.';
                    if (!this.form.product_price) this.errors.product_price = 'Le champ Prix est requis.';
                    if (!this.form.qtedispo) this.errors.qtedispo = 'Le champ Quantité disponible est requis.';
                    if (!this.form.product_category) this.errors.product_category = 'Veuillez sélectionner une catégorie.';
                    if (!this.form.product_description) this.errors.product_description = 'La description est obligatoire.';
                    return Object.keys(this.errors).length === 0;
                },

                handleFileChange(event, index) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.files[index].preview = e.target.result;
                            this.files[index].file = file;
                        };
                        reader.readAsDataURL(file);
                    }
                },

                addImage() {
                    this.files.push({});
                },

                removeImage(imageId) {
                    this.product_images = this.product_images.filter(image => image.id !== imageId);
                    console.log(`Image avec l'ID ${imageId} supprimée.`);
                },

                async updateProduct() {
    if (!this.validateStep()) {
        alert("Veuillez corriger les erreurs avant de soumettre.");
        return;
    }

    // Créer l'objet FormData
    const formData = new FormData();

    // Ajouter les champs de données du formulaire à FormData
    formData.append('product_name', this.form.product_name);
    formData.append('product_id', this.form.product_id);
    formData.append('product_price', this.form.product_price);
    formData.append('product_description', this.form.product_description);
    formData.append('qtedispo', this.form.qtedispo);
    formData.append('product_category', this.form.product_category);

    // Ajouter les fichiers (images) au FormData
    this.files.filter(fileObj => fileObj.file).forEach((fileObj, index) => {
        formData.append(`images[${index}]`, fileObj.file);
    });

    try {
        const response = await fetch('{{ route('products.store') }}', {
            method: 'POST', // Utiliser POST pour créer un nouveau produit
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF pour la sécurité
            },
            body: formData, // Envoie FormData (contenu avec les images et données texte)
        });

        if (response.ok) {
            const data = await response.json();
            Swal.fire({
                icon: 'success',
                title: 'Produit créé avec succès !',
                showConfirmButton: true,
            });

            window.location.href = '/products'; // Redirection après succès
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Erreur lors de la création.',
                showConfirmButton: true,
            });
        }
    } catch (error) {
        console.error('Erreur réseau :', error);
        Swal.fire({
            icon: 'error',
            title: 'Une erreur est survenue.',
            showConfirmButton: true,
        });
    }
}

            }
        }
    </script>
@endpush
