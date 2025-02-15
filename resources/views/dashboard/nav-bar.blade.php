<div class="col-lg-3 col-md-4 col-12">
    <!-- Side navbar -->
    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fe fe-menu"></span>
        </button>
        <!-- Collapse navbar -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">



                <span class="navbar-header">Menu</span>
                <ul class="list-unstyled ms-n2 mb-4">
                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('dashboards') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboards') }}">
                            <i class="fe fe-calendar nav-icon"></i>

                            Accueil
                        </a>
                    </li>


                    @php
                        $permissions = ['access-users', 'access-admin'];
                    @endphp

                    @foreach ($permissions as $permission)
                        @can($permission)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.index') }}">
                                    <i class="fe fe-file-text nav-icon"></i>
                                    Commandes
                                </a>
                            </li>
                        @break
                    @endcan
                @endforeach



                @can('access-entreprise')
                    <li class="nav-item {{ request()->routeIs('programme.affiliation') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('programme.affiliation') }}">
                            <i class="fe fe-file-text nav-icon"></i>
                            Sponsoring
                        </a>
                    </li>

                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('products.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="fe fe-slack nav-icon"></i>

                            Mon Produits
                        </a>

                    </li>


                    <li class="nav-item {{ request()->routeIs('facture.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('facture.index') }}">
                            <i class="fe fe-file-text nav-icon"></i>
                            Factures
                        </a>
                    </li>
                @endcan

                @can('access-admin')
                    <li class="nav-item {{ request()->routeIs('compagne.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('compagne.index') }}">
                            <i class="fe fe-volume nav-icon"></i>
                            Compagnes
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fe fe-users nav-icon"></i>

                            Utilisateurs
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('blogs.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blogs.index') }}">
                            <i class="fe fe-edit-3 nav-icon"></i>

                            Blogs
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('linkspayment.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('linkspayment.index') }}">
                            <i class="fe fe-credit-card nav-icon"></i>

                            Lien de paiement
                        </a>
                    </li>


                    <li class="nav-item {{ request()->routeIs('abonnement.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('abonnement.index') }}">
                            <i class="fe fe-rss nav-icon"></i>
                            Plan Abonnement
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('souscribers.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('souscribers.index') }}">
                            <i class="fe fe-user-plus nav-icon"></i>
                            Souscriveurs
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('category.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            <i class="fe fe-grid nav-icon"></i>

                            Catégories
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('countries.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('countries.index') }}">
                            <i class="fe fe-globe nav-icon"></i>

                            Pays
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('city.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city.index') }}">
                            <i class="fe fe-map-pin nav-icon"></i>

                            Ville
                        </a>
                    </li>
                </ul>
            @endcan
            <!-- Navbar header -->
            <span class="navbar-header">Parametre de compte</span>
            <ul class="list-unstyled ms-n2 mb-0">
                <!-- Nav item -->
                <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <i class="fe fe-settings nav-icon"></i>
                        Mon Profile
                    </a>
                </li>


                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe fe-power nav-icon"></i>
                        Déconnexion
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
</div>
