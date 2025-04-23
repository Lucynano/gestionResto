{{-- layout principal avec Bootstrap --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de restaurent')</title> {{-- titre personnalise pour chaque page --}}
    <!-- Lien Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/Ludo.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.5); /* Assombrit légèrement le fond */
            background-blend-mode: darken;
        }
    </style>    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tables.index') }}">Tables</a>  {{-- lien vers la liste des tables --}}
            <a class="navbar-brand" href="{{ route('menus.index') }}">Menus</a>  {{-- lien vers la liste des menus --}}
            <a class="navbar-brand" href="{{ route('commandes.index') }}">Commandes</a>  {{-- lien vers la liste des commandes --}}
            <a class="navbar-brand" href="{{ route('reservers.index') }}">Reservations</a>  {{-- lien vers la liste des reservers --}}
            <a class="navbar-brand" href="{{ route('requetes.index') }}">Requetes specifiques</a>  {{-- lien vers la liste des reservers --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @if (Route::is('menus.index') || Route::is('commandes.index') || Route::is('reservers.index')) {{-- verifie si l'utilisateur est actuellement sur la page menus.index ou commandes.index ou reservers.index --}}
                    <form class="d-flex ms-auto" method="GET" action="{{ url()->current() }}"> {{-- assure que la recherche se fait sur la page actuelle (menus ou commandes ou reservers) --}}
                        <input class="form-control me-2" type="search" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                @endif
            </div>
        </div>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                </li>
            @endauth
        </ul>
    </nav>

    <div class="container mt-4">
        @yield('content') {{-- pour inserer le contenu specifique a chaque page (les vues enfants)--}}
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts') {{-- pour permettre les scripts JavaScript --}}
</body>

