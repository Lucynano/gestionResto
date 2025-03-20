{{-- page détail d'une table --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', $table->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $table->id }}</h1> {{-- caracteristique de la table --}}
    <p><strong>Designation :</strong> {{ $table->designation }}</p>
    <p><strong>Occupation :</strong> {{ $table->occupation == 0 ? 'Libre' : 'Non libre' }}</p> {{-- condition ternaire: si 0 -> libre sinon non libre --}}

    <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la table (vers 'tables.edit') --}}

    <form action="{{ route('tables.destroy', $table->id) }}" method="POST" class="d-inline">  {{-- action vers la route destroy --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette table ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
    </form>
    <a href="{{ route('tables.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection
