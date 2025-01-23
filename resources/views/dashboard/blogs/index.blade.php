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

        <!-- Modal de création/édition -->
        <template x-if="showModal">
            <div class="modal fade show d-block" tabindex="-1" aria-modal="true" style="background-color: rgba(0,0,0,0.5)">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" x-text="isEdite ? 'Modification' : 'Création'"></h5>
                            <button type="button" class="btn-close" @click="hideModal()"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="submitForm">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="text" id="title" class="form-control" x-model="formData.title"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="mini_description" class="form-label">Description courte</label>
                                    <input type="text" id="mini_description" class="form-control"
                                        x-model="formData.mini_description" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description complète</label>

                                    <trix-editor input="description" x-ref="description" @trix-change="updateDescription"></trix-editor>

                                </div>

                                <div class="mb-3">
                                    <label for="temps_lecture" class="form-label">Temps de lecture</label>
                                    <input type="text" id="temps_lecture" class="form-control"
                                        x-model="formData.temps_lecture" required>
                                </div>



                                <button type="submit" class="btn btn-primary"
                                    x-text="isEdite ? 'Mettre à jour' : 'Enregistrer'"></button>
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
                    publish_at: '',
                    blog_id: null
                },
                currentBlog: null,

                hideModal() {
                    this.showModal = false;
                    this.currentBlog = null;
                    this.resetForm();
                },

                openModal(blog = null) {
    this.isEdite = blog !== null;

    if (this.isEdite) {
        this.currentBlog = {
            ...blog
        };
        this.formData = {
            title: this.currentBlog.title,
            mini_description: this.currentBlog.mini_description,
            description: this.currentBlog.description,
            temps_lecture: this.currentBlog.temps_lecture,
            publish_at: this.currentBlog.publish_at,
            blog_id: this.currentBlog.id
        };

        // Mettez à jour l'éditeur Trix manuellement
        this.$nextTick(() => {
            this.$refs.description.editor.loadHTML(this.formData.description);
        });
    } else {
        this.resetForm();
    }

    this.showModal = true;
},


                updateDescription(event) {

                    this.formData.description = this.$refs.description.editor.getDocument().toString();
                    console.log(this.formData.description);  // Afficher la valeur pour débogage

                },


                resetForm() {
                    this.formData = {
                        title: '',
                        mini_description: '',
                        description: '',
                        temps_lecture: '',
                        publish_at: '',
                        blog_id: null
                    };
                },

                async submitForm() {
                    this.isLoading = true;

                    // Validation des champs
                    // if (!this.formData.title || !this.formData.mini_description || !this.formData.description || !this
                    //     .formData.temps_lecture ) {
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'Tous les champs sont requis.',
                    //         showConfirmButton: true
                    //     });
                    //     this.isLoading = false;
                    //     return;
                    // }

                    const formData = new FormData();
                    formData.append('title', this.formData.title);
                    formData.append('mini_description', this.formData.mini_description);
                    formData.append('description', this.formData.description);
                    formData.append('temps_lecture', this.formData.temps_lecture);
                    formData.append('publish_at', this.formData.publish_at);
                    formData.append('pub_blog_id', this.currentBlog ? this.currentBlog.id : null);

                    try {
                        const response = await fetch('{{ route('blogs.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData
                        });

                        if (response.ok) {
                            const data = await response.json();
                            const blog = data.blog;

                            if (blog) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Publicité enregistrée avec succès !',
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                if (this.isEdite) {
                                    const index = this.blogs.findIndex(b => b.id === blog.id);
                                    if (index !== -1) {
                                        this.blogs[index] = blog;
                                    }
                                } else {
                                    this.blogs.push(blog);
                                }

                                this.filterBlogs();
                                this.resetForm();
                                this.hideModal();
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
                    } finally {
                        this.isLoading = false;
                    }
                },

                get paginatedBlogs() {
                    let start = (this.currentPage - 1) * this.blogsPerPage;
                    let end = start + this.blogsPerPage;
                    return this.filteredBlogs.slice(start, end);
                },

                filterBlogs() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredBlogs = this.blogs.filter(blog => {
                        return blog.title.toLowerCase().includes(term) || blog.mini_description.toLowerCase()
                            .includes(term);
                    });
                    this.totalPages = Math.ceil(this.filteredBlogs.length / this.blogsPerPage);
                },

                deleteBlog(id) {
                    // Logique pour supprimer une publicité
                },

                goToPage(page) {
                    if (page < 1 || page > this.totalPages) return;
                    this.currentPage = page;
                },

                init() {
                    this.filterBlogs();
                }
            };
        }



    </script>



@endpush
