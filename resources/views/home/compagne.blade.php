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

                                    <!-- Sélecteur de pays -->
                                    @can('admin')
                                        <div class="my-3">
                                            <label for="countrySelect" class="form-label">Choisir un pays</label>
                                            <select id="countrySelect" class="form-select" wire:model="selectedCountry">
                                                <option value="">Sélectionner un pays</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Sélecteur de ville -->
                                        <div class="my-3">
                                            <label for="citySelect" class="form-label">Choisir une ville</label>
                                            <select id="citySelect" class="form-select" wire:model="selectedCity"
                                                wire:change="filterCandidates">
                                                <option value="">Sélectionner une ville</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endcan
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
                        <h3 class="pb-0 fw-bold text-dark m-0">Toutes les compagnes </h3>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-5">
                        @foreach ($compagnes as $compagne)
                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-12">
                                <!-- card -->
                                <div class="card h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex flex-column gap-4">
                                            <div class="d-flex flex-column gap-3">
                                                <!-- heading-->
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <!-- text-->

                                                    <div class="d-flex align-items-center">
                                                        <div class="icon-shape icon-lg rounded-3 border p-4">
                                                            <i class="fe fe-shopping-cart fs-3"></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h4 class="mb-0"><a href="#"
                                                                    class="text-inherit">{{ $compagne->name }}</a></h4>
                                                            <span class="fs-6">{{ $compagne->product->name }}</span>
                                                        </div>
                                                    </div>
                                                    <!-- dropdown-->
                                                    <div class="d-flex">
                                                        <div class="dropdown dropstart">

                                                            <div class="dropdown-menu" aria-labelledby="dropdownProjectSix">
                                                                <span class="dropdown-header">Action PUB</span>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fe fe-edit dropdown-item-icon"></i>
                                                                    Edit Details
                                                                </a>

                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fe fe-link dropdown-item-icon"></i>
                                                                    Copy project link
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fe fe-save dropdown-item-icon"></i>
                                                                    Save as Default
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fe fe-copy dropdown-item-icon"></i>
                                                                    Duplicate
                                                                </a>




                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- para-->
                                                <div>
                                                    <p class="mb-0">{{ $compagne->description }}</p>
                                                </div>
                                            </div>
                                            <!-- progress -->
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <div class="d-flex align-items-center">
                                                    <!-- avatar group -->
                                                    <div class="avatar-group">
                                                        <span class="avatar avatar-md">
                                                            <img alt="avatar"
                                                                src="../../assets/images/avatar/avatar-15.jpg"
                                                                class="rounded-circle imgtooltip" data-template="sixteen ">
                                                            <span id="sixteen" class="d-none">
                                                                <small class="fw-semibold">Gilbert Farr</small>
                                                            </span>
                                                        </span>
                                                        <span class="avatar avatar-md avatar-danger imgtooltip"
                                                            data-template="textFive">
                                                            <span class="avatar-initials rounded-circle">GK</span>

                                                            <span id="textFive" class="d-none">
                                                                <small class="fw-semibold">Geeks Only</small>
                                                            </span>
                                                        </span>
                                                        <span class="avatar avatar-md">
                                                            <img alt="avatar"
                                                                src="../../assets/images/avatar/avatar-17.jpg"
                                                                class="rounded-circle imgtooltip" data-template="eighteen ">
                                                            <span id="eighteen" class="d-none">
                                                                <small class="fw-semibold">Jamie Lusar</small>
                                                            </span>
                                                        </span>
                                                        <span class="avatar avatar-md">
                                                            <span
                                                                class="avatar-initials rounded-circle bg-light text-dark">5+</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- text -->
                                                <div>
                                                    <span class="badge bg-success-soft">En cours</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- card footer -->
                                    <div class="card-footer p-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="w-50 py-3 px-4">
                                                <h6 class="mb-0">Date fin :</h6>
                                                <p class="text-dark fs-6 fw-semibold mb-0">{{ $compagne->end_date }}</p>
                                            </div>
                                            <div class="border-start w-50 py-3 px-4">
                                                <h6 class="mb-0">Budget:</h6>
                                                <p class="text-dark fs-6 fw-semibold mb-0">{{ $compagne->total_budget }}
                                                </p>
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
