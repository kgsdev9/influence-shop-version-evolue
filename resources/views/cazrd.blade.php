<div x-data="productManager()" class="row gy-4">
    <template x-for="product in products" :key="product.id">
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
            <div class="card h-100">
                <!-- Image -->
                <img
                    :src="product.images.length ? `/storage/${product.images[0].imagename}` : '../../assets/images/default-product.jpg'"
                    alt="Product Image"
                    class="img-fluid rounded-top"
                    style="max-height: 200px; width: 100%; object-fit: contain;">

                <!-- Informations produit -->
                <div class="card-body">
                    <h4 class="mb-0"><a href="#" class="text-inherit" x-text="product.name"></a></h4>
                    <span class="fs-6" x-text="product.description"></span>

                    <!-- Barre de progression pour la quantité restante -->
                    <div class="mt-4">
                        <div class="progress progress-tooltip" style="height: 6px">
                            <div
                                class="progress-bar bg-success"
                                role="progressbar"
                                :style="{ width: `${Math.min(product.qtedisponible, 100)}%` }"
                                :aria-valuenow="product.qtedisponible"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                x-text="`${product.qtedisponible}%`">
                            </div>
                        </div>
                        <small class="text-muted d-block mt-2">
                            Quantité disponible : <span x-text="product.qtedisponible"></span>
                        </small>
                    </div>
                </div>

                <!-- Footer de la carte -->
                <div class="card-footer p-0">
                    <div class="d-flex justify-content-between">
                        <div class="w-60 py-3 px-2">
                            <a href="#!" class="btn btn-outline-secondary">
                                <i class="fe fe-shopping-cart fs-3"></i> Acheter
                            </a>
                        </div>
                        <div class="border-start w-50 py-3 px-4">
                            <a href="#!" class="btn btn-outline-secondary">Partager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

@push('script')
<script>
    function productManager() {
        return {
            products: @json($listeproduct),
        };
    }
</script>
@endpush
