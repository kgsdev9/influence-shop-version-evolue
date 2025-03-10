@extends('layout')
@section('content')
    <main>
        <section class="container p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex flex-column flex-lg-row gap-2 align-items-lg-center justify-content-between mb-2">
                        <div>
                            <h1 class="mb-0 h2 fw-bold">Compagne publicitaire Fiche De Compagne</h1>
                        </div>
                        <div class="d-flex align-items-center">
                            <!-- avatar group  -->
                            <div class="avatar-group">
                                <!-- avatar -->
                                <span class="avatar avatar-md">
                                    <!-- img -->
                                    <img alt="avatar" src="../../assets/images/avatar/avatar-1.jpg"
                                        class="rounded-circle imgtooltip" data-template="one">
                                    <span id="one" class="d-none">
                                        <small class="fw-semibold">Paul Haney</small>
                                    </span>
                                </span>
                                <!-- avatar -->
                                <span class="avatar avatar-md">
                                    <!-- img -->
                                    <img alt="avatar" src="../../assets/images/avatar/avatar-2.jpg"
                                        class="rounded-circle imgtooltip" data-template="two">
                                    <span id="two" class="d-none">
                                        <small class="fw-semibold">Gali Linear</small>
                                    </span>
                                </span>
                                <!-- avatar -->
                                <span class="avatar avatar-md">
                                    <!-- img -->
                                    <img alt="avatar" src="../../assets/images/avatar/avatar-3.jpg"
                                        class="rounded-circle imgtooltip" data-template="three">
                                    <span id="three" class="d-none">
                                        <small class="fw-semibold">Mary Holler</small>
                                    </span>
                                </span>
                                <!-- avatar -->
                                <span class="avatar avatar-md">
                                    <!-- img -->
                                    <img alt="avatar" src="../../assets/images/avatar/avatar-4.jpg"
                                        class="rounded-circle imgtooltip" data-template="four">
                                    <span id="four" class="d-none">
                                        <small class="fw-semibold">Lio Nordal</small>
                                    </span>
                                </span>
                                <!-- avatar -->
                                <span class="avatar avatar-md">
                                    <span class="avatar-initials rounded-circle bg-light text-dark">5+</span>
                                </span>
                            </div>
                            <!-- icon  -->
                            <a href="#"
                                class="btn btn-icon btn-white border border-2 rounded-circle btn-dashed ms-2">+</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-xl-6 col-12">
                    <!-- card  -->
                    <div class="card">
                        <!-- card body  -->
                        <div class="card-body d-flex flex-column gap-4">
                            <div class="d-flex flex-column gap-2">
                                <h4 class="mb-0">Project Description</h4>
                                <p class="mb-0">
                                    Give a high-level overview of the product / project you're working on, its goals,
                                    etc..Elaborate on the target audience of your project/product, link out to additional
                                    resources
                                </p>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <h4 class="mb-0">Target Audience</h4>
                                <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                                    (injected humour and the like).</p>
                                <!-- list  -->
                                <ul class="list-unstyled">
                                    <li>- Nulla tincidunt metus nec commodo volutpat.</li>
                                    <li>- Aliquam erat volutpat.</li>
                                    <li>- Vestibulum ante ipsum primis in faucibus orci luctus.</li>
                                    <li>- Ultrices posuere cubilia curae.</li>
                                    <li>- UI luctus et erat vel efficitur.</li>
                                </ul>
                                <p class="mb-0">
                                    Vivamus vehicula eros id pharetra viverra. In ac ipsum lacus. Phasellus facilisis libero
                                    eu dolor placerat, sed porttitor augue efficitur. Vestibulum tincidunt augue tempus,
                                    venenatis sem id, ultricies justo. Aliquam erat volutpat.
                                </p>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <h4 class="mb-0">Competition</h4>
                                <p class="mb-0">List your competitors here and recommendations how to position your
                                    product against the competition &amp; handle objections</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="d-flex flex-column gap-4">
                        <!-- card  -->
                        <div class="card">
                            <!-- card body  -->
                            <div class="card-body py-3">
                                <h4 class="card-title">Assignee</h4>
                                <div class="d-flex align-items-center flex-row gap-3">
                                    <img src="../../assets/images/avatar/avatar-1.jpg" alt=""
                                        class="avatar-md avatar rounded-circle">
                                    <div class="">
                                        <h4 class="mb-0">
                                            Marvin McKinney
                                            <small>(Owner)</small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- card body  -->
                            <div class="card-body border-top py-3">
                                <h4 class="card-title">Team</h4>
                                <div class="d-flex align-items-center flex-row gap-2">
                                    <img src="../../assets/images/avatar/avatar-1.jpg" alt=""
                                        class="avatar-sm avatar rounded-circle imgtooltip" data-template="five">
                                    <span id="five" class="d-none">
                                        <span class="fw-semibold">Mary Holler</span>
                                    </span>
                                    <img src="../../assets/images/avatar/avatar-2.jpg" alt=""
                                        class="avatar-sm avatar rounded-circle imgtooltip" data-template="six">
                                    <span id="six" class="d-none">
                                        <span class="fw-semibold">Gali Linear</span>
                                    </span>
                                    <img src="../../assets/images/avatar/avatar-3.jpg" alt=""
                                        class="avatar-sm avatar rounded-circle imgtooltip" data-template="seven">
                                    <span id="seven" class="d-none">
                                        <span class="fw-semibold">Paul Honey</span>
                                    </span>
                                    <img src="../../assets/images/avatar/avatar-4.jpg" alt=""
                                        class="avatar-sm avatar rounded-circle imgtooltip" data-template="eight">
                                    <span id="eight" class="d-none">
                                        <span class="fw-semibold">Lio Nardar</span>
                                    </span>
                                    <img src="../../assets/images/avatar/avatar-5.jpg" alt=""
                                        class="avatar-sm avatar rounded-circle imgtooltip" data-template="nine">
                                    <span id="nine" class="d-none">
                                        <span class="fw-semibold">Jamie Lova</span>
                                    </span>
                                    <img src="../../assets/images/avatar/avatar-6.jpg" alt=""
                                        class="avatar-sm avatar rounded-circle imgtooltip" data-template="ten">
                                    <span id="ten" class="d-none">
                                        <span class="fw-semibold">Mary Holler</span>
                                    </span>
                                    <a href="#"
                                        class="btn btn-icon btn-white border border-2 rounded-circle btn-dashed">+</a>
                                </div>
                            </div>
                        </div>
                        <!-- card  -->
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
                                            <h5 class="mb-0 text-body">Start Date</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">01 Jan, 2021</p>
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
                                            <h5 class="mb-0 text-body">End Date</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">30 Dec, 2021</p>
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
                                            <h5 class="mb-0 text-body">Estimate Time</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">30 Days</p>
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
                                            <h5 class="mb-0 text-body">Cost</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-dark mb-0 fw-semibold">$18,000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card  -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Progress</h4>
                                <!-- progress bar -->
                                <div class="progress progress-tooltip" style="height: 6px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="50">
                                        <span>50%</span>
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
