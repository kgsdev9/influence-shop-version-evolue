<div class="row align-items-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <!-- Bg -->
        <div class="rounded-top"
            style="background: url(../assets/images/background/profile-bg.jpg) no-repeat; background-size: cover; height: 100px">
        </div>
        <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
            <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                        <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                            class="avatar-xl rounded-circle border border-4 border-white" alt="avatar">
                    </div>
                    <div class="lh-1">
                        <h2 class="mb-0">
                            {{ Auth::user()->name }}
                            <a href="#" data-bs-toggle="tooltip" data-placement="top" aria-label="Beginner"
                                data-bs-original-title="Beginner">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                    </rect>
                                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                    </rect>
                                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                    </rect>
                                </svg>
                            </a>
                        </h2>
                        <p class="mb-0 d-block">@ {{ Auth::user()->name }}</p>
                    </div>
                </div>
                <div>
                    <a href="#" class="btn btn-primary btn-sm d-none d-md-block">Tableau de bord </a>
                </div>
            </div>
        </div>
    </div>
</div>
