@extends('layout.layout')

@section('content')

<main>
    <section class="pt-5 pb-5">
        <div class="container">


            <div class="row mt-0 mt-md-4">
                @include('profiledashboard.nav-bar')
                <div class="col-lg-9 col-md-8 col-12">



                    <div class="card mb-4">
                        <div class="card border-0">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">
                                   Mes Formations  <span class="text-muted fs-6"> ({{count($CourseTeacher)}})</span>
                                </h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush">
                                    @foreach ($CourseTeacher as $value )
                                    <!-- List group item -->
                                    <li class="list-group-item px-0 py-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="#">
                                                <div class="d-lg-flex align-items-center">
                                                    <div>
                                                        <img src="{{asset('courss/images/'.$value->image)}}" alt="course" class="rounded img-4by3-lg">
                                                    </div>
                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                        <h4 class="text-primary-hover">
                                                          {{$value->title}}
                                                        </h4>
                                                      
                                                    </div>
                                                </div>
                                            </a>
                                            <div>

                                                <td>
                                                    <a href="{{route('courses.edit', $value->id)}}" class="btn btn-outline-secondary btn-sm">Edition</a>
                                                    <a href="{{route('courses.destroy',$value->id)}}" class="btn btn-success btn-sm">Supprimer</a>
                                                </td>


                                            </div>
                                        </div>
                                    </li>
                                    <!-- List group item -->
                                    @endforeach



                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
