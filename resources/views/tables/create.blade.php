{{-- fichier Blade pour le formulaire --}}

@extends('layouts.main') {{--herite du layout principal --}}

@section('title', 'Ajouter une table') {{-- titre personnalise --}}

@section('content')
    <h1>Ajouter une nouvelle table</h1>

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

    <form action="{{ route('tables.store') }}" method="POST">
        @csrf <!-- protection contre les attaques CSRF -->

        <div class="mb-3">
            <label for="designation" class="form-label">Desigantion</label>
            <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation') }}" required> {{-- conserver les donnees precedemment saisies en cas deerreur de validation --}}
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
