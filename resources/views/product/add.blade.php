@extends('layout')
@section('title', 'Enregistrer un produit ')
@section('content')
<section class="my-5 mx-3" x-data="formSteps()">

    <div class="container bg-white rounded-4 pe-lg-0 overflow-hidden">
        <div class="d-flex flex-column gap-3">
            <h1 class="mb-0 display-4 fw-bold text-warning">Enregistrer un nouveau produit</h1>
            <p class="mb-0 pe-xxl-8 me-xxl-5">Transformez votre influence en revenus. Influence Shop vous connecte directement à des marques qui souhaitent promouvoir leurs produits ou services auprès de votre communauté.</p>
        </div>

        <div class="card mb-4 position-relative mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Informations du Produit</h5>
                </div>

                <p class="card-text">Veuillez remplir les informations pour enregistrer votre produit.</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Nom du produit -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_name" placeholder="Nom du produit" x-model="form.product_name" required>
                                    <label for="product_name">Nom du produit</label>
                                    <template x-if="errors.product_name">
                                        <span class="text-danger" x-text="errors.product_name"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Prix du produit -->
                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_price" placeholder="Prix" x-model="form.product_price" required>
                                    <label for="product_price">Prix (€)</label>
                                    <template x-if="errors.product_price">
                                        <span class="text-danger" x-text="errors.product_price"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Quantité disponible -->
                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="qtedispo" placeholder="Qte" x-model="form.qtedispo" required>
                                    <label for="qtedispo">Qte Dispo</label>
                                    <template x-if="errors.qtedispo">
                                        <span class="text-danger" x-text="errors.qtedispo"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Poids du produit -->
                            <div class="col-md-2 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_weight" placeholder="Poids" x-model="form.product_weight" required>
                                    <label for="product_weight">Poids (kg)</label>
                                    <template x-if="errors.product_weight">
                                        <span class="text-danger" x-text="errors.product_weight"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Catégorie du produit -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="product_category" x-model="form.product_category" required>
                                        <option value="" selected>Selectionner une catégorie</option>
                                        @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product_category">Catégorie du produit</label>
                                    <template x-if="errors.product_category">
                                        <span class="text-danger" x-text="errors.product_category"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Tailles disponibles -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="product_size" x-model="form.product_size" required>
                                        <option value="" selected>Selectionner une taille</option>
                                        @foreach ($listetailles as $taille)
                                            <option value="{{ $taille->id }}">{{ $taille->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product_size">Taille du produit</label>
                                    <template x-if="errors.product_size">
                                        <span class="text-danger" x-text="errors.product_size"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Couleurs disponibles -->
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select class="form-select" id="product_color" x-model="form.product_color" required>
                                        <option value="" selected>Selectionner une couleur</option>
                                        @foreach ($listecouleurs as $couleur)
                                            <option value="{{ $couleur->id }}">{{ $couleur->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="product_color">Couleur du produit</label>
                                    <template x-if="errors.product_color">
                                        <span class="text-danger" x-text="errors.product_color"></span>
                                    </template>
                                </div>
                            </div>

                            <!-- Ajout des photos -->
                            <div class="col-md-12">
                                <h6 class="mb-3">Ajoutez des photos :</h6>
                                <div class="row">
                                    <template x-for="(file, index) in files" :key="index">
                                        <div class="col-md-3 col-sm-3 text-center mt-2">
                                            <div class="border rounded shadow-sm p-2 bg-light position-relative" style="cursor: pointer;" @click="document.getElementById(`fileInput${index}`).click()">
                                                <template x-if="file.preview">
                                                    <img :src="file.preview" class="img-fluid rounded" style="max-height: 150px; width: 100%; object-fit: cover;" alt="Aperçu">
                                                </template>
                                                <template x-if="!file.preview">
                                                    <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
                                                        <i class="bi bi-camera" style="font-size: 2rem; color: #6c757d;"></i>
                                                    </div>
                                                </template>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm mt-2" @click="files.splice(index, 1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z" />
                                                </svg>
                                            </button>
                                            <input type="file" :id="'fileInput' + index" class="d-none" accept="image/*" @change="handleFileChange($event, index)">
                                        </div>
                                    </template>
                                </div>
                                <button type="button" class="btn btn-outline-warning btn-sm" @click="addFileSlot()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Description du produit -->
                            <div class="col-md-12 mb-3 mt-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_description" placeholder="Description du produit" x-model="form.product_description" required>
                                    <label for="product_description">Description du produit</label>
                                    <template x-if="errors.product_description">
                                        <span class="text-danger" x-text="errors.product_description"></span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="button" class="btn btn-outline-secondary mt-4" @click="storeProduct()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path d="M11.354 8l-4.646 4.646a.5.5 0 0 1-.708-.708L9.793 9H1.5a.5.5 0 0 1 0-1h8.293L6.707 3.708a.5.5 0 1 1 .708-.708L11.354 8z" />
                    </svg>
                    Enregistrer
                </button>

            </div>
        </div>

    </div>
</section>
@endsection

@push('script')
    <script>
        function formSteps() {
            return {
                files: [],
                form: {
                    product_name: '',
                    product_price: '',
                    product_description: '',
                    qtedispo: '',
                    product_category: '',
                    product_size: '',
                    product_color: '',
                    product_weight: ''  // Ajout du champ poids
                },
                errors: {},
                addFileSlot() {
                    if (this.files.length >= 5) {
                        alert("Vous ne pouvez ajouter que 5 fichiers.");
                        return;
                    }
                    this.files.push({
                        file: null,
                        preview: null
                    });
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
                async storeProduct() {
                    const formData = new FormData();

                    formData.append('product_id', null);
                    this.files.forEach((fileObj, index) => {
                        if (fileObj.file) {
                            formData.append(`files[${index}]`, fileObj.file);
                        }
                    });

                    for (const [key, value] of Object.entries(this.form)) {
                        formData.append(key, value);
                    }

                    try {
                        const response = await fetch('{{ route('products.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();
                            Swal.fire({
                                icon: 'success',
                                title: 'Produit enregistré avec succès !',
                                showConfirmButton: true
                            });
                            window.location.href = '/products';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de l\'enregistrement.',
                                showConfirmButton: true
                            });
                        }
                    } catch (error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true
                        });
                    }
                }
            }
        }
    </script>
@endpush
