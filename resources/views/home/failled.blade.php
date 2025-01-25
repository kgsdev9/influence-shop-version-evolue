@extends('layout')

@section('content')
<div class="container mt-5">
    <!-- Composant Bootstrap avec icône SVG pour l'erreur -->
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <!-- Icône SVG d'erreur -->
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi bi-exclamation-circle" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v4H7V4zm0 5h2v2H7V9z" />
        </svg>

        <strong>Oops !</strong> Le paiement a échoué. Veuillez réessayer ou contactez le support si le problème
        persiste.

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endsection