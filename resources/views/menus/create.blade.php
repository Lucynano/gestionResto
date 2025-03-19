{{-- fichier Blade pour le formulaire --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Ajouter un menu') {{-- titre personnalise --}}

@section('content')
    <h1>Ajouter un nouveau menu</h1>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST"> {{-- action vers la route store --}}
        @csrf <!-- protection contre les attaques CSRF -->

        <div class="mb-3">
            <label for="nomplat" class="form-label">Nom plat</label>
            <input type="text" id="nomplat" name="nomplat" class="form-control" value="{{ old('nomplat') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
        </div>

        <div class="mb-3">
            <label for="pu" class="form-label">Prix unitaire</label>
            <input type="text" id="pu" name="pu" oninput="this.value=this.value.replace(/\D/g, '')" class="form-control" value="{{ old('pu') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation, oninput="..." methode JS pour que la saisie doit etre seulement des chiffres  --}}
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button> {{-- btn pour enregistrer --}}
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Annuler</a> {{-- lien pour annuler --}}
    </form>
@endsection
