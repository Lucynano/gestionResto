{{-- page formulaire de modification d’une menu --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Modifier le menu') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>Modifier le menu</h1>

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

    <form action="{{ route('menus.update', $menus->id) }}" method="POST"> {{-- formulaire pour modif un menu --}}
        @csrf {{-- protection contre les attaques CSRF --}}

        @method('PUT') <!-- Méthode HTTP PUT -->
        <div class="mb-3">
            <label for="nomplat" class="form-label">Nom plat</label>
            <input type="text" id="nomplat" name="nomplat" class="form-control" value="{{ old('nomplat', $menus->nomplat ?? '') }}" required> {{-- recupere l ancienne valeur si l utilisateur a soumis un formulaire incorrect --}}
        </div>

        <div class="mb-3">
            <label for="pu" class="form-label">Prix unitaire</label>
            <input type="text" id="pu" name="pu" oninput="this.value=this.value.replace(/\D/g, '')" class="form-control" value="{{ old('pu', $menus->pu ?? '') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation, oninput="this.value=this.value.remplace(/\D/g, '')": on ne peut entrer que des chiffres--}}
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button> {{-- btn pour enregistrer --}}
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Annuler</a> {{-- lien pour annuler --}}
    </form>
@endsection