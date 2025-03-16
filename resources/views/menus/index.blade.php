{{-- page liste des menus --}}

@extends('layouts.main') {{--herite du layout principal --}}

@section('title', 'Liste des menus') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Liste des menus</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau menu</a> {{-- btn pour ajouter new menu --}}
    @if ($menus->isEmpty())
        <p>Aucun menu disponible pour "{{ request('search') }}"</p> {{-- s il n y a pas de menu --}}
    @else
        <ul class="list-group">
            @foreach ($menus as $menu)
                <li class="list-group-item">
                    <a href="{{ route('menus.show', $menu->id) }}">{{ $menu->id }}</a> {{-- afficher en liste les menus en tant que liens --}}
                </li>
            @endforeach
        </ul>

        <!-- Afficher les liens de pagination -->
        {{ $menus->links() }}

    @endif
@endsection