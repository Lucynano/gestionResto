{{-- page détail d'un menu --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', $menus->id) {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>{{ $menus->id }}</h1> {{-- caracteristique du menu --}}
    <p><strong>Nom plat :</strong> {{ $menus->nomplat }}</p>
    <p><strong>Prix unitaire :</strong> {{ $menus->pu }}</p> {{-- pu: int --}}

    <a href="{{ route('menus.edit', $menus->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier le menu (vers 'menus.edit') --}}

    <form action="{{ route('menus.destroy', $menus->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
        @csrf {{-- protection contre les attaques CSRF --}}
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce menu ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
    </form>
    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Retour à la liste</a> {{-- lien pour retourner a la liste --}}
@endsection
