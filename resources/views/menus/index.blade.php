{{-- page liste des menus --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des menus') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Liste des menus</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau menu</a> {{-- btn pour ajouter new menu --}}
    @if ($menus->isEmpty())
        <p>Aucun menu disponible</p> {{-- s il n y a pas de menu --}}
    @else
        <table class="table table-striped"> {{-- Tableau Bootstrap --}}
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom plat</th>
                    <th>Prix unitaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>
                            <a href="{{ route('menus.show', $menu->id) }}">
                                {{ $menu->id }} {{-- id en lien vers menus.show --}}
                            </a>
                            </a>
                        </td>
                        <td>{{ $menu->nomplat }}</td>
                        <td>{{ $menu->pu }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection