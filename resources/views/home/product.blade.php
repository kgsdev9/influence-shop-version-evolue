@extends('layout')
@section('content')
    <div>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <aside class="sidebar-fixed">
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
                        <h3 class="pb-0 fw-bold text-dark m-0">Tous nos candidats</h3>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-5">
                        @foreach ($listeproduct as $candidat)
                            <div class="col-xxl-3 col-xl-3 col-md-6 col-12">
                                <!--card-->
                                <div class="card rounded-4 card-bordered card-lift">
                                    <div class="p-3 d-flex flex-column gap-3">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <a href="{{ route('products.show', $candidat->id) }}" class="me-3">
                                                <img src="{{ asset('avatar.png') }}" alt="candidat 1"
                                                    class="rounded-circle avatar-xl mb-3" style="width:70px; height:75px;">
                                            </a>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-patch-check-fill text-success"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                                                    </path>
                                                </svg>

                                            </div>
                                        </div>

                                        <!--content-->
                                        <div class="d-flex flex-column gap-4">
                                            <div class="d-flex flex-column gap-2">
                                                <div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <h3 class="mb-0">
                                                            <a href="" class="text-reset">{{ $candidat->nom }}
                                                                {{ $candidat->prenom }}</a>
                                                        </h3>

                                                    </div>
                                                    <span
                                                        class="text-gray-800">{{ $candidat->specialite->libellespecialite ?? 'rien' }}</span>
                                                </div>

                                                <div class="d-flex align-items-center justify-content-between fs-6">
                                                    <div>
                                                        <span>{{ $candidat->ville->libelleville ?? 'rien' }}</span>
                                                        <div class="vr mx-2 text-gray-200"></div>
                                                        <span> 3 ans
                                                            d'exp</span>
                                                    </div>
                                                    <div class="d-flex gap-1 align-items-center lh-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg>
                                                        <span
                                                            class="fw-bold text-dark">{{ $candidat->rating ?? 'rien' }}</span>
                                                        <span>({{ $candidat->reviews ?? 'rien' }} Avis)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <div>

                                                    <div class="d-flex flex-row gap-1 align-items-center">
                                                        <h4 class="mb-0"><i class="fe fe-eye"></i></h4>
                                                        <span class="fs-6">{{ $candidat->visiteur ?? 'rien' }}</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href=""
                                                        class="btn btn-outline-dark btn-sm">Consulter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
