@extends('layout.layout')
@section('title' , 'Detail commande')
@section('content')

<main>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row mt-0 mt-md-4">
                @include('profiledashboard.nav-bar')
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
                                    <h5 class="mb-3">{{$commande->fullname}}</h5>

                                </div>
                            </div>
                            <!-- Row -->
                            <div class="row mb-5">
                                <div class="col-8">
                                    <span class="fs-6">Code commande</span>
                                    <h6 class="mb-0">{{$commande->codeCommande}}</h6>
                                </div>
                                <div class="col-4">
                                    <span class="fs-6">Date </span>
                                    <h6 class="mb-0">{{$commande->created_at}}</h6>
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
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-dark">
                                            <td>
                                                {{$commande->course->title}}

                                            </td>
                                            <td>1</td>
                                            <td>  {{$commande->amount}} € soit {{$commande->amount * 650}} FCFA </td>
                                            <td>{{$commande->amount}} € </td>
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
