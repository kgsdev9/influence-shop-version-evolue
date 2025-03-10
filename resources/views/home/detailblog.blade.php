@extends('layout')
@section('title', $detailblog->title)
@section('content')
    <main>
        <section class="container p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex flex-column flex-lg-row gap-2 align-items-lg-center justify-content-between mb-2">
                        <div>
                            <h1 class="mb-0 h2 fw-bold">{{ $detailblog->title }} </h1>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-xl-6 col-12">
                    <div class="d-flex flex-column gap-4">

                        <div class="card">
                            <!-- card body  -->
                            <div class="card-body py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar4 text-primary" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5
                                                          0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0
                                                          1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1
                                                          2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0
                                                          0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1
                                                          1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"></path>
                                        </svg>
                                        <div class="">
                                            <h5 class="mb-0 text-body">Date début </h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">{{ $detailblog->date_event_debut }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card body  -->
                            <div class="card-body border-top py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar4 text-primary" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1
                                                            .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0
                                                            1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0
                                                            1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1
                                                            .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0
                                                            0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1
                                                            1 0 0 0 1-1V5z"></path>
                                        </svg>
                                        <div class="">
                                            <h5 class="mb-0 text-body">Pays</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">{{ $detailblog->country->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card body  -->
                            <div class="card-body border-top py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-clock text-primary"
                                            viewBox="0 0 16
                        16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5
                                                              0 0 0 .252.434l3.5 2a.5.5 0 0 0
                                                              .496-.868L8 8.71V3.5z"></path>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0
                                                                0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7
                                                                0 0 1 14 0z"></path>
                                        </svg>
                                        <div class="">
                                            <h5 class="mb-0 text-body">Durée de l'evenement</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">{{ $detailblog->temps_lecture }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card body  -->
                            <div class="card-body border-top py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-currency-dollar text-primary"
                                            viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667
                                                                  1.513 2.85 3.591
                                                                  3.003V15h1.043v-1.216c2.27-.179
                                                                  3.678-1.438 3.678-3.3
                                                                  0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11
                                                                  1.879.714 2.07
                                                                  1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27
                                                                  1.472-3.27 3.156 0 1.454.966
                                                                  2.483 2.661
                                                                  2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616
                                                                  0-.944.704-1.641
                                                                  1.8-1.828v3.495l-.2-.05zm1.591
                                                                  1.872c1.287.323 1.852.859
                                                                  1.852 1.769 0 1.097-.826
                                                                  1.828-2.2
                                                                  1.939V8.73l.348.086z"></path>
                                        </svg>
                                        <div class="">
                                            <h5 class="mb-0 text-body">Prix</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">{{ $detailblog->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-currency-dollar text-primary"
                                            viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667
                                                                  1.513 2.85 3.591
                                                                  3.003V15h1.043v-1.216c2.27-.179
                                                                  3.678-1.438 3.678-3.3
                                                                  0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11
                                                                  1.879.714 2.07
                                                                  1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27
                                                                  1.472-3.27 3.156 0 1.454.966
                                                                  2.483 2.661
                                                                  2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616
                                                                  0-.944.704-1.641
                                                                  1.8-1.828v3.495l-.2-.05zm1.591
                                                                  1.872c1.287.323 1.852.859
                                                                  1.852 1.769 0 1.097-.826
                                                                  1.828-2.2
                                                                  1.939V8.73l.348.086z"></path>
                                        </svg>
                                        <div class="">
                                            <h5 class="mb-0 text-body">Organisateur</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">{{ $detailblog->organisateur }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-currency-dollar text-primary"
                                            viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667
                                                                  1.513 2.85 3.591
                                                                  3.003V15h1.043v-1.216c2.27-.179
                                                                  3.678-1.438 3.678-3.3
                                                                  0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11
                                                                  1.879.714 2.07
                                                                  1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27
                                                                  1.472-3.27 3.156 0 1.454.966
                                                                  2.483 2.661
                                                                  2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616
                                                                  0-.944.704-1.641
                                                                  1.8-1.828v3.495l-.2-.05zm1.591
                                                                  1.872c1.287.323 1.852.859
                                                                  1.852 1.769 0 1.097-.826
                                                                  1.828-2.2
                                                                  1.939V8.73l.348.086z"></path>
                                        </svg>
                                        <div class="">
                                            <h5 class="mb-0 text-body">Lieu</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">{{ $detailblog->lieu }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card  -->

                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <!-- card  -->
                    <div class="card">
                        <!-- card body  -->
                        <div class="card-body d-flex flex-column gap-4">
                            <div class="d-flex flex-column gap-2">
                                <h4 class="mb-0">Project Descriptionssss</h4>
                                <p class="mb-0">
                                    {!! $detailblog->description !!}
                                </p>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
