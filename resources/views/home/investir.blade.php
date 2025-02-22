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
                            <p class="lead">Complétez ce formulaire pour soutenir notre plateforme et rejoindre notre
                                réseau d'entrepreneurs. Votre collaboration est essentielle pour nous!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulaire de soutien -->
        <section class="py-xl-0 py-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-12">
                        <div class="card shadow-sm border-light">
                            <div class="card-body">
                                <h3 class="text-center mb-4">Formulaire de soutien</h3>

                                <form class="needs-validation" novalidate @submit.prevent="submitForm">
                                    <!-- Nom -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="firstName" placeholder="Nom"
                                                    x-model="formData.firstName" required>
                                                <label for="firstName">Nom</label>
                                                <div class="invalid-feedback">Ce champ est requis.</div>
                                                <span class="text-danger" x-show="formErrors.firstName">Ce champ est requis.</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="lastName"
                                                    placeholder="Prénom" x-model="formData.lastName" required>
                                                <label for="lastName">Prénom</label>
                                                <div class="invalid-feedback">Ce champ est requis.</div>
                                                <span class="text-danger" x-show="formErrors.lastName">Ce champ est requis.</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Email -->
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email" x-model="formData.email" required>
                                                <label for="email">Email</label>
                                                <div class="invalid-feedback">Veuillez entrer un email valide.</div>
                                                <span class="text-danger" x-show="formErrors.email">Veuillez entrer un email valide.</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="tel" class="form-control" id="phone"
                                                    placeholder="Téléphone" x-model="formData.phone" required>
                                                <label for="phone">Téléphone</label>
                                                <div class="invalid-feedback">Veuillez entrer un numéro de téléphone valide.</div>
                                                <span class="text-danger" x-show="formErrors.phone">Veuillez entrer un numéro de téléphone valide.</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Adresse -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="address" placeholder="Adresse"
                                            x-model="formData.address" required>
                                        <label for="address">Adresse</label>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                        <span class="text-danger" x-show="formErrors.address">Ce champ est requis.</span>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="suggestion"
                                            placeholder="Montant proposé" x-model="formData.suggestion" readonly>
                                        <label for="suggestion">Montant de soutien proposé</label>
                                        <div class="invalid-feedback">Veuillez entrer un montant.</div>
                                        <span class="text-danger" x-show="formErrors.suggestion">Veuillez entrer un montant.</span>
                                    </div>

                                    <!-- Ensemble de boutons de montant -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-outline-warning w-100"
                                                :class="{ 'active': formData.suggestion === '50' }"
                                                @click="formData.suggestion = '50'">50</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-outline-warning w-100"
                                                :class="{ 'active': formData.suggestion === '100' }"
                                                @click="formData.suggestion = '100'">100</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-outline-warning w-100"
                                                :class="{ 'active': formData.suggestion === '200' }"
                                                @click="formData.suggestion = '200'">200</button>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-outline-warning">Soutenir</button>
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
                        suggestion: '50',
                    },
                    formErrors: {
                        firstName: false,
                        lastName: false,
                        email: false,
                        phone: false,
                        address: false,
                        suggestion: false,
                    },
                    validateForm() {
                        // Réinitialiser les erreurs
                        this.formErrors = {
                            firstName: false,
                            lastName: false,
                            email: false,
                            phone: false,
                            address: false,
                            suggestion: false,
                        };

                        // Validation des champs requis
                        if (!this.formData.firstName) this.formErrors.firstName = true;
                        if (!this.formData.lastName) this.formErrors.lastName = true;
                        if (!this.formData.email) this.formErrors.email = true;
                        if (!this.formData.phone) this.formErrors.phone = true;
                        if (!this.formData.address) this.formErrors.address = true;
                        if (!this.formData.suggestion) this.formErrors.suggestion = true;

                        // Retourner vrai si aucune erreur n'est trouvée
                        return !Object.values(this.formErrors).includes(true);
                    },
                    async submitForm() {
                        if (!this.validateForm()) {
                            return; // Si des erreurs sont trouvées, ne pas soumettre le formulaire
                        }

                        const formData = new FormData();
                        formData.append('phone', this.formData.phone);
                        formData.append('email', this.formData.email);
                        formData.append('firstName', this.formData.firstName);
                        formData.append('lastName', this.formData.lastName);
                        formData.append('address', this.formData.address);
                        formData.append('amount', this.formData.suggestion);

                        try {
                            const response = await fetch('{{ route('payment.investiseur.post') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: formData
                            });

                            if (response.ok) {
                                const data = await response.json();

                                if (data.payment_url) {
                                    window.location.href = data.payment_url;
                                } else {
                                    alert('Erreur: ' + (data.error || 'URL de paiement introuvable.'));
                                }
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur lors de l\'enregistrement.',
                                    showConfirmButton: true
                                });
                            }
                        } catch (error) {
                            console.error('Erreur réseau :', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Une erreur est survenue.',
                                showConfirmButton: true
                            });
                        }
                    }
                };
            }
        </script>
    @endpush
@endsection
