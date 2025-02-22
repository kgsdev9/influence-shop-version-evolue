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
                                        <h4 class="mb-0">
                                            @if ($commande->status === 'pending')
                                                Commande en cours
                                            @elseif ($commande->status === 'succes')
                                                Reçu de paiement

                                                <a href="{{ route('print.orders', $commande->id) }}"
                                                    class="btn btn-primary">Imprimer</a>
                                            @else
                                                Échec
                                            @endif
                                        </h4>
                                </div>
                            </div>
                            <!-- Row -->
                            <div class="row">

                                <div class="col-md-4 col-12">
                                    <span class="fs-6">Client </span>
                                    <h5 class="mb-3">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h5>

                                </div>

                                <div class="col-md-2 col-12">
                                    <span class="fs-6">Télephone </span>
                                    <h5 class="mb-3">{{ $commande->paymentAddress->telephone }}</h5>

                                </div>

                                <div class="col-md-3 col-12">
                                    <span class="fs-6">Email </span>
                                    <h5 class="mb-3">{{ $commande->paymentAddress->email }}</h5>

                                </div>

                                <div class="col-md-3 col-12">
                                    <span class="fs-6">Ville </span>
                                    <h5 class="mb-3">{{ $commande->paymentAddress->city }}</h5>

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
                                    <h6 class="mb-0">{{ $commande->paymentAddress->adresse }}</h6>
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
                                            <th>Poids Commandé</th>
                                            <th>Monant TTC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commande->items as $item)
                                            <tr class="text-dark">
                                                <td>
                                                    {{ $item->product }}
                                                </td>
                                                <td>
                                                    {{ $item->qunatite }}
                                                </td>
                                                <td> {{ $item->prixunitaire }} KG </td>
                                                <td> {{ $item->montantpoidsarticle }} € </td>
                                                <td>{{ $item->montanttc }} € </td>
                                            </tr>
                                        @endforeach

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
