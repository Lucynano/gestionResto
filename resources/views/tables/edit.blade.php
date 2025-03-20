{{-- page formulaire de modification d’une table --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Modifier la table') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>Modifier la table</h1>

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

    <form action="{{ route('tables.update', $table->id) }}" method="POST"> {{-- formulaire pour modif une table --}}
        @csrf {{-- protection contre les attaques CSRF --}}

        @method('PUT') <!-- Méthode HTTP PUT -->
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation', $table->designation ?? '') }}" required> {{-- recupere l ancienne valeur si l utilisateur a soumis un formulaire incorrect --}}
        </div>

        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation (libre ou non)</label>
            <select id="occupation" name="occupation" class="form-control"> {{-- champ a choix multiple --}}
                <option value="Libre" {{ old('occupation', $table->occupation ?? '') == 0 ? 'selected' : '' }}>Libre</option> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
                <option value="Non libre" {{ old('occupation', $table->occupation ?? '') == 1 ? 'selected' : '' }}>Non libre</option> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button> {{-- btn pour enregistrer --}}
        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Annuler</a> {{-- lien pour annuler --}}
    </form>
@endsection