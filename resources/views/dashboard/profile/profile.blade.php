@extends('layout')
@section('title', 'Edition profile')
@section('content')
    <main x-data="profileManagement()" x-init="init()">
        <section class="pt-5 pb-5 bg-light">
            <div class="container">
                <div class="row mt-0 mt-md-4">
                    @include('dashboard.nav-bar')
                    <div class="col-lg-9 col-md-8 col-12">




                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection

@push('script')
    <script>
        function profileManagement() {
            return {
                profile: '',

            };
        }
    </script>
@endpush
