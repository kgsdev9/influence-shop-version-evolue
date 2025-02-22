@extends('layout')
@section('title', 'Panier')
@section('content')
    <main class="bg-light">
        <div x-data="cartComponent" class="container py-5 ">
            <div class="row gy-4">

                <!-- Panier à gauche -->
                <div class="col-lg-9">
                    <div class="d-flex flex-column gap-4">
                        <div class="card">
                            <!-- Card Header -->
                            <div class="card-header">
                                <div class="d-flex">
                                    <h4 class="mb-0">
                                        Mon Panier
                                        <span x-text="`(${products.length} articles)`"></span>
                                    </h4>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Message panier vide -->
                                <div x-show="products.length === 0" class="text-center py-5">
                                    <h5>Votre panier est vide</h5>
                                    <p>Ajoutez des produits à votre panier pour commencer vos achats.</p>
                                    <a href="{{ route('product.home') }}" class="btn btn-warning">Continuer vos achats</a>
                                </div>

                                <!-- Affichage du panier avec produits -->
                                <div x-show="products.length > 0" class="table-responsive table-card">
                                    <table class="table mb-0 text-nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Designation</th>
                                                <th>Prix Unit</th>
                                                <th>Qte</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(product, index) in products" :key="index">
                                                <tr>
                                                    <td>
                                                        <div class="d-flex flex-row gap-4">
                                                            <div>
                                                                <img :src="product.image" alt=""
                                                                    class="img-4by3-md rounded">
                                                            </div>
                                                            <div class="mt-2 mt-lg-0 d-flex flex-column gap-4">
                                                                <div class="d-flex flex-column gap-1">
                                                                    <span class="mb-0 text-primary-hover"
                                                                        x-text="product.name.length > 10 ? product.name.slice(0, 30) + '...' : product.name">
                                                                    </span>

                                                                    <div>
                                                                        <!-- Vérifie si la couleur existe avant d'afficher -->
                                                                        <span x-show="product.color"
                                                                            x-text="'Couleur: ' + product.color"
                                                                            class="text-dark fw-medium"></span>
                                                                        <!-- Vérifie si la taille existe avant d'afficher -->
                                                                        <span x-show="product.taille"
                                                                            x-text="'Taille: ' + product.taille"
                                                                            class="text-dark fw-medium"></span>
                                                                    </div>

                                                                </div>
                                                                <div>

                                                                    <a href="#" class="text-body ms-3"
                                                                        @click.prevent="removeProduct(index)">Supprimer</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h4 class="mb-0"
                                                            x-text="'€' + (parseFloat(product.price) || 0).toFixed(2)"></h4>
                                                    </td>

                                                    <td>
                                                        <div class="input-group flex-nowrap justify-content-center">
                                                            <input type="button" value="-"
                                                                class="button-minus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 py-1"
                                                                @click="updateQuantity(index, product.quantity - 1)">
                                                            <input type="number" step="1" max="10"
                                                                :value="product.quantity" name="quantity"
                                                                class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 py-1">
                                                            <input type="button" value="+"
                                                                class="button-plus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 py-1"
                                                                @click="updateQuantity(index, product.quantity + 1)">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h4 class="mb-0"
                                                            x-text="'€' + (product.price * product.quantity).toFixed(2)">
                                                        </h4>
                                                    </td>
                                                </tr>
                                            </template>

                                            <tr>
                                                <td class="align-middle border-top-0 border-bottom-0"></td>
                                                <td class="align-middle border-top-0 border-bottom-0">
                                                    <h4 class="mb-0">Total HT</h4>
                                                </td>
                                                <td class="align-middle border-top-0 border-bottom-0 text-center">
                                                    <span class="fs-4" x-text="`${products.length} (articles)`"></span>
                                                </td>
                                                <td>
                                                    <h4 class="mb-0" x-text="'€' + total.toFixed(2)"></h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('product.home') }}" class="btn btn-outline-warning">Continuer vos achats</a>

                            <!-- Bouton Passer à la caisse uniquement si total > 10 -->
                            <a href="{{ route('somaire.cmde') }}" class="btn btn-warning" x-show="total > 10">Passer à la
                                caisse</a>
                        </div>
                    </div>
                </div>

                <!-- Panier à droite -->
                <div class="col-lg-3">
                    <div class="d-flex flex-column gap-4">

                        <!-- Sommaire de commande -->
                        <div class="card">
                            <div class="card-body d-flex flex-column gap-3">
                                <h4 class="mb-0">Récapitulatif de la commande</h4>
                                <ul class="list-group list-group-flush">
                                    <!-- Montant HT -->
                                    <li
                                        class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                        <span>Montant HT :</span>
                                        <span x-text="'€' + total.toFixed(2)"></span>
                                    </li>
                                    <!-- Poids Commande -->
                                    <li
                                        class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                        <span>Poids de la commande :</span>
                                        <span x-text="totalWeight.toFixed(2) + ' kg'"></span>
                                    </li>
                                    <!-- Montant du Poids en € -->
                                    <li
                                        class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                        <span>Montant Poids :</span>
                                        <span x-text="'€' + totalWeightInEuros.toFixed(2)"></span>
                                    </li>
                                    <!-- Montant TTC -->
                                    <li
                                        class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium pb-0">
                                        <span>Montant TTC :</span>
                                        <span x-text="'€' + finalTotal.toFixed(2)"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <div class="px-0 d-flex justify-content-between fs-5 text-dark fw-semibold">
                                    <span>Total (EUR)</span>
                                    <span x-text="'€' + finalTotal.toFixed(2)"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        function cartComponent() {
            return {
                products: @json($cart), // Récupérer les produits du panier depuis Laravel
                get total() {
                    return this.products.reduce((total, product) => total + (parseFloat(product.price) * product
                        .quantity), 0);
                },
                get totalWeight() {
                    return this.products.reduce((total, product) => total + (parseFloat(product.weight) * product
                        .quantity), 0);
                },
                get totalWeightInEuros() {
                    return this.totalWeight; // 1 kg = 1€
                },
                get finalTotal() {
                    return this.total + this.totalWeightInEuros; // Montant HT + Montant Poids
                },
                updateQuantity(index, quantity) {
                    if (quantity < 1) return; // Empêcher la quantité d'être inférieure à 1
                    this.products[index].quantity = quantity;

                    // Mettre à jour la quantité côté serveur
                    fetch('/update-quantity', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            index,
                            quantity
                        })
                    });
                },
                removeProduct(index) {
                    this.products.splice(index, 1);

                    // Supprimer le produit côté serveur
                    fetch('/remove-product', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            index
                        })
                    });
                },

            }
        }
    </script>
@endpush
