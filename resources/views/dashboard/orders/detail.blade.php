@extends('layout')
@section('title', 'Detail commande')
@section('content')

    <main>
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row mt-0 mt-md-4">
                    @include('dashboard.nav-bar')
                    <div class="col-lg-9 col-md-8 col-12">
                        <!-- Card -->
                        <div class="card border-0" id="invoice">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-6">
                                    <div>
                                        <h4 class="mb-0">Recu de paiement </h4>
                                    </div>
                                </div>
                                <!-- Row -->
                                <div class="row">

                                    <div class="col-md-4 col-12">
                                        <span class="fs-6">Client </span>
                                        <h5 class="mb-3">{{ $commande->adresse->telephone }}</h5>

                                    </div>

                                    <div class="col-md-2 col-12">
                                        <span class="fs-6">Télephone </span>
                                        <h5 class="mb-3">{{ $commande->adresse->telephone }}</h5>

                                    </div>

                                    <div class="col-md-3 col-12">
                                        <span class="fs-6">Email </span>
                                        <h5 class="mb-3">{{ $commande->adresse->email }}</h5>

                                    </div>

                                    <div class="col-md-3 col-12">
                                        <span class="fs-6">Ville </span>
                                        <h5 class="mb-3">{{ $commande->adresse->city }}</h5>

                                    </div>
                                </div>
                                <!-- Row -->
                                <div class="row mb-5">
                                    <div class="col-4">
                                        <span class="fs-6">Code commande</span>
                                        <h6 class="mb-0">{{ $commande->reference }}</h6>
                                    </div>
                                    <div class="col-4">
                                        <span class="fs-6">Date </span>
                                        <h6 class="mb-0">{{ $commande->created_at }}</h6>
                                    </div>

                                    <div class="col-4">
                                        <span class="fs-6">Adresse </span>
                                        <h6 class="mb-0">{{ $commande->adresse->adresse }}</h6>
                                    </div>

                                    <div class="col-4">
                                        <span class="fs-6">Pays de destination </span>
                                        <h6 class="mb-0">{{ $commande->deliverycontry->country_start }}</h6>
                                    </div>

                                    <div class="col-4">
                                        <span class="fs-6">Pays d'arrivée </span>
                                        <h6 class="mb-0">{{ $commande->deliverycontry->country_destination }}</h6>
                                    </div>

                                </div>
                                <!-- Table -->
                                <div class="table-responsive mb-8">
                                    <table class="table mb-0 text-nowrap table-borderless">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Désignation</th>
                                                <th>Quantite</th>
                                                <th>Prix</th>
                                                <th>Prix Livraison</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-dark">
                                                <td>
                                                    {{ $commande->product->name }}
                                                </td>
                                                <td> {{ $commande->qtecmde }}</td>
                                                <td> {{ $commande->product->price_vente }} € </td>
                                                <td> {{ $commande->cost_delivery }} € </td>
                                                <td>{{ $commande->montanttc }} € </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>


@endsection
