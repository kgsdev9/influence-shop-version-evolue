@extends('layout')
@section('content')
    <div>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <aside class="sidebar-fixed mt-7">
                        <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                            <div class="navbar-collapse collapse" id="navbarNav">
                                <div class="side-nav me-auto flex-column navbar-nav">
                                    <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">CATEGORIES</p>
                                    @foreach ($categories as $value)
                                        <div class="form-check my-1">
                                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}"
                                                wire:model="selectedCategories" id="category-{{ $value->id }}">
                                            <label class="form-check-label ps-1" for="category-{{ $value->id }}">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </nav>
                    </aside>

                    <aside class="sidebar-fixed mt-4">
                        <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                            <div class="navbar-collapse collapse" id="navbarNav">
                                <div class="side-nav me-auto flex-column navbar-nav">
                                    <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">CATEGORIES</p>
                                    @foreach ($categories as $value)
                                        <div class="form-check my-1">
                                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}"
                                                wire:model="selectedCategories" id="category-{{ $value->id }}">
                                            <label class="form-check-label ps-1" for="category-{{ $value->id }}">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </nav>
                    </aside>

                    <aside class="sidebar-fixed mt-4">
                        <nav class="navbar sidebar-courses navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                            <div class="navbar-collapse collapse" id="navbarNav">
                                <div class="side-nav me-auto flex-column navbar-nav">
                                    <p class="navbar-header nav-item mb-2 p-0 text-dark mt-4">CATEGORIES</p>
                                    @foreach ($categories as $value)
                                        <div class="form-check my-1">
                                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}"
                                                wire:model="selectedCategories" id="category-{{ $value->id }}">
                                            <label class="form-check-label ps-1" for="category-{{ $value->id }}">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </nav>
                    </aside>
                </div>


                <div class="col-lg-9 col-sm-12">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <h3 class="pb-0 fw-bold text-dark m-0">Tous les produits</h3>
                    </div>
                    <div x-data="productManager()" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mb-5">
                        <template x-for="product in products" :key="product.id">
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <!-- Image avec gestion de zoom -->
                                    <div class="image-container" style="cursor: pointer; overflow: hidden; position: relative;">
                                        <img :src="product.images.length ? `/storage/${product.images[0].imagename}` :
                                            '../../assets/images/default-product.jpg'"
                                            alt="Product Image" @click="zoomed = !zoomed" :class="zoomed ? 'zoomed' : ''"
                                            class="card-img-top img-fluid rounded-top"
                                            style="max-height: 200px; width: 100%; object-fit: contain; transition: transform 0.3s ease;">
                                    </div>

                                    <!-- Informations produit -->
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">
                                            <a :href="`{{ route('product.show', '') }}/${product.id}`" class="text-inherit"
                                                x-text="product.name"></a>
                                        </h5>
                                        <p class="card-text text-muted"
                                            x-text="product.description.length > 50 ? product.description.substring(0, 50) + '...' : product.description">
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <h6 class="text-warning mb-0" x-text="product.price_vente"></h6>
                                            <a :href="`{{ route('buy.product', '') }}/${product.id}`"
                                                class="btn btn-danger btn-sm"> <i class="fe fe-shopping-cart fs-3"></i> Acheter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection


@push('script')
    <script>
        function productManager() {
            return {
                products: @json($listeproduct),
            };
        }
    </script>
@endpush
