@extends('layout')
@section('title', 'Suivi des livraisons')
@section('content')
    <main x-data="suiviLivraison()">
        <section class="pt-4">
            <div class="container mt-lg-8">
                <!-- row -->
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-12">
                        <!-- heading -->
                        <div class="text-center mb-8">
                            <h1 class="display-3 mb-3 fw-bold">Suivez l'état de votre livraison</h1>
                            <p class="lead px-md-14">
                                Entrez votre code de livraison pour connaître l'état actuel de votre colis et sa
                                localisation.
                            </p>
                        </div>
                    </div>

                    <!-- Code de livraison -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card mb-3 border shadow-none border-top-0">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3 class="fw-bold">Suivi de livraison</h3>
                                    <p>Entrez le code de livraison pour obtenir les détails et la localisation de votre
                                        colis.</p>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Code de livraison"
                                            x-model="codeLivraison" @input="rechercherLivraison()">
                                        <button class="btn btn-outline-warning"
                                            @click="rechercherLivraison()">Suivre</button>
                                    </div>
                                </div>

                                <!-- Affichage des détails -->
                                <template x-if="livraison">
                                    <div class="mt-4">
                                        <h5>Status: <span x-text="livraison.status"></span></h5>
                                        <p>Dernière mise à jour: <span x-text="livraison.updated_at"></span></p>
                                    </div>
                                </template>

                                <!-- Carte OpenStreetMap -->
                                <div id="map" style="height: 400px; margin-top: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('script')
    <script>
        function suiviLivraison() {
            return {
                codeLivraison: '',
                livraison: null,
                map: null,
                marker: null,

                async rechercherLivraison() {
                    if (!this.codeLivraison) return;

                    // Simulation d'une API ou d'un backend pour récupérer les détails de la livraison
                    const response = await fetch(`/api/suivi-livraison/${this.codeLivraison}`);
                    const data = await response.json();

                    if (data.success) {
                        this.livraison = data.livraison;

                        // Mise à jour de la carte avec la localisation
                        if (this.map) {
                            this.marker.setLatLng([this.livraison.latitude, this.livraison.longitude]);
                            this.map.setView([this.livraison.latitude, this.livraison.longitude], 13);
                        } else {
                            this.initMap(this.livraison.latitude, this.livraison.longitude);
                        }
                    } else {
                        this.livraison = null;
                        alert('Aucune livraison trouvée pour ce code.');
                    }
                },

                initMap(latitude, longitude) {
                    // Initialisation de la carte OpenStreetMap
                    this.map = L.map('map').setView([latitude, longitude], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    }).addTo(this.map);

                    this.marker = L.marker([latitude, longitude]).addTo(this.map);
                },

                initPosition() {
                    // Si la géolocalisation est disponible, obtenir la position de l'utilisateur
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition((position) => {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;

                            // Initialiser la carte avec la position actuelle de l'utilisateur
                            this.initMap(latitude, longitude);
                        }, (error) => {
                            console.error("Erreur de géolocalisation: ", error);
                            alert("Impossible de récupérer la position de l'utilisateur.");
                        });
                    } else {
                        alert("La géolocalisation n'est pas supportée par ce navigateur.");
                    }
                },

                init() {
                    this.initPosition(); // Appeler la méthode pour initialiser la position de l'utilisateur
                }
            };
        }
    </script>
@endpush
