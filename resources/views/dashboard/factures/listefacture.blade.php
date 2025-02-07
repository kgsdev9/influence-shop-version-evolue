@extends('layout')
@section('title', 'Liste des souscriptions')
@section('content')
    <main x-data="subscriptionSearch()" x-init="init()">
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
                                        <h3 class="mb-0">Liste des factures</h3>
                                        <span>Gestion des factures</span>
                                    </div>
                                </div>

                                <div class="p-4 row">
                                    <!-- Form -->
                                    <form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
                                        <span class="position-absolute ps-3 search-icon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="search" class="form-control ps-6" x-model="searchTerm"
                                            @input="filterSubscriptions">
                                    </form>
                                </div>

                                <div class="table-invoice table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Référence</th>
                                                <th scope="col">Utilisateur</th>
                                                <th scope="col">Abonnement</th>
                                                <th scope="col">Montant</th>
                                                <th scope="col">Début</th>
                                                <th scope="col">Fin</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="subscription in paginatedSubscriptions" :key="subscription.id">
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!-- Référence de souscription -->
                                                            <a :href="'/subscriptions/' + subscription.id"
                                                                class="text-inherit">
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="subscription.reference"></h5>
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="subscription.user.name"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="subscription.abonnement.libelle"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="subscription.abonnement.price"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="subscription.date_debut"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div>
                                                                <h5 class="mb-0 text-primary-hover"
                                                                    x-text="subscription.date_fin"></h5>
                                                            </div>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <template x-if="subscription.status === 'active'">
                                                            <div class="d-flex gap-3">
                                                                <button class="btn btn-outline-success">
                                                                    <i class="fe fe-check nav-icon"></i> Activer
                                                                </button>
                                                                <button @click="deleteSubscription(subscription.id)"
                                                                    class="btn btn-outline-danger">
                                                                    <i class="fe fe-trash-2 nav-icon"></i>
                                                                </button>
                                                            </div>
                                                        </template>
                                                        <template x-if="subscription.status === 'inactive'">
                                                            <div class="d-flex gap-2">
                                                                <button class="btn btn-dark"><i
                                                                        class="fe fe-printer nav-icon"></i> </button>
                                                                <button class="btn btn-warning"><i
                                                                        class="fe fe-refresh-cw nav-icon"></i>
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
        function subscriptionSearch() {
            return {
                searchTerm: '',
                subscriptions: @json($listefactures),
                filteredSubscriptions: [],
                currentPage: 1,
                subscriptionsPerPage: 10,
                totalPages: 0,

                get paginatedSubscriptions() {
                    let start = (this.currentPage - 1) * this.subscriptionsPerPage;
                    let end = start + this.subscriptionsPerPage;
                    return this.filteredSubscriptions.slice(start, end);
                },

                filterSubscriptions() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredSubscriptions = this.subscriptions.filter(subscription => {
                        return subscription.reference.toLowerCase().includes(term) ||
                            subscription.user.name.toLowerCase().includes(term) ||
                            subscription.abonnement.libelle.toLowerCase().includes(term);
                    });
                    this.totalPages = Math.ceil(this.filteredSubscriptions.length / this.subscriptionsPerPage);
                    this.currentPage = 1;
                },

                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                deleteSubscription(subscriptionId) {
                    // Logic to delete subscription
                },

                init() {
                    this.filterSubscriptions();
                }
            };
        }
    </script>
@endpush
