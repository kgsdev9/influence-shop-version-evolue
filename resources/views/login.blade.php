<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Abonnement</title>
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link href="assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;

        }


    </style>
</head>

<body class="bg-white">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-0">
    <a class="navbar-brand text-dark" href="#">
        INFLUENCE SHOP
    </a>
    <div class="order-lg-3 d-flex align-items-center">
      <div>
        <div class="d-flex align-items-center">
          <div class="dropdown me-2">
            <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
              <i class="bi theme-icon-active"><i class="bi theme-icon bi-sun-fill"></i></i>
              <span class="visually-hidden bs-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                  <i class="bi theme-icon bi-sun-fill"></i>
                  <span class="ms-2">Light</span>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                  <i class="bi theme-icon bi-moon-stars-fill"></i>
                  <span class="ms-2">Dark</span>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                  <i class="bi theme-icon bi-circle-half"></i>
                  <span class="ms-2">Auto</span>
                </button>
              </li>
            </ul>
          </div>
          <a href="#" class="btn btn-outline-primary shadow-sm me-2 d-none d-md-block">Sign In</a>
          <a href="#" class="btn btn-primary d-none d-md-block me-2 me-lg-0">Sign Up</a>
        </div>
      </div>

      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar top-bar mt-0"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
      </button>
    </div>


    <div class="collapse navbar-collapse" id="navbar-default">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarBrowse" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">Browse</a>
          <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarBrowse">
          </ul>
        </li>
      </ul>
      <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
        <span class="position-absolute ps-3 search-icon">
          <i class="fe fe-search"></i>
        </span>
        <label for="search" class="visually-hidden"></label>
        <input type="search" id="search" class="form-control ps-6" placeholder="Search Courses">
      </form>
    </div>
  </div>
</nav>

    <div class="container mt-5">
        <div class="row align-items-center">
            <!-- Colonne gauche : Image + texte -->
            <div class="col-md-6 text-center text-md-start">
                <img src="https://via.placeholder.com/500x300" alt="Inscription Influenceur" class="img-fluid mb-4">
                <h2>Rejoignez notre plateforme</h2>
                <p>
                    En tant qu'influenceur, vous pouvez transformer votre audience en revenu.
                    Inscrivez-vous dès aujourd'hui pour collaborer avec des marques, promouvoir des produits,
                    et maximiser votre impact tout en gagnant de l'argent.
                </p>
            </div>

            <!-- Colonne droite : Formulaire -->
            <div class="col-md-6">
                <h3 class="text-center mb-4">Inscription Influenceur</h3>
                <form action="/submit" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"
                            required>
                        <label for="nom">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"
                            required>
                        <label for="prenom">Prénom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
                        <label for="adresse">Adresse</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="tiktok" name="tiktok"
                            placeholder="Nombre d'abonnés TikTok">
                        <label for="tiktok">Abonnés TikTok</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="facebook" name="facebook"
                            placeholder="Nombre d'abonnés Facebook">
                        <label for="facebook">Abonnés Facebook</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="instagram" name="instagram"
                            placeholder="Nombre d'abonnés Instagram">
                        <label for="instagram">Abonnés Instagram</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
