@extends('layout')
@section('title', 'Paiement Validé')
@section('content')
    <!-- Section principale pour la notification -->
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f4f7fa;">
        <div class="text-center">
            <!-- SVG Check icon -->
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                    class="bi bi-check-circle" viewBox="0 0 16 16" style="color: #28a745;">
                    <path
                        d="M16 8a8 8 0 1 0-8 8 8 8 0 0 0 8-8zM8 15a7 7 0 1 1 0-14 7 7 0 0 1 0 14zm3.793-7.707a1 1 0 0 0-1.414 0L8 11.586 5.621 9.207a1 1 0 1 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0 0-1.414z" />
                </svg>
            </div>

            <h1 class="display-4 fw-bold" style="color: #28a745;">Paiement effectué avec succès</h1>
          
            <div>
                <a href="/" class="btn btn-success btn-lg mt-4">Retour à l'accueil</a>
            </div>
        </div>
    </div>
@endsection
