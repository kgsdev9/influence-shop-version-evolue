@extends('layout.layout')

@section('title' , 'Lidte des commandes')

@section('content')

<main>
    <section class="pt-5 pb-5">
        <div class="container">


            <div class="row mt-0 mt-md-4">
                @include('profiledashboard.nav-bar')
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="col-lg-12 col-md-12 col-12">
						<!-- Card -->
						<div class="card mb-12">
							<!-- Card header -->
							<div class="card-header border-bottom-0">
								<h3 class="mb-0">Liste des commandes </h3>
								<p class="mb-0">Liste de vos commandes.</p>
							</div>
							<!-- Table -->
							<div class="table-invoice table-responsive">
								<table class="table mb-0 text-nowrap table-centered table-hover">
									<thead class="table-light">
										<tr>
											<th scope="col">N°Commande</th>
											<th scope="col">Nom & Prénom</th>
											<th scope="col">Montant</th>
                                            <th scope="col">Formation</th>
											<th scope="col">STATUS</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>

                                        @foreach ($commande as $value)
										<tr>
											<td><a href="#">{{$value->codeCommande}}</a></td>
											<td>{{$value->fullname}}</td>
											<td>{{$value->amount}} € - {{$value->amount * 650}}FCFA </td>
                                            <td>
                                                @if ($value->status == "en atttente")
                                                <span class="badge bg-warning">En cours</span>
                                                @elseif($value->status == "echec")
                                                <span class="badge bg-danger">Echec</span>

                                                @elseif($value->status == "effectue")
                                                <span class="badge bg-success">Validée</span>
                                                @endif
                                            </td>
											<td>
												<a href="{{route('orders.detail', $value->id)}}" class="fe fe-eye"></a>
											</td>
										</tr>
                                        @endforeach


									</tbody>
								</table>
							</div>
						</div>
					</div>



                </div>
            </div>
        </div>
    </section>
</main>


@endsection
