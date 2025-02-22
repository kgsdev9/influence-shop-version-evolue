@extends('layout')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f8d7da;">
    <div class="text-center">
        <!-- Icône SVG d'erreur -->
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16" style="color: #dc3545;">
                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v4H7V4zm0 5h2v2H7V9z" />
            </svg>
        </div>

        <h1 class="display-4 fw-bold" style="color: #dc3545;">Échec du paiement</h1>
        <p class="lead" style="font-size: 1.25rem; color: #6c757d;">
            Oops ! Le paiement a échoué. Veuillez réessayer ou contactez notre support si le problème persiste.
        </p>
        <div>
            <a href="/" class="btn btn-danger btn-lg mt-4">Retour à l'accueil</a>
        </div>
    </div>
</div>
@endsection
