@extends('layout.layout')
@section('title', 'Mon profile')
@section('content')

<main>
    <section class="pt-5 pb-5">
      <div class="container">

     @include('profiledashboard.base.header')

        <!-- Content -->

        <div class="row mt-0 mt-md-4">
            @include('profiledashboard.nav-bar')
          <div class="col-lg-9 col-md-8 col-12">
            @can('is_candidat')
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                  <!-- Card -->
                  <div class="card mb-4">
                    <div class="p-4">
                      <span class="fs-6 text-uppercase fw-semibold">Visite du profil </span>
                      <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">{{$visiteur}}</h2>
                      <span class="d-flex justify-content-between align-items-center">
                        <span>Visible de votre profile</span>
                        <span class="badge bg-success ms-2">{{$visiteur}}</span>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12">
                  <!-- Card -->
                  <div class="card mb-4">
                    <div class="p-4">
                      <span class="fs-6 text-uppercase fw-semibold">Offre Disponible</span>
                      <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">0</h2>
                      <span class="d-flex justify-content-between align-items-center">
                        <span>Offre d'emploi disponible</span>
                        <span class="badge bg-info ms-2">0</span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                  <!-- Card -->
                  <div class="card mb-4">
                    <div class="p-4">
                      <span class="fs-6 text-uppercase fw-semibold">Suivi Acompagnement</span>
                      <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">0</h2>
                      <span class="d-flex justify-content-between align-items-center">
                        <span>Acompangnement suivi</span>
                        <span class="badge bg-warning ms-2">0+</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            @endcan

            <!-- Card -->

            @can('is_admin')
                <h1>Bienvenue chers administrateur</h1>
            @endcan

          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
