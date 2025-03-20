{{-- page détail d'une reserver --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', $reserver->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $reserver->id }}</h1> {{-- caracteristique de la reserver --}}
    <p><strong>Table ID :</strong> {{ $reserver->table_id }}</p>
    <p><strong>Nom client :</strong> {{ $reserver->nomcli }}</p>
    <p><strong>Date de reservation :</strong> {{ $reserver->date_de_reserv }}</p>
    <p><strong>Date reserve :</strong> {{ $reserver->date_reserve }}</p>

    <a href="{{ route('reservers.edit', $reserver->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la reserver (vers 'reservers.edit') --}}

    <form action="{{ route('reservers.destroy', $reserver->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette reservation ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
    </form>
    <a href="{{ route('reservers.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection