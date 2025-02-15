<div class="col-xxl-3 col-lg-4 col-12">
    <div class="d-flex flex-column">
        <div class="d-flex flex-row align-items-center justify-content-between mt-2 mb-3">
            <div class="d-flex flex-row gap-2 align-items-center">
                <a class="text-inherit d-none d-lg-flex gap-2" href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-sliders text-dark" viewBox="0 0 16 16">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-sliders text-dark" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z">
                            </path>
                        </svg>
                    </span>
                    <span class="fw-semibold text-dark">Filtrer par </span>
                </a>
            </div>
            <div>
                <button id="clearButton" style="display: none" class="btn btn-light border btn-sm">
                    <span>Rénitialiser</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
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

                                            <template x-for="category in categories" :key="category.id">
                                                <li class="d-flex flex-row gap-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            :value="category.id"
                                                            x-model="selectedCategories"
                                                            :id="'category-' + category.id"
                                                            @change="filterProducts()">
                                                        <label class="form-check-label ps-1"
                                                            :for="'category-' + category.id"
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
                                        <template x-for="size in sizes" :key="size.id">
                                            <li class="d-flex flex-row gap-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        :value="size.id" x-model="selectedSizes"
                                                        :id="'size-' + size.id" @change="filterProducts()">
                                                    <label class="form-check-label ps-1"
                                                        :for="'size-' + size.id"
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

                                        <template x-for="color in colors" :key="color.id">
                                            <li class="d-flex flex-row gap-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        :value="color.id" x-model="selectedColors"
                                                        :id="'color-' + color.id"
                                                        @change="filterProducts()">
                                                    <label class="form-check-label ps-1"
                                                        :for="'color-' + color.id"
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
                                    <div>Filtre par prix</div>
                                    <!-- Chevron -->
                                    <span class="chevron-arrow ms-4">
                                        <i class="fe fe-chevron-down fs-4"></i>
                                    </span>
                                </a>
                                <!-- Row -->
                                <!-- Collapse -->
                                <div class="collapse show" id="coursLanguage"
                                    data-bs-parent="#courseAccordion">
                                    <div class="form-check my-1">
                                        <label for="priceMin" class="form-label">Prix Min (€)</label>
                                        <input type="number" id="priceMin" class="form-control"
                                            x-model="priceRange[0]" :min="0"
                                            :max="maxPrice" placeholder="Prix minimum"
                                            @input="filterProducts()">
                                    </div>
                                    <div class="form-check my-1">
                                        <label for="priceMax" class="form-label">Prix Max (€)</label>
                                        <input type="number" id="priceMax" class="form-control"
                                            x-model="priceRange[1]" :min="0"
                                            :max="maxPrice" placeholder="Prix maximum"
                                            @input="filterProducts()">
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span x-text="priceRange[0] + ' €'"></span>
                                        <span x-text="priceRange[1] + ' €'"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
