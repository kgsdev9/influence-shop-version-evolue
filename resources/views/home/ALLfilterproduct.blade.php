@extends('layout')
@section('title', 'Tous les Produits')
@section('content')
<div x-data="productManager" x-init="init()">
    <div class="container py-5">
        <div class="row">


            <div class="col-xxl-3 col-lg-4 col-12">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row align-items-center justify-content-between mt-2 mb-3">
                        <div class="d-flex flex-row gap-2 align-items-center">
                            <a class="text-inherit d-none d-lg-flex gap-2" href="#">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-sliders text-dark" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="fw-semibold text-dark">Filtrer </span>
                            </a>
                            <a class="text-inherit d-lg-none d-flex flex-row gap-2" data-bs-toggle="offcanvas"
                                href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-sliders text-dark" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="fw-semibold text-dark">Filters</span>
                            </a>
                        </div>
                        <div>
                            <button id="clearButton" style="display: none" class="btn btn-light border btn-sm">
                                <span>Clear</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16">
                                        </path>
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-start offcanvas-collapse" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header d-lg-none">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0 p-lg-0">
                            <div class="d-flex flex-column gap-3">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="">
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                data-bs-toggle="collapse" href="#coursTopic" role="button"
                                                aria-expanded="false" aria-controls="coursTopic">
                                                <div>Catégories</div>
                                                <!-- Chevron -->
                                                <span class="chevron-arrow ms-4">
                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                </span>
                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show" id="coursTopic"
                                                data-bs-parent="#courseAccordion">
                                                <div class="d-flex flex-column">
                                                    <ul class="list-unstyled mb-1 d-flex flex-column gap-1 mt-3">

                                                        <template x-for="category in categories" :key="category . id">
                                                            <li class="d-flex flex-row gap-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" :value="category . id"
                                                                    x-model="selectedCategories" :id="'category-' + category . id"
                                                                    @change="filterProducts()">
                                                                    <label class="form-check-label ps-1" :for="'category-' + category . id"
                                                                    x-text="category.name">
                                                                </label>
                                                                </div>
                                                            </li>
                                                        </template>
                                                    </ul>
                                                    {{-- <div class="collapse" id="collapseContent">
                                                        <ul class="list-unstyled mb-0 d-flex flex-column gap-1">
                                                            <li class="d-flex flex-row gap-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input filter-checkbox"
                                                                        type="checkbox" name="flexJavascript1"
                                                                        id="flexJavascript1">
                                                                    <label class="form-check-label text-secondary"
                                                                        for="flexJavascript1">Javascript</label>
                                                                </div>
                                                            </li>
                                                            <li class="d-flex flex-row gap-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input filter-checkbox"
                                                                        type="checkbox" name="flexSCSS" id="flexSCSS">
                                                                    <label class="form-check-label text-secondary"
                                                                        for="flexSCSS">SCSS</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div> --}}
                                                    <div class="mt-3">
                                                        <a class="btn-collapse fw-semibold" id="toggleButton"
                                                            data-bs-toggle="collapse" href="#collapseContent"
                                                            aria-expanded="false" aria-controls="collapseContent">
                                                            Consuler plus
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" fill="currentColor"
                                                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body p-3">
                                        <div>
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                data-bs-toggle="collapse" href="#coursPrice" role="button"
                                                aria-expanded="false" aria-controls="coursPrice">
                                                <div>Taille Disponible</div>
                                                <!-- Chevron -->
                                                <span class="chevron-arrow ms-4">
                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                </span>
                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show" id="coursPrice"
                                                data-bs-parent="#courseAccordion">
                                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">
                                                    <template x-for="size in sizes" :key="size . id">
                                                        <li class="d-flex flex-row gap-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" :value="size . id"
                                                                x-model="selectedSizes" :id="'size-' + size . id"
                                                                @change="filterProducts()">
                                                                    <label class="form-check-label ps-1" :for="'size-' + size . id"
                                                                    x-text="size.name"></label>
                                                            </div>
                                                        </li>
                                                    </template>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div>
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                data-bs-toggle="collapse" href="#coursSkill" role="button"
                                                aria-expanded="false" aria-controls="coursSkill">
                                                <div>Couleurs Disponibles</div>
                                                <!-- Chevron -->
                                                <span class="chevron-arrow ms-4">
                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                </span>
                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show" id="coursSkill"
                                                data-bs-parent="#courseAccordion">
                                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">

                                                    <template x-for="color in colors" :key="color . id">
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" :value="color . id"
                                                            x-model="selectedColors" :id="'color-' + color . id"
                                                            @change="filterProducts()">
                                                            <label class="form-check-label ps-1" :for="'color-' + color . id"
                                            x-text="color.name"></label>
                                                        </div>
                                                    </li>
                                                </template>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div>
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                data-bs-toggle="collapse" href="#coursLanguage" role="button"
                                                aria-expanded="false" aria-controls="coursLanguage">
                                                <div>Language</div>
                                                <!-- Chevron -->
                                                <span class="chevron-arrow ms-4">
                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                </span>
                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show" id="coursLanguage"
                                                data-bs-parent="#courseAccordion">
                                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckEnglish">
                                                            <label class="form-check-label" for="flexCheckEnglish">
                                                                English
                                                                <span class="text-secondary">(13,245)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckPortuguês">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckPortuguês">
                                                                Português
                                                                <span class="text-secondary">(13,245)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckHindi">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckHindi">
                                                                Hindi
                                                                <span class="text-secondary">(13,245)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckFrançais">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckFrançais">
                                                                Français
                                                                <span class="text-secondary">(13,245)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div>
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                data-bs-toggle="collapse" href="#coursRating" role="button"
                                                aria-expanded="false" aria-controls="coursRating">
                                                <div>Rating</div>
                                                <!-- Chevron -->
                                                <span class="chevron-arrow ms-4">
                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                </span>
                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show" id="coursRating"
                                                data-bs-parent="#courseAccordion">
                                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check d-flex align-items-center gap-2">
                                                            <input class="form-check-input filter-checkbox" type="radio"
                                                                name="flexRatting1" id="flexRatting1">
                                                            <label
                                                                class="form-check-label d-flex align-text-bottom lh-1 gap-2"
                                                                for="flexRatting1">
                                                                <div class="lh-1">
                                                                    <span class="align-text-top">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    4.5 &amp; up
                                                                    <span class="text-secondary">(13,245)</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check d-flex align-items-center gap-2">
                                                            <input class="form-check-input filter-checkbox" type="radio"
                                                                name="flexRatting1" id="flexRatting2">
                                                            <label
                                                                class="form-check-label d-flex align-text-bottom lh-1 gap-2"
                                                                for="flexRatting2">
                                                                <div class="d-flex flex-row align-items-center gap-2">
                                                                    <span class="">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    4.0 &amp; up
                                                                    <span class="text-secondary">(3,245)</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check d-flex align-items-center gap-2">
                                                            <input class="form-check-input filter-checkbox" type="radio"
                                                                name="flexRatting1" id="flexRatting3">
                                                            <label
                                                                class="form-check-label d-flex align-text-bottom lh-1 gap-2"
                                                                for="flexRatting3">
                                                                <div class="d-flex flex-row align-items-center gap-2">
                                                                    <span class="">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-half text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-half text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    3.5 &amp; up
                                                                    <span class="text-secondary">(2,120)</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check d-flex align-items-center gap-2">
                                                            <input class="form-check-input filter-checkbox" type="radio"
                                                                name="flexRatting1" id="flexRatting4">
                                                            <label
                                                                class="form-check-label d-flex align-text-bottom lh-1 gap-2"
                                                                for="flexRatting4">
                                                                <div class="d-flex flex-row align-items-center gap-2">
                                                                    <span class="">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star-fill text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12" fill="currentColor"
                                                                            class="bi bi-star text-warning"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    3.0 &amp; up
                                                                    <span class="text-secondary">(2,245)</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div>
                                            <!-- Toggle -->
                                            <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                                data-bs-toggle="collapse" href="#coursVideo" role="button"
                                                aria-expanded="false" aria-controls="coursVideo">
                                                <div>Video Duration</div>
                                                <!-- Chevron -->
                                                <span class="chevron-arrow ms-4">
                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                </span>
                                            </a>
                                            <!-- Row -->
                                            <!-- Collapse -->
                                            <div class="collapse show" id="coursVideo"
                                                data-bs-parent="#courseAccordion">
                                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 mt-3">
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckVideo1">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckVideo1">
                                                                0 - 1 Hour
                                                                <span class="text-secondary">(45)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckVideo2">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckVideo2">
                                                                1 - 3 Hour
                                                                <span class="text-secondary">(12)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckVideo3">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckVideo3">
                                                                3 - 6 Hour
                                                                <span class="text-secondary">(342)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex flex-row gap-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input filter-checkbox"
                                                                type="checkbox" value="" id="flexCheckVideo4">
                                                            <label class="form-check-label d-flex flex-row gap-2"
                                                                for="flexCheckVideo4">
                                                                6-17
                                                                <span class="text-secondary">(8)</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Affichage des produits -->
            <div class="col-lg-9 col-sm-12">
                <div class="d-flex flex-row align-items-center justify-content-between">
                    <span class="fw-semibold text-dark">Tous les produits</span>

                  </div>

                <!-- Affichage des produits filtrés -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-5 mt-2">
                    <template x-for="product in filteredProducts" :key="product . id">
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm border-light h-100">
                                <div class="image-container" style="overflow: hidden; position: relative;">
                                    <img :src="product . images . length ? `/s3/${product . images[0] . imagename}` : '../../assets/images/default-product.jpg'" alt="Product Image"
                                        class="card-img-top img-fluid rounded-top"
                                        style="max-height: 200px; width: 100%; object-fit: contain;">
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a :href="`{{ route('product.show', '') }}/${product . id}`"
                                            class="text-inherit" x-text="product.name"></a>
                                    </h5>
                                    <p class="card-text text-muted"
                                        x-text="product.minimale_description.length > 50 ? product.minimale_description.substring(0, 50) + '...' : product.description">
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <h6 class="text-warning mb-0" x-text="product.price_vente"></h6>
                                        <a :href="`{{ route('buy.product', '') }}/${product . id}`"
                                            class="btn btn-danger btn-sm">
                                            <i class="fe fe-shopping-cart fs-3"></i> Acheter
                                        </a>
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
@endsection

@push('script')
    <script>
        function productManager() {
            return {
                searchQuery: '',  // Recherche par mot-clé
                selectedCategories: [],  // Catégories sélectionnées
                selectedSizes: [],  // Tailles sélectionnées
                selectedColors: [],  // Couleurs sélectionnées
                categories: @json($categories),  // Catégories récupérées depuis Laravel
                sizes: @json($sizes),  // Tailles récupérées depuis Laravel
                colors: @json($colors),  // Couleurs récupérées depuis Laravel
                products: @json($listeproduct),  // Produits récupérés depuis Laravel
                filteredProducts: [],  // Liste des produits filtrés
                isLoading: false,  // Indicateur de chargement
                priceRange: [0, 1000],  // Plage de prix par défaut (modifiée par l'utilisateur)
                maxPrice: 1000,  // Prix maximum disponible

                init() {
                    this.filteredProducts = this.products;  // Affiche tous les produits par défaut
                    this.isLoading = false;  // Le chargement est terminé
                },

                // Filtre les produits en fonction des catégories, tailles, couleurs et prix
                filterProducts() {
                    console.log('Selected Categories:', this.selectedCategories);
                    console.log('Selected Sizes:', this.selectedSizes);
                    console.log('Selected Colors:', this.selectedColors);
                    console.log('Price Range:', this.priceRange);

                    this.filteredProducts = this.products.filter(product => {
                        // Filtrer par catégorie
                        const categoryMatch = this.selectedCategories.length === 0 || this.selectedCategories.map(String).includes(String(product.category_id));

                        // Filtrer par taille
                        const sizeMatch = this.selectedSizes.length === 0 || product.sizes.some(size => this.selectedSizes.map(String).includes(String(size.id)));

                        // Filtrer par couleur
                        const colorMatch = this.selectedColors.length === 0 || product.colors.some(color => this.selectedColors.map(String).includes(String(color.id)));

                        // Filtrer par prix
                        const priceMatch = product.price_vente >= this.priceRange[0] && product.price_vente <= this.priceRange[1];

                        return categoryMatch && sizeMatch && colorMatch && priceMatch;  // Le produit doit correspondre à tous les filtres
                    });

                    console.log('Filtered Products:', this.filteredProducts);  // Affiche les produits filtrés
                },

                // Réinitialiser les filtres (catégories, tailles, couleurs et prix)
                resetFilter() {
                    this.selectedCategories = [];
                    this.selectedSizes = [];
                    this.selectedColors = [];
                    this.priceRange = [0, this.maxPrice];  // Réinitialiser les prix
                    this.filterProducts();  // Appliquer les filtres après réinitialisation
                },
            };
        }
    </script>
@endpush
