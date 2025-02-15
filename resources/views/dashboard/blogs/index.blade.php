@extends('layout')
@section('title', 'Gestion des publicités')
@section('content')
    <main x-data="blogManagement()" x-init="init()">
        <section class="pt-5 pb-5 bg-light">
            <div class="container">
                <div class="row mt-0 mt-md-4">
                    @include('dashboard.nav-bar')
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-12">
                                <!-- Card header -->
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">Gestion des publicités</h3>
                                        <span>Gérez vos publicités sur le site.</span>
                                    </div>
                                    <!-- Nav -->
                                    <div class="nav btn-group flex-nowrap" role="tablist">
                                        <button class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            @click="showModal = true">
                                            <i class='fa fa-add'></i>
                                            Ajouter une publicité
                                        </button>
                                    </div>
                                </div>

                                <div class="p-4 row">
                                    <!-- Formulaire de recherche -->
                                    <form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
                                        <span class="position-absolute ps-3 search-icon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="search" class="form-control ps-6" x-model="searchTerm"
                                            @input="filterBlogs">
                                    </form>
                                </div>

                                <div class="table-invoice table-responsive">
                                    <table class="table mb-0 text-nowrap table-centered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Titre</th>
                                                <th scope="col">Description courte</th>
                                                <th scope="col">Temps lecture</th>
                                                <th scope="col">Publié le</th>
                                                <th scope="col">Organisateur</th>
                                                <th scope="col">Lieu</th>
                                                <th scope="col">Date de début</th>
                                                <th scope="col">Date de fin</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="blog in paginatedBlogs" :key="blog.id">
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <h5 class="mb-0 text-primary-hover" x-text="blog.title"></h5>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.mini_description"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.temps_lecture"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.publish_at"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.organisateur"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.lieu"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.date_event_debut"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.date_event_fin"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.price"></p>
                                                    </td>
                                                    <td>
                                                        <p x-text="blog.country_id"></p>
                                                    </td>
                                                    <td>
                                                        <button @click="openModal(blog)">Éditer</button>
                                                        <button @click="deleteBlog(blog.id)">Supprimer</button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-sm-12 col-md-7 offset-md-5 d-flex justify-content-end">
                                        <nav>
                                            <ul class="pagination">
                                                <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                                    <button class="page-link"
                                                        @click="goToPage(currentPage - 1)">Précedent</button>
                                                </li>
                                                <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                                    <button class="page-link"
                                                        @click="goToPage(currentPage + 1)">Suivant</button>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <template x-if="showModal">
            <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" x-text="isEdite ? 'Modification' : 'Création'"></h5>
                            <button type="button" class="btn-close" @click="hideModal()"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="submitForm">
                                <!-- Titre et Prix -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" id="title" class="form-control" x-model="formData.title"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Prix</label>
                                        <input type="number" id="price" class="form-control" x-model="formData.price"
                                            required>
                                    </div>
                                </div>

                                <!-- Organisateur et Lieu -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="organisateur" class="form-label">Organisateur</label>
                                        <input type="text" id="organisateur" class="form-control"
                                            x-model="formData.organisateur" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lieu" class="form-label">Lieu</label>
                                        <input type="text" id="lieu" class="form-control"
                                            x-model="formData.lieu" required>
                                    </div>
                                </div>

                                <!-- Code Blog et Temps de lecture -->
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="temps_lecture" class="form-label">Durée de l'evenement</label>
                                        <input type="number" id="temps_lecture" class="form-control"
                                            x-model="formData.temps_lecture" required>
                                    </div>
                                </div>

                                <!-- Description courte -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="mini_description" class="form-label">Description courte</label>
                                        <input type="text" id="mini_description" class="form-control"
                                            x-model="formData.mini_description" required>
                                    </div>
                                </div>

                                <!-- Description complète -->
                                <div class="mb-3 row">
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description complète</label>
                                        <trix-editor input="description" x-ref="description"
                                            @trix-change="updateDescription"></trix-editor>
                                    </div>
                                </div>

                                <!-- Date début et fin -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date_event_debut" class="form-label">Date de début</label>
                                        <input type="date" id="date_event_debut" class="form-control"
                                            x-model="formData.date_event_debut" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date_event_fin" class="form-label">Date de fin</label>
                                        <input type="date" id="date_event_fin" class="form-control"
                                            x-model="formData.date_event_fin" required>
                                    </div>
                                </div>

                                <!-- Pays et Ville -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="country_id" class="form-label">Pays</label>
                                        <select id="country_id" class="form-control" x-model="formData.country_id">
                                            <option value="">Sélectionner un pays</option>
                                            <template x-for="pays in listepays" :key="pays.id">
                                                <option :value="pays.id" x-text="pays.name"
                                                    :selected="formData.country_id === pays.id ? true : false"></option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city_id" class="form-label">Ville</label>
                                        <select id="city_id" class="form-control" x-model="formData.city_id">
                                            <option value="">Sélectionner une ville</option>
                                            <template x-for="ville in listevilles" :key="ville.id">
                                                <option :value="ville.id" x-text="ville.name"
                                                    :selected="formData.city_id === ville.id ? true : false"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>




                                <!-- Image -->
                                <div class="mb-3 row">
                                    <div class="col-md-12">
                                        <label for="image" class="form-label">Image</label>
                                        <div class="border rounded shadow-sm p-2 bg-light position-relative"
                                            style="cursor: pointer; border: 1px solid #ddd;"
                                            @click="document.getElementById('imageInput').click()">
                                            <template x-if="formData.image_preview">
                                                <img :src="formData.image_preview" class="img-fluid rounded"
                                                    style="max-height: 150px; width: 100%; object-fit: cover;"
                                                    alt="Aperçu">
                                            </template>
                                            <template x-if="!formData.image_preview">
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="height: 150px;">
                                                    <i class="bi bi-camera" style="font-size: 2rem; color: #6c757d;"></i>
                                                </div>
                                            </template>

                                        </div>
                                        <input type="file" id="imageInput" class="d-none" accept="image/*"
                                            @change="handleImageChange">
                                    </div>
                                </div>

                                <!-- Bouton de soumission -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary"
                                        x-text="isEdite ? 'Mettre à jour' : 'Enregistrer'"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>




    </main>

@endsection

@push('script')
    <script>
        function blogManagement() {
            return {
                searchTerm: '',
                blogs: @json($listeblogs),
                listepays: @json($listepays),
                listevilles: @json($listevilles),
                filteredBlogs: [],
                currentPage: 1,
                blogsPerPage: 10,
                totalPages: 0,
                showModal: false,
                isEdite: false,
                formData: {
                    title: '',
                    mini_description: '',
                    description: '',
                    temps_lecture: '',
                    price: '',
                    date_event_debut: '',
                    date_event_fin: '',
                    image_preview: null,
                    image: null,
                    city_id: '',
                    country_id: '',
                },
                currentBlog: null,

                hideModal() {
                    this.showModal = false;
                    this.currentBlog = null;
                    this.isEdite = false;
                    this.resetForm();
                },

                openModal(blog = null) {
                    this.isEdite = blog !== null;

                    if (this.isEdite) {
                        this.currentBlog = {
                            ...blog
                        };
                        console.log('Image du blog:', this.currentBlog.image);

                        const baseUrl = '/s3/';
                        const imagePath = this.currentBlog.image ? this.currentBlog.image.replace(/ /g, '%20') :
                            '';
                        this.formData = {
                            title: this.currentBlog.title,
                            mini_description: this.currentBlog.mini_description,
                            organisateur: this.currentBlog.organisateur,
                            lieu: this.currentBlog.lieu,
                            country_id: this.currentBlog.country_id,
                            city_id: this.currentBlog.city_id,
                            description: this.currentBlog.description,
                            temps_lecture: this.currentBlog.temps_lecture,
                            price: this.currentBlog.price,
                            date_event_debut: this.currentBlog.date_event_debut,
                            date_event_fin: this.currentBlog.date_event_fin,
                            image_preview: imagePath ? baseUrl + imagePath : '', // Construire l'URL de l'image relative
                        };

                        console.log('Image Preview:', this.formData.image_preview); // Vérifiez l'URL ici
                    } else {
                        this.isEdite = false;
                        this.resetForm();
                    }

                    this.showModal = true;
                },


                updateDescription(event) {

                    this.formData.description = this.$refs.description.editor.getDocument().toString();


                },

                handleImageChange(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            this.formData.image_preview = reader.result;
                        };
                        reader.readAsDataURL(file);
                        this.formData.image = file; // Stocker l'image dans le formData
                    }
                },

                resetForm() {
                    this.formData = {
                        title: '',
                        organisateur: '',
                        lieu: '',
                        mini_description: '',
                        description: '',
                        temps_lecture: '',
                        price: '',
                        date_event_debut: '',
                        date_event_fin: '',
                        image_preview: null,
                        country_id: '',
                        city_id: '',
                        image: null,
                    };
                },

                async submitForm() {
                    try {
                        // Début de l'état de chargement
                        this.isLoading = true;

                        // Création du FormData
                        const formData = new FormData();

                        // Append standard fields from the form
                        formData.append('title', this.formData.title);
                        formData.append('mini_description', this.formData.mini_description);
                        formData.append('description', this.formData.description);
                        formData.append('temps_lecture', this.formData.temps_lecture);
                        formData.append('price', this.formData.price);
                        formData.append('date_event_debut', this.formData.date_event_debut);
                        formData.append('date_event_fin', this.formData.date_event_fin);
                        formData.append('pub_blog_id', this.currentBlog ? this.currentBlog.id : null);
                        // Add the country  and city data
                        formData.append('country_id', this.formData.country_id);
                        formData.append('city_id', this.formData.city_id);

                        // Add the organizer and location data
                        formData.append('organisateur', this.formData.organisateur);
                        formData.append('lieu', this.formData.lieu);

                        if (this.formData.image)
                        {
                            formData.append('image', this.formData.image);
                        }

                        // You can now send the form data to the server (via fetch, axios, etc.)

                        // Envoi des données au serveur via fetch
                        const response = await fetch('{{ route('blogs.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token pour la sécurité
                            },
                            body: formData, // FormData contient toutes les données à envoyer
                        });

                        // Vérification si la réponse est correcte
                        if (response.ok) {
                            const data = await response.json();
                            const blog = data.blog;

                            // Si le blog est retourné
                            if (blog) {
                                // Affichage d'une notification de succès
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Publicité enregistrée avec succès !',
                                    showConfirmButton: false,
                                    timer: 1500,
                                });

                                // Mise à jour des blogs dans la liste
                                if (this.isEdite) {
                                    const index = this.blogs.findIndex(b => b.id === blog.id);
                                    if (index !== -1) {
                                        this.blogs[index] = blog; // Mise à jour d'un blog existant
                                    }
                                } else {
                                    this.blogs.push(blog); // Ajout d'un nouveau blog
                                }

                                // Filtrage et réinitialisation du formulaire
                                this.filterBlogs();
                                this.resetForm();
                                this.hideModal(); // Fermeture du modal
                            }
                        } else {
                            // Si la réponse est incorrecte, afficher un message d'erreur
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur lors de l\'enregistrement.',
                                showConfirmButton: true,
                            });
                        }
                    } catch (error) {
                        // Si une erreur réseau survient
                        console.error('Erreur réseau :', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.',
                            showConfirmButton: true,
                        });
                    } finally {
                        // Fin de l'état de chargement
                        this.isLoading = false;
                    }
                },

                init() {

                    this.filterBlogs();
                },


                // Méthodes pour pagination et filtrage
                filterBlogs() {
                    this.filteredBlogs = this.blogs.filter(blog =>
                        blog.title.toLowerCase().includes(this.searchTerm.toLowerCase())
                    );
                    this.updatePagination();
                },

                updatePagination() {
                    this.totalPages = Math.ceil(this.filteredBlogs.length / this.blogsPerPage);
                },

                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                get paginatedBlogs() {
                    const start = (this.currentPage - 1) * this.blogsPerPage;
                    const end = start + this.blogsPerPage;
                    return this.filteredBlogs.slice(start, end);
                }
            };
        }
    </script>
@endpush
