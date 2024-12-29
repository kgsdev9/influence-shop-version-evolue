@extends('layout.layout')

@section('content')

<main>
    <section class="pt-5 pb-5">
        <div class="container">


            <div class="row mt-0 mt-md-4">
                @include('profiledashboard.nav-bar')
                <div class="col-lg-9 col-md-8 col-12">


                    <div class="card mb-4">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Votre Profile </h3>
                                <p class="mb-0">
                                   Votre profil sera visible sur le site avec la mise en evidence des pefomances
                                </p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        <img src="{{asset('formateurs/images/'.$profileFormateur->avatar)}}" id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar">
                                        <div class="ms-3">
                                            <h4 class="mb-0">Photo de profile </h4>
                                        </div>
                                    </div>
                                    {{-- <div>
                                        <a href="#" class="btn btn-outline-secondary btn-sm">Update</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </div> --}}
                                </div>
                                <hr class="my-5">
                                <div>
                                    <h4 class="mb-0">Detail du profil </h4>
                                    <p class="mb-4">
                                       {{$profileFormateur->perfomance}}
                                    </p>
                                    <!-- Form -->
                                    <form class="row gx-3">
                                        <!-- First name -->
                                        <div class="mb-3 col-12 col-md-12">
                                            <label class="form-label" for="fname">Nom et prenom </label>
                                            <input type="text" id="fname" class="form-control" value="{{$profileFormateur->fullname}}" >
                                        </div>
                                        <!-- Last name -->

                                        <!-- Phone -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="phone">Télephone</label>
                                            <input type="text" id="phone" class="form-control" value="{{$profileFormateur->telephone}}">
                                        </div>
                                        <!-- Birthday -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="birth">WhatsApp</label>
                                            <input class="form-control flatpickr flatpickr-input" type="text"  value="{{$profileFormateur->whattsapp}}" >
                                        </div>
                                        <!-- Address -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="address">Genre </label>
                                            <input type="text" id="address" class="form-control" value="{{$profileFormateur->genre}}">
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="address">Perfomance</label>
                                        <input type="text" id="address" class="form-control" value="{{$profileFormateur->perfomance}}">
                                    </div>
                                    </div>
                                        <!-- Address -->
                                        <div class="mb-3 col-12 col-md-12">
                                            <label class="form-label" for="address2">Description </label>
                                           <textarea name="" id="" cols="30" rows="5" class="form-control">{{$profileFormateur->description}}</textarea>
                                        </div>


                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                               Mettre à jour le profile
                                            </button>
                                        </div>
                                    </form>
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
