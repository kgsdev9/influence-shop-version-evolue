<div class="col-lg-3 col-md-4 col-12">
    <!-- Side navbar -->
    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fe fe-menu"></span>
        </button>
        <!-- Collapse navbar -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">
                @can('is_candidat')


                <span class="navbar-header">Menu</span>
                <ul class="list-unstyled ms-n2 mb-4">
                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('dashboard.users') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.users') }}">
                            <i class="fe fe-calendar nav-icon"></i>

                            Accueil
                        </a>
                    </li>


                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('experience.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('experience.index') }}">
                            <i class="fe fe-star nav-icon"></i>

                            Mes experiences
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('formation.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('formation.index') }}">
                            <i class="fe fe-slack nav-icon"></i>

                            Mon Formations
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('competence.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('competence.index') }}">
                            <i class="fe fe-check-circle nav-icon"></i>
                            Mon Competences
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('projet.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('projet.index') }}">
                            <i class="fe fe-folder nav-icon"></i>

                            Mon Projets
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item ">
                        <a class="nav-link disabled" href="">
                            <i class="fe fe-clipboard nav-icon"></i>
                            Mes Factures
                        </a>
                    </li>
                </ul>
                <!-- Navbar header -->
                <span class="navbar-header">Parametre de compte</span>
                <ul class="list-unstyled ms-n2 mb-0">
                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('profile.index') }}">
                            <i class="fe fe-settings nav-icon"></i>
                            Edition Profile
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('comptesocial.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('comptesocial.index') }}">
                            <i class="fe fe-refresh-cw nav-icon"></i>
                            Profile Social
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn disabled" type="button" disabled>
                            <i class="fe fe-trash nav-icon"></i>
                            Supprimer mon compte
                        </button>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fe fe-power nav-icon"></i>
                            Déconnexion
                        </a>
                    </li>

                </ul>
                @endcan
                @can('is_admin')
                <span class="navbar-header">Espace Administration</span>
                <ul class="list-unstyled ms-n2 mb-0">
                    <!-- Nav item -->
                    <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('profile.index') }}">
                            <i class="fe fe-settings nav-icon"></i>
                            Administration
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('gestion.specialies') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('gestion.specialies') }}">
                            <i class="fe fe-list nav-icon"></i>
                            Liste des specialites
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('gestion.listcandidat') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('gestion.listcandidat') }}">
                            <i class="fe fe-user nav-icon"></i>
                            Liste des candidats
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('users.management') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.management') }}">
                            <i class="fe fe-user-plus nav-icon"></i>

                            Liste des users
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('gestion.job') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('gestion.job') }}">
                            <i class="fe fe-briefcase nav-icon"></i>

                            Liste des jobs
                        </a>
                    </li>



                    @can('is_encours')


                    <li class="nav-item {{ request()->routeIs('comptesocial.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('comptesocial.index') }}">
                            <i class="fe fe-file-text nav-icon"></i>

                            Liste des cvs
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('comptesocial.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('comptesocial.index') }}">
                            <i class="fe fe-share-2 nav-icon"></i>
                            Liste des articles
                        </a>
                    </li>


                    <li class="nav-item {{ request()->routeIs('comptesocial.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('comptesocial.index') }}">
                            <i class="fe fe-edit nav-icon"></i>
                            Liste des astuces
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fe fe-power nav-icon"></i>
                            Déconnexion
                        </a>
                    </li>

                </ul>

                @endcan
            </div>
        </div>
    </nav>
</div>
