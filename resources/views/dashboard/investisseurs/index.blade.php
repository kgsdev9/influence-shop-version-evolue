@extends('layout')
@section('title', 'Liste des investisseurs')
@section('content')
    <main x-data="investorList()">
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
                                        <h3 class="mb-0">Liste des investisseurs</h3>
                                        <span>Gestion des investisseurs.</span>
                                    </div>
                                </div>

                                <div class="p-4 row">
                                    <!-- Form de recherche -->
                                    <form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
                                        <span class="position-absolute ps-3 search-icon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="search" class="form-control ps-6" x-model="searchTerm"
                                            @input="filterInvestors">
                                    </form>
                                </div>

                                <!-- Tableau des investisseurs -->
                                <div class="table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Montant investi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="investor in filteredInvestors" :key="investor.id">
                                                <tr>
                                                    <td x-text="investor.nom"></td>
                                                    <td x-text="investor.email"></td>
                                                    <td x-text="investor.telephone"></td>
                                                    <td x-text="investor.adresse"></td>
                                                    <td x-text="investor.status"></td>
                                                    <td x-text="investor.montant_investi"></td>
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
                                                        @click="goToPage(currentPage - 1)">Précédent</button>
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
        function investorList() {
            return {
                searchTerm: '',
                investors: @json($listeInvestisseur), // Les investisseurs sont envoyés depuis le contrôleur
                filteredInvestors: [], // Liste filtrée des investisseurs
                currentPage: 1,
                investorsPerPage: 10,
                totalPages: 0,

                // Filtrer les investisseurs en fonction du terme de recherche
                filterInvestors() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredInvestors = this.investors.filter(investor => {
                        return investor.nom.toLowerCase().includes(term) ||
                            investor.email.toLowerCase().includes(term) ||
                            investor.telephone.toLowerCase().includes(term) ||
                            investor.adresse.toLowerCase().includes(term) ||
                            investor.status.toLowerCase().includes(term) ||
                            investor.montant_investi.toString().toLowerCase().includes(term);
                    });
                    this.totalPages = Math.ceil(this.filteredInvestors.length / this.investorsPerPage);
                    this.currentPage = 1;
                },

                // Paginer les investisseurs
                get paginatedInvestors() {
                    let start = (this.currentPage - 1) * this.investorsPerPage;
                    let end = start + this.investorsPerPage;
                    return this.filteredInvestors.slice(start, end);
                },

                // Aller à la page suivante/précédente
                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                init() {
                    this.filterInvestors();
                }
            };
        }
    </script>
@endpush
