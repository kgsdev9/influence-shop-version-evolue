<div class="row">
    <!-- Boucle pour les inputs de fichier -->
    <template x-for="(file, index) in adressepyament" :key="index">
        <div class="col-lg-4 col-12 mb-4">
            <!-- form -->
            <div class="border p-4 rounded-3" 
                 :class="selectedAdresse?.id === file.id ? 'border-success bg-light' : ''">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                        :id="'homeRadio' + index"
                        @click="selectAdresse(file)" />
                    <label class="form-check-label text-dark fw-semibold" :for="'homeRadio' + index">
                        <span x-text="file.telephone || 'Home'"></span>
                    </label>
                </div>
                <!-- address -->
                <p class="mb-0">
                    <span x-text="file.city || 'N/A'"></span><br><br>
                    <span x-text="file.adresse || 'N/A'"></span><br>
                    United States
                </p>

                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-warning btn-sm" @click="openModal(file)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146 0.854a2 2 0 0 1 2.828 2.828L4.5 12.5a1 1 0 0 1-.351.211l-3.5 1a1 1 0 0 1-1.21-1.21l1-3.5a1 1 0 0 1 .211-.351L11.292 2.026a2 2 0 0 1 .854-.854zM11.793 2.5l-9.192 9.193-.548 1.925 1.924-.548 9.192-9.192a1 1 0 0 0-1.415-1.415z" />
                        </svg>
                    </button>
                    <button class="btn btn-danger btn-sm" @click="deleteAdresse(file.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v8H7V4z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
