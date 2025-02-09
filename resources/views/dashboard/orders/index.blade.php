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
                                        <h3 class="mb-0">Liste des commandes </h3>
                                        <span>Gestion des commandes .</span>
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
                                                <th scope="col">Réference</th>
                                                <th scope="col">Qte Cmde</th>
                                                <th scope="col">Montant TTC </th>
                                                <th scope="col">Status</th>

                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <template x-for="product in paginatedProducts" :key="product.id">
                                                <tr>


                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!-- SVG pour la commande -->
                                                            <i class="fe fe-file-text nav-icon"></i>

                                                            <!-- Optionnel : texte ou autre contenu à côté -->
                                                            <a :href="'/orders/' + product.id" class="text-inherit">
                                                                <div>
                                                                    <h5 class="mb-0 text-primary-hover"
                                                                        x-text="product.reference"></h5>
                                                                </div>
                                                            </a>
                                                        </div>

                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="product.qtecmde"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="product.montantht"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover" x-text="product.status">
                                                                </h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                   

                                                    <td>
                                                        <!-- Affichage des boutons selon le statut -->
                                                        <template x-if="product.status === 'pending'">
                                                            <div class="d-flex gap-3">
                                                                <!-- Bouton Finaliser l'achat -->
                                                                <button class="btn btn-outline-success"
                                                                    @click="processPayment(product.id)">
                                                                    <i class="fe fe-credit-card nav-icon"></i>
                                                                </button>
                                                                <!-- Bouton Supprimer -->
                                                                <button @click="deleteOrders(product.id)"
                                                                    class="btn btn-outline-danger">
                                                                    <i class="fe fe-trash-2 nav-icon"></i>
                                                                </button>
                                                            </div>
                                                        </template>


                                                        <template x-if="product.status === 'succes'">
                                                            <div class="d-flex gap-2">
                                                                <button class="btn btn-dark"><i
                                                                        class="fe fe-printer nav-icon"></i> </button>
                                                                <button class="btn btn-success"><i
                                                                        class="fe fe-truck nav-icon"></i>
                                                                </button>
                                                            </div>
                                                        </template>




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
                                                    <button class="page-link"
                                                        @click="goToPage(currentPage - 1)">Précedent</button>
                                                </li>
                                                <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                                    <button class="page-link"
                                                        @click="goToPage(currentPage + 1)">Suivant</button>
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
    </main>


@endsection

@push('script')
    <script>
        function productSearch() {
            return {
                searchTerm: '',
                products: @json($listeOrders),
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
                    name: '',
                    prixachat: '',
                    prixvente: '',
                    image: '',
                    category_id: ''
                },
                currentProduct: null,


                async submitForm() {
                    this.isLoading = true;

                    if (!this.formData.name || this.formData.name.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Le nom du produit est requis.',
                            showConfirmButton: true
                        });
                        this.isLoading = false;
                        return;
                    }

                    const formData = new FormData();
                    formData.append('name', this.formData.name);
                    formData.append('prixachat', this.formData.prixachat);
                    formData.append('prixvente', this.formData.prixvente);
                    formData.append('category_id', this.formData.category_id);
                    formData.append('product_id', this.currentProduct ? this.currentProduct.id : null);
                    if (this.formData.image) {
                        formData.append('image', this.formData.image);
                    }

                    try {
                        const response = await fetch('{{ route('products.store') }}', {
                            method: 'POST', // Toujours 'POST', même pour la mise à jour
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData, // Utilisez FormData pour envoyer l'image
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const product = data.product;

                            if (product) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Produit enregistré avec succès !',
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

                async processPayment(productId) {

                    const formData = new FormData();
                    formData.append('product_id', productId);
                    formData.append('argument', 2);

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
                                window.location.href = data.payment_url;
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


                get paginatedProducts() {
                    let start = (this.currentPage - 1) * this.productsPerPage;
                    let end = start + this.productsPerPage;
                    return this.filteredProducts.slice(start, end);
                },

                filterProducts() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredProducts = this.products.filter(user => {
                        return user.reference && user.reference.toLowerCase().includes(term) || reference
                            .created_at &&

                            user.created_at.toLowerCase().includes(term);
                    });
                    this.totalPages = Math.ceil(this.filteredProducts.length / this.productsPerPage);
                    this.currentPage = 1;
                },

                async deleteOrders(paymentId) {
                    try {
                        const url =
                            `{{ route('destroy.payment', ['paymentId' => '__ID__']) }}`.replace(
                                "__ID__",
                                paymentId
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
                                this.products = this.products.filter(product => product.id !== paymentId);

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
