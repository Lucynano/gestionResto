{{-- page détail d'une recette --}}

@extends('layouts.main') {{--herite du layout principal --}}

@section('title', $tables->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $tables->id }}</h1> {{-- caracteristique de la table --}}
    <p><strong>Designation :</strong> {{ $tables->designation }}</p>
    <p><strong>Occupation :</strong> {{ $tables->occupation == 0 ? 'libre' : 'non' }}</p> {{-- condition ternaire: si 0 -> libre sinon non libre --}}

    <a href="{{ route('tables.edit', $tables->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la table (vers 'tables.edit') --}}

    <form action="{{ route('tables.destroy', $tables->id) }}" method="POST" class="d-inline">
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button> {{-- btn pour supprimer la table (en rouge) --}}
    </form>
    <a href="{{ route('tables.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection
