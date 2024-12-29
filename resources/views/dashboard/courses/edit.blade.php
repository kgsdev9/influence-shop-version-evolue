@extends('layout.layout')

@section('content')

<main>


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
                        <h2 class="mb-0">Edition de la formation  </h2>

                      </div>
                      <!-- row -->

                      <form action="{{route('courses.update', $course->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                         <label class="form-label" for="lname">Title de la formation @error('title')
                            <small class="text-danger">{{$message}}</small>

                         @enderror  </label>
                          <!-- input -->
                          <input type="text" id="lname" class="form-control" placeholder="APPRENDRE LARAVEL " name="title" value="{{$course->title}}">
                        </div>

                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="email">Prix  @error('prix')
                            <small class="text-danger">{{$message}}</small>

                         @enderror </label>
                          <!-- input -->
                          <input type="number" id="email" class="form-control" placeholder="450" name="prix"  value="{{$course->prix}}">
                          <!-- label -->
                        </div>
                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="phone">Catégories   @error('category_id')
                            <small class="text-danger">{{$message}}</small>

                         @enderror </label>
                          <!-- input group -->
                          <div class="input-group mb-1">

                                <select name="category_id"  class="form-control">
                                    @foreach ($categoryAll as $value )
                                        <option value="{{$value->id}}" {{$value->id ==$course->category_id? 'selected': ''}}>{{$value->name }}</option>
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

                                  <select name="level_id"  class="form-control">
                                    @foreach ($levelAll as $value )
                                        <option value="{{$value->id}}" {{$value->id ==$course->level_id? 'selected': ''}}>{{$value->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <!-- text -->
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
                             
                               <input type="text" class="form-control" name="url_video" value="{{$course->url_video}}" max="150">
                            </div>

                          </div>

                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="lname">Décrivez  briévement la formation  @error('description')
                            <span class="text-danger">{{$message}}</span>
                          @enderror  </label>
                          <!-- input -->

                            <textarea name="description" class="form-control"  id="editor" cols="30" rows="5">{{$course->description}} </textarea>
                        </div>





                        <div class="col-12">
                          <!-- Button -->
                          <button class="btn btn-primary" type="submit">
                        Mettre à jour la formation
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

