@extends('layout')
@section('title', 'Lidte des commandes')
@section('content')
    <main x-data="productSearch()" x-init="init()">
        <section class="pt-5 pb-5 bg-light">
            <div class="container">
                <div class="row mt-0 mt-md-4">
                    @include('dashboard.nav-bar')
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-12">
                                <!-- Card header -->
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">Liste des plans abonnements </h3>
                                        <span>Gestion des abonnements .</span>
                                    </div>
                                    <!-- Nav -->
                                    <div class="nav btn-group flex-nowrap" role="tablist">

                                        <button class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            @click="showModal = true">
                                            <i class='fa fa-add'></i>
                                            Création
                                        </button>
                                    </div>
                                </div>

                                <div class="p-4 row">
                                    <!-- Form -->
                                    <form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
                                        <span class="position-absolute ps-3 search-icon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="search" class="form-control ps-6" x-model="searchTerm"
                                            @input="filterProducts">
                                    </form>
                                </div>

                                <div class="table-invoice table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Libelle </th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Description</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="product in paginatedProducts" :key="product.id">
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-inherit">

                                                            <div class="">
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="truncateText(product.libelle, 20)"></h5>
                                                            </div>
                                </div>
                                </a>
                                </td>

                                <td>
                                    <a href="#" class="text-inherit">

                                        <div class="">
                                            <h5 class="mb-0 text-primary-hover" x-text="product.price"></h5>
                                        </div>
                            </div>
                            </a>
                            </td>



                            <td>
                                <a href="#" class="text-inherit">

                                    <div class="">
                                        <h5 class="mb-0 text-primary-hover" x-text="product.description"></h5>
                                    </div>
                        </div>
                        </a>
                        </td>

                        <td>
                            <button @click="openModal(product)">Edition</button>
                            <button @click="deleteAbonnement(product.id)">Suppresion</button>
                        </td>



                        </tr>

                        </template>
                        </tbody>
                        </table>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-7 offset-md-5 d-flex justify-content-end">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                        <button class="page-link" @click="goToPage(currentPage - 1)">Précedent</button>
                                    </li>
                                    <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                        <button class="page-link" @click="goToPage(currentPage + 1)">Suivant</button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            </div>
            </div>
            </div>
        </section>


        <template x-if="showModal">
            <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" x-text="isEdite ? 'Modification' : 'Création'"></h5>
                            <button type="button" class="btn-close" @click="hideModal()"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="submitForm">
                                <div class="mb-3">
                                    <label for="libelle" class="form-label">Libellé</label>
                                    <input type="text" id="libelle" class="form-control" x-model="formData.libelle"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="prix" class="form-label">Prix</label>
                                    <input type="text" id="prix" class="form-control" x-model="formData.prix"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description </label>
                                    <input type="text" id="description" class="form-control"
                                        x-model="formData.description" required>
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    x-text="isEdite ? 'Mettre à jour' : 'Enregistrer'"></button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </main>


@endsection

@push('script')
    <script>
        function productSearch() {
            return {
                searchTerm: '',
                products: @json($listeabonnement),
                filteredProducts: [],
                selectedCategory: '',
                showCategorySelect: true,
                currentPage: 1,
                productsPerPage: 10,
                totalPages: 0,
                isLoading: true,
                showModal: false,
                isEdite: false,
                formData: {
                    libelle: '',
                    prix: '',
                    description: '',
                },
                currentProduct: null,

                hideModal() {

                    this.showModal = false;
                    this.currentProduct = null;
                    this.resetForm();
                    this.isEdite = false;
                },

                openModal(product = null) {
                    this.isEdite = product !== null;
                    if (this.isEdite) {
                        this.currentProduct = {
                            ...product
                        };
                        this.formData = {
                            libelle: this.currentProduct.libelle,
                            prix: this.currentProduct.price,
                            description: this.currentProduct.description,
                        };
                    } else {
                        this.resetForm();

                        this.isEdite = false;
                    }
                    this.showModal = true;
                },

                handleFileChange(event) {
                    this.formData.image = event.target.files[0];
                },

                resetForm() {
                    this.formData = {
                        name: '',
                        prix: '',
                        description: '',

                    };
                },


                async submitForm() {
                    this.isLoading = true;

                    if (!this.formData.libelle || this.formData.libelle.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Le libellé est requis.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.prix || this.formData.prix.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Le prix est requis.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    if (!this.formData.description || this.formData.description.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'La description est requise.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    const formData = new FormData();
                    formData.append('libelle', this.formData.libelle);
                    formData.append('prix', this.formData.prix);
                    formData.append('description', this.formData.description);
                    formData.append('abonnement_id', this.currentProduct ? this.currentProduct.id : null);

                    try {
                        const response = await fetch('{{ route('abonnement.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData,
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const product = data.abonnement;

                            if (product) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Abonnement enregistré avec succès !',
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                if (this.isEdite) {
                                    const index = this.products.findIndex(p => p.id === product.id);
                                    if (index !== -1) {
                                        this.products[index] = product;
                                    }

                                } else {
                                    this.products.push(product);
                                    this.products.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                                }

                                this.filterProducts();
                                this.resetForm();
                                this.hideModal();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Produit non valide.',
                                    showConfirmButton: true
                                });
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
                    } finally {
                        this.isLoading = false;
                    }
                },


                get paginatedProducts() {
                    let start = (this.currentPage - 1) * this.productsPerPage;
                    let end = start + this.productsPerPage;
                    return this.filteredProducts.slice(start, end);
                },

                filterProducts() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredProducts = this.products.filter(user => {
                        return user.libelle && user.libelle.toLowerCase().includes(term) || user.created_at &&

                            user.created_at.toLowerCase().includes(term);
                    });
                    this.totalPages = Math.ceil(this.filteredProducts.length / this.productsPerPage);
                    this.currentPage = 1;
                },


                printProducts() {
                    let printContent = '<h1>Liste des Produits</h1>';
                    printContent +=
                        '<table border="1"><thead><tr><th>ID</th><th>Nom</th><th>Catégorie</th></tr></thead><tbody>';

                    this.filteredProducts.forEach(product => {
                        printContent +=
                            `<tr><td>${product.id}</td><td>${product.libelleproduct}</td><td>${product.category.libellecategorieproduct}</td></tr>`;
                    });

                    printContent += '</tbody></table>';

                    const printWindow = window.open('', '', 'height=500,width=800');
                    printWindow.document.write('<html><head><title>Impression des produits</title></head><body>');
                    printWindow.document.write(printContent);
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();
                    printWindow.print();
                },

                exportProducts() {
                    let csvContent = "ID,Nom,Catégorie\n";

                    this.filteredProducts.forEach(product => {
                        csvContent +=
                            `${product.id},${product.libelleproduct},${product.category.libellecategorieproduct}\n`;
                    });

                    // Créer un fichier CSV et le télécharger
                    const blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });
                    const link = document.createElement("a");
                    const url = URL.createObjectURL(blob);
                    link.setAttribute("href", url);
                    link.setAttribute("download", "produits_filtrés.csv");
                    link.click();
                },


                filterByCategory() {
                    // Réinitialiser filteredProducts à la liste complète des produits
                    this.filteredProducts = this.products;

                    if (this.selectedCategory) {
                        // Appliquer le filtre sur les produits par catégorie
                        this.filteredProducts = this.filteredProducts.filter(product => product.category.id === parseInt(
                            this.selectedCategory));
                    }

                    // Optionnel : Appliquer également un filtrage par recherche textuelle (si nécessaire)
                    if (this.searchTerm) {
                        this.filteredProducts = this.filteredProducts.filter(product => {
                            return product.libelleproduct.toLowerCase().includes(this.searchTerm.toLowerCase());
                        });
                    }

                    // Calculer le nombre de pages en fonction du nombre de produits filtrés
                    this.totalPages = Math.ceil(this.filteredProducts.length / this.productsPerPage);
                },

                async deleteProduct(productId) {
                    try {
                        const url =
                            `{{ route('products.destroy', ['product' => '__ID__']) }}`.replace(
                                "__ID__",
                                productId
                            );

                        const response = await fetch(url, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                        });

                        if (response.ok) {
                            const result = await response.json();
                            if (result.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });

                                // Retirer le produit de la liste `this.products`
                                this.products = this.products.filter(product => product.id !== productId);

                                // Après suppression, appliquer le filtre pour mettre à jour la liste affichée
                                this.filterProducts();
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: result.message,
                                    showConfirmButton: true,
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Erreur lors de la requête.",
                                showConfirmButton: true,
                            });
                        }
                    } catch (error) {
                        console.error("Erreur réseau :", error);
                        Swal.fire({
                            icon: "error",
                            title: "Une erreur réseau s'est produite.",
                            showConfirmButton: true,
                        });
                    }
                },

                truncateText(text, length) {
                    if (text.length > length) {
                        return text.substring(0, length) + '...'; // Ajoute "..." si le texte est trop long
                    }
                    return text;
                },


                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                init() {

                    this.filterProducts();
                    this.isLoading = false;
                }
            };
        }
    </script>
@endpush
