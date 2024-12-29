@extends('layout.layout')
@section('title', 'Créer une nouvelle formation')
@section('content')
<main>

    <section class="py-4 py-lg-6 bg-primary">
      <div class="container">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="d-lg-flex align-items-center justify-content-between">
              <!-- Content -->
              <div class="mb-4 mb-lg-0">
                <h1 class="text-white mb-1">Nouvelle Fomation </h1>
                <p class="mb-0 text-white lead">
                  Renseignez les informations de votre formation Briévement
                </p>
              </div>
              <div>
                <a href="#" class="btn btn-white">Retour au cours </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Content -->
    <section class="pb-12">
      <div class="container">
        <div id="courseForm" class="bs-stepper">
          <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
              <!-- Stepper Button -->

              <!-- Stepper content -->
              <div class="bs-stepper-content mt-5">
                <div class="card card-bordered shadow-none mb-3  ">

                    <!-- Card body -->
                    <div class="card-body p-6">
                      <div class="mb-4">
                        <h2 class="mb-0">FORMULAIRE D'ENREGISTREMENT </h2>

                      </div>
                      <!-- row -->

                      <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                         <label class="form-label" for="lname">Title de la formation @error('title')
                            <small class="text-danger">{{$message}}</small>

                         @enderror  </label>
                          <!-- input -->
                          <input type="text" id="lname" class="form-control" placeholder="APPRENDRE LARAVEL " name="title" value="{{old('title')}}">
                        </div>

                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="email">Prix  @error('prix')
                            <small class="text-danger">{{$message}}</small>

                         @enderror </label>
                          <!-- input -->
                          <input type="number" id="email" class="form-control" placeholder="450" name="prix" value="{{old('prix')}}">
                          <!-- label -->
                        </div>
                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="phone">Catégories   @error('category_id')
                            <small class="text-danger">{{$message}}</small>

                         @enderror </label>
                          <!-- input group -->
                          <div class="input-group mb-1">
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Choissir une catégorie </option>
                                    @foreach($categoryAll as $value )
                                    <option value="{{$value->id}}"> {{$value->name}}</option>
                                    @endforeach

                                </select>

                          </div>
                          <!-- text -->
                        </div>


                        <div class="mb-4 col-12 col-md-12">
                            <!-- label -->
                            <label class="form-label" for="phone">Niveau   @error('level_id')
                                <small class="text-danger">{{$message}}</small>

                             @enderror  </label>
                            <!-- input group -->
                            <div class="input-group mb-1">
                                  <select name="level_id" id="" class="form-control">
                                    <option value="">Choissir une niveau  </option>
                                      @foreach($levelAll as $value )
                                      <option value="{{$value->id}}"> {{$value->name}}</option>
                                      @endforeach

                                  </select>

                            </div>
                            <!-- text -->
                          </div>

                            <div class="row">

                                <div class="mb-4 col-6 col-md-6">
                                <!-- label -->
                                <label class="form-label" for="phone">Durée de la formaiton @error('duration')
                                    <small class="text-danger">{{$message}}</small>

                                @enderror  </label>
                                <!-- input group -->
                                    <input type="texte" name="duration" class="form-control" id="duration">
                                <!-- text -->
                            </div>


                                <div class="mb-4 col-6 col-md-6">
                                <!-- label -->
                                <label class="form-label" for="phone">Type de formaiton @error('typeformaiton')
                                    <small class="text-danger">{{$message}}</small> @enderror  </label>
                                <!-- input group -->
                                    <select name="typeformation" id="typeformation" class="form-control">
                                    <option value="">Choissisez le type de formaiton </option>
                                     <option value="">En ligne</option>
                                     <option value="">Présentiel chez nos Partenaires</option>
                                      <option value="">A distance </option>
                                  </select>
                                <!-- text -->
                            </div>
                             </div>






                        <div class="mb-4 col-12 col-md-12">
                          <!-- radio -->
                          <label class="form-label" for="resume">Image de la formation  @error('image')
                            <small  class="text-danger">{{$message}}</small>
                          @enderror </label>
                          <div class="input-group mb-1">
                            <input type="file" name="image" class="form-control" id="resume">
                            <label class="input-group-text" for="resume">Télecharger</label>
                          </div>
                          <!-- text -->
                          <span class="fs-6">Upoader une image qui permettra de décrire la formation  </span>
                        </div>

                        <div class="mb-4 col-12 col-md-12">
                            <!-- label -->
                            <label class="form-label" for="phone">Description minimum de la formation   @error('url_video')
                                <small class="text-danger">{{$message}}</small>

                             @enderror</label>
                            <!-- input group -->
                            <div class="input-group mb-1">
                               <input type="text" class="form-control" name="url_video" value="{{old('url_video')}}" max="150">
                            </div>

                          </div>

                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="lname">Décrivez  briévement la formation  @error('description')
                            <span class="text-danger">{{$message}}</span>
                          @enderror  </label>
                          <!-- input -->
                            <textarea name="description" class="form-control"  id="editor" cols="30" rows="5">{{old('description')}} </textarea>
                        </div>





                        <div class="col-12">
                          <!-- Button -->
                          <button class="btn btn-primary" type="submit">
                        Enregistrer la formation
                          </button>
                        </div>
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

