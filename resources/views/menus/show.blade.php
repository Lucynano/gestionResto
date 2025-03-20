{{-- page détail d'un menu --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', $menu->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $menu->id }}</h1> {{-- caracteristique du menu --}}
    <p><strong>Nom plat :</strong> {{ $menu->nomplat }}</p>
    <p><strong>Prix unitaire :</strong> {{ $menu->pu }}</p> {{-- pu: int --}}

    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier le menu (vers 'menus.edit') --}}

    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce menu ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
    </form>
    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection
