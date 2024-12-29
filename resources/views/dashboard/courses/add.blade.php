@extends('layout.layout')
@section('title', 'Créer une nouvelle formation')
@section('content')
<main>

    <section class="py-4 py-lg-6 bg-primary">
      <div class="container">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="mb-4 mb-lg-0">
                <h1 class="text-white mb-1">Nouvelle Prestation</h1>
                <p class="mb-0 text-white lead">
                  Renseignez les informations de votre prestation .
                </p>
              </div>
              <div>
                <a href="#" class="btn btn-white">Retourner</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Formulaire en étapes -->
    <section class="pb-12">
      <div class="container">
        <div id="courseForm" class="bs-stepper">
          <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">

              <!-- Contenu de l'étape du formulaire -->
              <div class="bs-stepper-content mt-5">
                <div class="card card-bordered shadow-none mb-3">
                  <!-- Card body -->
                  <div class="card-body p-6">
                    <div class="mb-4">
                      <h2 class="mb-0">FORMULAIRE D'ENREGISTREMENT</h2>
                    </div>

                    <!-- Formulaire multi-étapes -->
                    <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data" id="courseForm">
                      @csrf

                      <!-- Étape 1 : Informations générales -->
                      <div class="step" id="step1">
                        <!-- Champs d'information générale -->
                        <!-- Vos autres champs ici... -->
                         <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                         <label class="form-label" for="lname">Titre de la Prestation @error('title')
                            <small class="text-danger">{{$message}}</small>

                         @enderror  </label>
                          <!-- input -->
                          <input type="text" id="lname" class="form-control" placeholder="APPRENDRE LARAVEL " name="title" value="{{old('title')}}">
                        </div>

                        <div class="row">
                            <div class="mb-4 col-6 col-md-3">
                                <!-- label -->
                                <label class="form-label" for="email">Prix  @error('prix')
                                  <small class="text-danger">{{$message}}</small>

                               @enderror </label>
                                <!-- input -->
                                <input type="number" id="email" class="form-control" placeholder="450" name="prix" value="{{old('prix')}}">
                                <!-- label -->
                              </div>

                              <div class="mb-4 col-12 col-md-5">
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

                              <div class="mb-4 col-12 col-md-4">
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
                        </div>
                            <div class="row">

                                <div class="mb-4 col-6 col-md-3">
                                <!-- label -->
                                <label class="form-label" for="phone">Durée de la prestation @error('duration')
                                    <small class="text-danger">{{$message}}</small>

                                @enderror  </label>
                                <!-- input group -->
                                    <input type="texte" name="duration" class="form-control" id="duration">
                                <!-- text -->
                            </div>


                                <div class="mb-4 col-6 col-md-4">
                                <!-- label -->
                                <label class="form-label" for="phone">Type de prestation @error('typeformaiton')
                                    <small class="text-danger">{{$message}}</small> @enderror  </label>
                                <!-- input group -->
                                    <select name="typeformation" id="typeformation" class="form-select">
                                    <option value="">Choissisez le type de formaiton </option>
                                     <option value="">En ligne</option>
                                     <option value="">Présentiel chez nos Partenaires</option>
                                     <option value="">Prestation sur les reseaux sociaux</option>

                                  </select>
                                <!-- text -->
                            </div>

                            <div class="mb-4 col-6 col-md-4">
                                <!-- label -->
                                <label class="form-label" for="phone">Avez vous prevu un support @error('support')
                                    <small class="text-danger">{{$message}}</small> @enderror  </label>
                                <!-- input group -->
                                    <select name="support" id="support" class="form-select">
                                    <option value="">Oui </option>
                                     <option value="">Non</option>
                                  </select>
                                <!-- text -->
                            </div>
                             </div>


                             <div class="row">

                                <div class="mb-4 col-6 col-md-4">
                                    <!-- label -->
                                    <label class="form-label" for="phone">Avez vous prevu des exercices pratiques @error('support')
                                        <small class="text-danger">{{$message}}</small> @enderror  </label>
                                    <!-- input group -->
                                        <select name="support" id="support" class="form-select">
                                        <option value="">Oui </option>
                                         <option value="">Non</option>
                                      </select>
                                    <!-- text -->
                                </div>

                                  <div class="mb-4 col-12 col-md-6">
                                    <!-- radio -->
                                    <label class="form-label" for="resume">Image de la prestation  @error('image')
                                      <small  class="text-danger">{{$message}}</small>
                                    @enderror </label>
                                    <div class="input-group mb-1">
                                      <input type="file" name="image" class="form-control" id="resume">
                                      <label class="input-group-text" for="resume">Télecharger</label>
                                    </div>
                                    <!-- text -->
                                    <span class="fs-6">Upoader une image qui permettra de décrire la formation  </span>
                                  </div>

                             </div>



                        <div class="mb-4 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label" for="lname">Décrivez le derouler de la prestation  @error('description')
                            <span class="text-danger">{{$message}}</span>
                          @enderror  </label>
                          <!-- input -->
                            <textarea name="description" class="form-control"  id="editor" cols="30" rows="5">{{old('description')}} </textarea>
                        </div>
                        <!-- Bouton pour passer à l'étape suivante -->
                        <button type="button" class="btn btn-primary" id="nextStep1">Suivant</button>
                      </div>

                      <!-- Étape 2 : Ajouter des épisodes dans un tableau -->
                      <div class="step" id="step2" style="display: none;">
                        <h2>Les differentes sequences de prestation</h2>

                        <div class="table-responsive">
                          <table class="table table-bordered" id="episodesTable">
                            <thead>
                              <tr>
                                <th>Titre de la sequence</th>
                                <th>Durée</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Ligne par défaut pour les épisodes -->
                              <tr>
                                <td><input type="text" class="form-control" name="titre[]"></td>
                                <td><input type="number" class="form-control" name="duree[]"></td>
                                <td>
                                  <button type="button" class="btn btn-danger remove-episode">Supprimer</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <!-- Bouton pour ajouter un nouvel épisode -->
                        <button type="button" id="add-episode" class="btn btn-secondary mb-4">Ajouter une sequence</button>

                        <!-- Boutons de navigation -->
                        <button type="button" class="btn btn-secondary" id="prevStep2">Précédent</button>
                        <button type="button" class="btn btn-primary" id="nextStep2">Suivant</button>
                      </div>

                      <!-- Étape 3 : Ce que vous retirerez de ce cours (Tableau dynamique) -->
                      <div class="step" id="step3" style="display: none;">
                        <h2>Ce que vous retirerez de ce cours</h2>

                        <!-- Tableau pour les points à retenir -->
                        <div class="table-responsive">
                          <table class="table table-bordered" id="keyPointsTable">
                            <thead>
                              <tr>
                                <th>Point à retenir</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Ligne par défaut pour les points à retenir -->
                              <tr>
                                <td><input type="text" class="form-control" name="key_points[]"></td>
                                <td>
                                  <button type="button" class="btn btn-danger remove-key-point">Supprimer</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <!-- Bouton pour ajouter un nouveau point -->
                        <button type="button" id="add-key-point" class="btn btn-secondary mb-4">Ajouter un point</button>

                        <!-- Boutons de navigation -->
                        <button type="button" class="btn btn-secondary" id="prevStep3">Précédent</button>
                        <button type="submit" class="btn btn-primary">Enregistrer la formation</button>
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

@push('scripts')
<script>
  $(document).ready(function() {
    // Étape actuelle
    var currentStep = 1;

    // Aller à l'étape suivante
    $("#nextStep1").click(function() {
      $("#step1").hide();
      $("#step2").show();
      currentStep = 2;
    });

    $("#nextStep2").click(function() {
      $("#step2").hide();
      $("#step3").show();
      currentStep = 3;
    });

    // Aller à l'étape précédente
    $("#prevStep2").click(function() {
      $("#step2").hide();
      $("#step1").show();
      currentStep = 1;
    });

    $("#prevStep3").click(function() {
      $("#step3").hide();
      $("#step2").show();
      currentStep = 2;
    });

    // Ajouter un nouvel épisode dans le tableau
    $("#add-episode").click(function() {
      var episodeRow = `
        <tr>
          <td><input type="text" class="form-control" name="titre[]"></td>
          <td><input type="number" class="form-control" name="duree[]"></td>
          <td><button type="button" class="btn btn-danger remove-episode">Supprimer</button></td>
        </tr>
      `;
      $("#episodesTable tbody").append(episodeRow);
    });

    // Supprimer un épisode du tableau
    $(document).on("click", ".remove-episode", function() {
      $(this).closest('tr').remove();
    });

    // Ajouter un nouveau point clé dans le tableau
    $("#add-key-point").click(function() {
      var keyPointRow = `
        <tr>
          <td><input type="text" class="form-control" name="key_points[]"></td>
          <td><button type="button" class="btn btn-danger remove-key-point">Supprimer</button></td>
        </tr>
      `;
      $("#keyPointsTable tbody").append(keyPointRow);
    });

    // Supprimer un point clé du tableau
    $(document).on("click", ".remove-key-point", function() {
      $(this).closest('tr').remove();
    });
  });
</script>
@endpush
