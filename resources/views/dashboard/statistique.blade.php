

@can('is_formateur')



<div class="row">
    <div class="col-lg-6 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <div class="p-4">
                <span class="fs-6 text-uppercase fw-semibold">TOTAL COURS</span>
                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                  {{count($allCourseForTeacher)}}
                </h2>

            </div>
        </div>
    </div>



</div>
@endcan