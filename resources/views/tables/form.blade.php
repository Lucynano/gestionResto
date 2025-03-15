{{-- page formulaire d’ajout/modification d’une table --}}

@extends('layouts.main') {{--herite du layout principal --}}

@section('title', isset($tables) ? 'Modifier la table' : 'Ajouter une table') {{-- titre personnalise --}} {{-- si $recipe existe, c'est modification, sinon ajout --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ isset($tables) ? 'Modifier la table' : 'Ajouter une table' }}</h1>

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

    <form action="{{ isset($tables) ? route('tables.update', $tables->id) : route('tables.store') }}" method="POST"> {{-- formulaire pour modif/supp une table --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @if (isset($tables)) {{-- si modif: methode: 'PUT' et si ajout: methoede: 'POST' --}}
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation', $tables->designation ?? '') }}" required> {{-- recupere l ancienne valeur si l utilisateur a soumis un formulaire incorrect --}}
        </div>

        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation (libre ou non)</label>
            <select id="occupation" name="occupation" class="form-control">
                <option value="libre" {{ old('occupation', $tables->occupation ?? '') == 0 ? 'selected' : '' }}>Libre</option> {{-- conserver les donnees precedemment saisies en cas deerreur de validation --}}
                <option value="non" {{ old('occupation', $tables->occupation ?? '') == 1 ? 'selected' : '' }}>Non</option> {{-- conserver les donnees precedemment saisies en cas deerreur de validation --}}
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button> {{-- btn pour enregistrer --}}
        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Annuler</a> {{-- lien pour annuler --}}
    </form>
@endsection