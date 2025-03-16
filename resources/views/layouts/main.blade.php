{{-- layout principal avec Bootstrap --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de restaurent')</title> {{-- titre personnalise pour chaque page --}}
    <!-- Lien Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tables.index') }}">Tables</a>  {{-- lien vers la liste des tables --}}
            <a class="navbar-brand" href="{{ route('menus.index') }}">Menus</a>  {{-- lien vers la liste des menus --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto" method="GET" action="{{ route('menus.index') }}">
                    <input class="form-control me-2" type="search" name="search" placeholder="Rechercher un menu/client..." value="{{ request('search') }}"> {{-- champ pour rechercher un menu/client --}}
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') {{-- pour inserer le contenu specifique a chaque page (les vues enfants)--}}
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

