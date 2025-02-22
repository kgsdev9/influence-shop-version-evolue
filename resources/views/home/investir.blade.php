@extends('layout')
@section('title', 'Soutenir la plateforme')
@section('content')
<main x-data="supportForm()">
    <!-- Page header -->
    <div class="py-8">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-bold">Devenez Partenaire de notre Plateforme</h1>
                        <p class="lead">Complétez ce formulaire pour soutenir notre plateforme et rejoindre notre réseau d'entrepreneurs. Votre collaboration est essentielle pour nous!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de soutien -->
    <section class="py-xl-8 py-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Formulaire de soutien</h3>

                            <form class="needs-validation" novalidate>
                                <!-- Nom -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="firstName" placeholder="Nom" x-model="formData.firstName" required>
                                    <label for="firstName">Nom</label>
                                    <div class="invalid-feedback">Ce champ est requis.</div>
                                </div>

                                <!-- Prénom -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lastName" placeholder="Prénom" x-model="formData.lastName" required>
                                    <label for="lastName">Prénom</label>
                                    <div class="invalid-feedback">Ce champ est requis.</div>
                                </div>

                                <!-- Email -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" x-model="formData.email" required>
                                    <label for="email">Email</label>
                                    <div class="invalid-feedback">Veuillez entrer un email valide.</div>
                                </div>

                                <!-- Adresse -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address" placeholder="Adresse" x-model="formData.address" required>
                                    <label for="address">Adresse</label>
                                    <div class="invalid-feedback">Ce champ est requis.</div>
                                </div>

                                <!-- Téléphone -->
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" placeholder="Téléphone" x-model="formData.phone" required>
                                    <label for="phone">Téléphone</label>
                                    <div class="invalid-feedback">Veuillez entrer un numéro de téléphone valide.</div>
                                </div>

                                <!-- Suggestion Montant -->
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="suggestion" x-model="formData.suggestion" required>
                                        <option value="50">50</option>
                                        <option value="40">40</option>
                                    </select>
                                    <label for="suggestion">Montant de soutien proposé</label>
                                    <div class="invalid-feedback">Veuillez sélectionner un montant.</div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Envoyer ma candidature</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('script')
<script>
    function supportForm() {
        return {
            formData: {
                firstName: '',
                lastName: '',
                email: '',
                address: '',
                phone: '',
                suggestion: '50', // Valeur par défaut à 50
            },
            submitForm() {
                // Validation et soumission du formulaire ici
                console.log(this.formData);
            }
        };
    }
</script>
@endpush
@endsection
