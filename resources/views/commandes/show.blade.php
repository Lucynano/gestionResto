{{-- page détail d'une commande --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', $commandes->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $commandes->id }}</h1> {{-- caracteristique de la commande --}}
    <p><strong>Menu ID :</strong> {{ $commandes->menu_id }}</p>
    <p><strong>Table ID :</strong> {{ $commandes->table_id }}</p>
    <p><strong>Nom client :</strong> {{ $commandes->nomcli }}</p>
    <p><strong>Type commande :</strong> {{ $commandes->typecom }}</p>
    <p><strong>Date commande :</strong> {{ $commandes->datecom }}</p>

    <a href="{{ route('commandes.edit', $commandes->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la commande (vers 'commandes.edit') --}}

    <form action="{{ route('commandes.destroy', $commandes->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
    </form>
    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection