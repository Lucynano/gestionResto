{{-- page détail d'une commande --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', $commande->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $commande->id }}</h1> {{-- caracteristique de la commande --}}
    <p><strong>Menu ID :</strong> {{ $commande->menu_id }}</p>
    <p><strong>Table ID :</strong> {{ $commande->table_id }}</p>
    <p><strong>Nom client :</strong> {{ $commande->nomcli }}</p>
    <p><strong>Type commande :</strong> {{ $commande->typecom }}</p>
    <p><strong>Date commande :</strong> {{ $commande->datecom }}</p>

    <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la commande (vers 'commandes.edit') --}}

    <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
    </form>
    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection