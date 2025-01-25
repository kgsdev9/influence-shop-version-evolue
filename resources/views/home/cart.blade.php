@extends('layout')
@section('content')
<div x-data="cartComponent">
    <div class="container py-5">
        <div class="row">


        </div>
    </div>
</div>

</div>
@endsection


@push('script')
    <script>
        function cartComponent() {
            return {
                products: [],
            };
        }
    </script>
@endpush