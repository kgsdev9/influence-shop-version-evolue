@extends('layout')
@section('title', 'Gestion des publicités')
@section('content')
    <main x-data="abonnementManagement()">
        <section class="pt-4">
            <div class="container mt-lg-8">
                <!-- row -->
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-12">
                        <!-- heading -->
                        <div class="text-center mb-8">
                            <h1 class="display-3 mb-3 fw-bold">Boostez votre marque avec notre sponsoring</h1>
                            <p class="lead px-md-14">
                                En vous abonnant, nous promouvons votre marque ou produit avec l'aide de nos influenceurs
                                pour atteindre plus de personnes.
                            </p>
                        </div>
                    </div>

                    <template x-for="abonnement in abonnements" :key="abonnement.id">
                        <div class="col-lg-4 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-3 border shadow-none border-top-0">
                                <div class="border-top border-4 rounded-3 border-dark-warning">
                                    <!-- Card body -->
                                    <div class="p-5">
                                        <div class="mb-5">
                                            <h3 class="fw-bold" x-text="abonnement.libelle"></h3>
                                            <h2 class="mb-3 fw-bold mt-5" x-text="abonnement.price + '€'"></h2>
                                            <h2 class="mb-3 fw-bold mt-4">Avantage</h2>
                                            <p class="mb-0">
                                                <span class="text-dark fw-medium" x-text="abonnement.description"></span>
                                            </p>
                                            <!-- Dynamisation du bouton -->
                                            <button class="btn btn-outline-dark-warning mt-4"
                                                @click="souscrire(abonnement.id)">
                                                Souscrire
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('script')
    <script>
        function abonnementManagement() {
            return {
                abonnements: @json($listeabonnement), // Liste des abonnements
                codeLivraison: '',

                // Fonction pour souscrire à un abonnement
                async souscrire(abonnementId) {

                    // Créer un objet FormData
                    const formData = new FormData();
                    formData.append('abonnement_id', abonnementId);
                    formData.append('arg', 3);

                    try {
                        // Envoi des données au serveur via fetch
                        const response = await fetch('{{ route('begin.payment') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData,
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
                                title: 'Erreur lors de la souscription.',
                                showConfirmButton: true,
                            });
                        }
                    } catch (error) {
                        console.error('Erreur de réseau:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true,
                        });
                    }
                }
            };
        }
    </script>
@endpush
