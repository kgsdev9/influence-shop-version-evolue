@extends('layout.layout')

@section('content')

<main>
    <section class="pt-5 pb-5">
        <div class="container">


            <div class="row mt-0 mt-md-4">
                @include('profiledashboard.nav-bar')
                <div class="col-lg-9 col-md-12 col-12">
                    <br><br><br>
                    <div class="col-lg-12 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                        <!-- Card -->
                        <div class="card rounded-3">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0 p-0">
                                <div>
                                    <!-- Nav -->
                                    <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="table-tab" data-bs-toggle="pill" href="#table" role="tab" aria-controls="table" aria-selected="true">Contents</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false" tabindex="-1">Description</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review" aria-selected="false" tabindex="-1">Reviews</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="transcript-tab" data-bs-toggle="pill" href="#transcript" role="tab" aria-controls="transcript" aria-selected="false" tabindex="-1">Transcript</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq" role="tab" aria-controls="faq" aria-selected="false" tabindex="-1">FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade active show" id="table" role="tabpanel" aria-labelledby="table-tab">
                                        <!-- Card -->
                                        <div class="accordion" id="courseAccordion">
                                            <div>
                                                <!-- List group -->
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item px-0 pt-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none active collapsed" data-bs-toggle="collapse" href="#courseTwo" aria-expanded="false" aria-controls="courseTwo">
                                                            <div class="me-auto">
                                                                Introduction to JavaScript
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseTwo" data-bs-parent="#courseAccordion" style="">
                                                            <div class="pt-3 pb-2">
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 7s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Installing Development Software</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 11s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Hello World Project from GitHub</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 33s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Our Sample Website</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 15s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseThree" aria-expanded="false" aria-controls="courseThree">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                JavaScript Beginning
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseThree" data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 41s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Adding JavaScript Code to a Web
                                                                            Page</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 39s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span> Working with JavaScript Files </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>6m 18s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Formatting Code </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 18s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span> Detecting and Fixing Errors </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 14s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Case Sensitivity </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 48s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Commenting Code </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 24s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="course-resume.html" class="mb-0 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light icon-sm rounded-circle me-2"><i class="mdi mdi-play"></i></span>
                                                                        <span>Summary</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 14s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseFour" aria-expanded="false" aria-controls="courseFour">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Variables and Constants
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseFour" data-bs-parent="#courseAccordion" style="">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 19s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>What Is a Variable?</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 11s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Declaring Variables </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 30s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Using let to Declare Variables </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 28s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Naming Variables </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 14s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Common Errors Using Variables </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 30s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Changing Variable Values </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 4s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Constants </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 15s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>The var Keyword </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 20s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-0 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Summary</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 49s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseFive" aria-expanded="false" aria-controls="courseFive">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Types and Operators
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseFive" data-bs-parent="#courseAccordion" style="">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 55s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Numbers </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>6m 14s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Operator Precedence </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 58s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Number Precision</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 22s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Negative Numbers </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 35s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Strings </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 7s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Manipulating Strings </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>5m 8s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Converting Strings and Numbers </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 55s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-0 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Boolean Variables </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 39s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseSix" aria-expanded="false" aria-controls="courseSix">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Program Flow
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseSix" data-bs-parent="#courseAccordion" style="">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 52s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Clip Watched </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 27s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Conditionals Using if() </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 25s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Truthy and Falsy</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 30s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>if ... else </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 30s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Comparing === and == </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 52s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>The Ternary Operator </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 47s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Block Scope Using let </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 21s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Looping with for() </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>5m 30s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Looping with do ... while() </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 58s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-0 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Summary </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 21s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseSeven" aria-expanded="false" aria-controls="courseSeven">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Functions
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseSeven" data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 52s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Function Basics </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 46s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Function Expressions </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 32s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Passing Information to Functions</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 19s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Function Return Values </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 13s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Function Scope </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 20s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Using Functions to Modify Web Pages
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 42s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-0 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Summary </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 3s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseEight" aria-expanded="false" aria-controls="courseEight">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Objects and the DOM
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseEight" data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 48s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Object Properties </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 28s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Object Methods </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 3s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Passing Objects to Functions</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 27s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Standard Built-in Objects </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>6m 55s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>The Document Object Model (DOM)
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 29s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Styling DOM Elements </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 42s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Detecting Button Clicks </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 3s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Showing and Hiding DOM Elements
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 37s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Summary </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 47s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseNine" aria-expanded="false" aria-controls="courseNine">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Arrays
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseNine" data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 48s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Creating and Initializing Arrays
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 7s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Accessing Array Items </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 4s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Manipulating Arrays </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 3s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>slice() and splice() </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>5m 54s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Array Searching and Looping </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>7m 32s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Arrays in the DOM </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 11s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Summary </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 28s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseTen" aria-expanded="false" aria-controls="courseTen">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Scope and Hoisting
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseTen" data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Introduction</span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 20s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Global Scope </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>4m 7s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Clip Watched </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 14s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Function Scope </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>3m 45s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Var and Hoisting </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 21s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Undeclared Variables and Strict Mode
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>2m 16s</span>
                                                                    </div>
                                                                </a>
                                                                <a href="#" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick">
                                                                    <div class="text-truncate">
                                                                        <span class="icon-shape bg-light text-secondary icon-sm rounded-circle me-2"><i class="fe fe-lock"></i></span>
                                                                        <span>Summary </span>
                                                                    </div>
                                                                    <div class="text-truncate">
                                                                        <span>1m 33s</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- List group item -->
                                                    <li class="list-group-item px-0 pb-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none collapsed" data-bs-toggle="collapse" href="#courseEleven" aria-expanded="false" aria-controls="courseEleven">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                Summary
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse" id="courseEleven" data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Repudiandae esse velit eos
                                                                    sunt ab inventore est tenetur blanditiis?
                                                                    Voluptas eius molestiae ad itaque tempora
                                                                    nobis minima eveniet aperiam molestias,
                                                                    maiores natus expedita dolores ea non possimus
                                                                    magnam corrupt i quas rem unde quo enim porro
                                                                    culpa! Quaerat veritatis veniam corrupti
                                                                    iusto.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        <!-- Description -->
                                        <div class="mb-4">
                                            <h3 class="mb-2">Course Descriptions</h3>
                                            <p>
                                                If you’re learning to program for the first time, or if
                                                you’re coming from a different language, this course,
                                                JavaScript: Getting Started, will give you the basics
                                                for coding in JavaScript. First, you'll discover the
                                                types of applications that can be built with JavaScript,
                                                and the platforms they’ll run on.
                                            </p>
                                            <p>
                                                Next, you’ll explore the basics of the language, giving
                                                plenty of examples. Lastly, you’ll put your JavaScript
                                                knowledge to work and modify a modern, responsive web
                                                page. When you’re finished with this course, you’ll have
                                                the skills and knowledge in JavaScript to create simple
                                                programs, create simple web applications, and modify web
                                                pages.
                                            </p>
                                        </div>
                                        <h4 class="mb-3">What you’ll learn</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="d-flex mb-2">
                                                        <i class="mdi mdi-check-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Recognize the importance of understanding your
                                                            objectives when addressing an audience.</span>
                                                    </li>
                                                    <li class="d-flex mb-2">
                                                        <i class="mdi mdi-check-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Identify the fundaments of composing a successful
                                                            close.</span>
                                                    </li>
                                                    <li class="d-flex mb-2">
                                                        <i class="mdi mdi-check-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Explore how to connect with your audience through
                                                            crafting compelling stories.</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="d-flex mb-2">
                                                        <i class="mdi mdi-check-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Examine ways to connect with your audience by
                                                            personalizing your content.</span>
                                                    </li>
                                                    <li class="d-flex mb-2">
                                                        <i class="mdi mdi-check-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Break down the best ways to exude executive
                                                            presence.</span>
                                                    </li>
                                                    <li class="d-flex mb-2">
                                                        <i class="mdi mdi-check-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Explore how to communicate the unknown in an
                                                            impromptu communication.</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p>
                                            Maecenas viverra condimentum nulla molestie condimentum.
                                            Nunc ex libero, feugiat quis lectus vel, ornare euismod
                                            ligula. Aenean sit amet arcu nulla.
                                        </p>
                                        <p>
                                            Duis facilisis ex a urna blandit ultricies. Nullam
                                            sagittis ligula non eros semper, nec mattis odio
                                            ullamcorper. Phasellus feugiat sit amet leo eget
                                            consectetur.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <!-- Reviews -->
                                        <div class="mb-3">
                                            <h3 class="mb-4">How students rated this courses</h3>
                                            <div class="row align-items-center">
                                                <div class="col-auto text-center">
                                                    <h3 class="display-2 fw-bold">4.5</h3>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1-half text-warning"></i>
                                                    <p class="mb-0 fs-6">(Based on 27 reviews)</p>
                                                </div>
                                                <!-- Progress bar -->
                                                <div class="col pt-3 order-3 order-md-2">
                                                    <div class="progress mb-3" style="height: 6px">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-0" style="height: 6px">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-auto col-6 order-2 order-md-3">
                                                    <!-- Rating -->
                                                    <div>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <span class="ms-1">53%</span>
                                                    </div>
                                                    <div>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <span class="ms-1">36%</span>
                                                    </div>
                                                    <div>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <span class="ms-1">9%</span>
                                                    </div>
                                                    <div>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <span class="ms-1">3%</span>
                                                    </div>
                                                    <div>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                        <span class="ms-1">2%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hr -->
                                        <hr class="my-5">
                                        <div class="mb-3">
                                            <div class="d-md-flex align-items-center align-items-center justify-content-between mb-5">
                                                <!-- Reviews -->
                                                <div class="mb-3 mb-lg-0">
                                                    <h3 class="mb-0">Reviews</h3>
                                                </div>
                                                <div>
                                                    <!-- Form -->
                                                    <form class="form-inline">
                                                        <div class="d-flex align-items-center">
                                                            <span class="position-absolute ps-3">
                                                                <i class="fe fe-search"></i>
                                                            </span>
                                                            <input type="search" class="form-control ps-6" placeholder="Search Review">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex border-bottom pb-4 mb-4">
                                                <img src="../assets/images/avatar/avatar-2.jpg" alt="avatar" class="rounded-circle avatar-lg">
                                                <div class="ms-3">
                                                    <h4 class="mb-1">
                                                        Max Hawkins
                                                        <span class="ms-1 fs-6 text-muted">2 Days ago</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>
                                                        Lectures were at a really good pace and I never felt
                                                        lost. The instructor was well informed and allowed
                                                        me to learn and navigate Figma easily.
                                                    </p>
                                                    <div class="d-md-flex align-items-center ">
                                                        <p class="mb-2 mb-md-0">Was this review helpful?</p>
                                                        <a href="#" class="btn btn-xs btn-primary ms-md-3">Yes</a>
                                                        <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex border-bottom pb-4 mb-4">
                                                <img src="../assets/images/avatar/avatar-3.jpg" alt="avatar" class="rounded-circle avatar-lg">
                                                <div class="ms-3">
                                                    <h4 class="mb-1">
                                                        Arthur Williamson
                                                        <span class="ms-1 fs-6 text-muted">3 Days ago</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>
                                                        Its pretty good.Just a reminder that there are also
                                                        students with Windows, meaning Figma its a bit
                                                        different of yours. Thank you!
                                                    </p>
                                                    <div class="d-md-flex align-items-center ">
                                                        <p class="mb-2 mb-md-0">Was this review helpful?</p>
                                                        <a href="#" class="btn btn-xs btn-primary ms-md-3">Yes</a>
                                                        <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex border-bottom pb-4 mb-4">
                                                <img src="../assets/images/avatar/avatar-4.jpg" alt="avatar" class="rounded-circle avatar-lg">
                                                <div class="ms-3">
                                                    <h4 class="mb-1">
                                                        Claire Jones
                                                        <span class="ms-1 fs-6 text-muted">4 Days ago</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>
                                                        Great course for learning Figma, the only bad detail
                                                        would be that some icons are not included in the
                                                        assets. But 90% of the icons needed are included,
                                                        and the voice of the instructor was very clear and
                                                        easy to understood.
                                                    </p>
                                                    <div class="d-md-flex align-items-center ">
                                                        <p class="mb-2 mb-md-0">Was this review helpful?</p>
                                                        <a href="#" class="btn btn-xs btn-primary ms-md-3">Yes</a>
                                                        <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex">
                                                <img src="../assets/images/avatar/avatar-5.jpg" alt="avatar" class="rounded-circle avatar-lg">
                                                <div class="ms-3">
                                                    <h4 class="mb-1">
                                                        Bessie Pena
                                                        <span class="ms-1 fs-6 text-muted">5 Days ago</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>
                                                        I have really enjoyed this class and learned a lot,
                                                        found it very inspiring and helpful, thank you!
                                                    </p>
                                                    <div class="d-md-flex align-items-center ">
                                                        <p class="mb-2 mb-md-0">Was this review helpful?</p>
                                                        <a href="#" class="btn btn-xs btn-primary ms-md-3">Yes</a>
                                                        <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="transcript" role="tabpanel" aria-labelledby="transcript-tab">
                                        <!-- Description -->
                                        <div>
                                            <h3 class="mb-3">
                                                Transcript from the "Introduction" Lesson
                                            </h3>
                                            <div class="mb-4">
                                                <h4>
                                                    Course Overview
                                                    <a href="#" class="text-primary ms-2 h4">[00:00:00]</a>
                                                </h4>
                                                <p class="mb-0">
                                                    My name is John Deo and I work as human duct tape at
                                                    Gatsby, that means that I do a lot of different
                                                    things. Everything from dev roll to writing content to
                                                    writing code. And I used to work as an architect at
                                                    IBM. I live in Portland, Oregon.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>
                                                    Introduction
                                                    <a href="#" class="text-primary ms-2 h4">[00:00:16]</a>
                                                </h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>
                                                    Why Take This Course?
                                                    <a href="#" class="text-primary ms-2 h4">[00:00:37]</a>
                                                </h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>
                                                    A Look at the Demo Application
                                                    <a href="#" class="text-primary ms-2 h4">[00:00:54]</a>
                                                </h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>
                                                    Summary
                                                    <a href="#" class="text-primary ms-2 h4">[00:01:31]</a>
                                                </h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab pane -->
                                    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                        <!-- FAQ -->
                                        <div>
                                            <h3 class="mb-3">Course - Frequently Asked Questions</h3>
                                            <div class="mb-4">
                                                <h4>How this course help me to design layout?</h4>
                                                <p>
                                                    My name is Jason Woo and I work as human duct tape at
                                                    Gatsby, that means that I do a lot of different
                                                    things. Everything from dev roll to writing content to
                                                    writing code. And I used to work as an architect at
                                                    IBM. I live in Portland, Oregon.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>What is important of this course?</h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>Why Take This Course?</h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                            <div class="mb-4">
                                                <h4>
                                                    Is able to create application after this course?
                                                </h4>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                                <p>
                                                    We'll dive into GraphQL, the fundamentals of GraphQL.
                                                    We're only gonna use the pieces of it that we need to
                                                    build in Gatsby. We're not gonna be doing a deep dive
                                                    into what GraphQL is or the language specifics. We're
                                                    also gonna get into MDX. MDX is a way to write React
                                                    components in your markdown.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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
