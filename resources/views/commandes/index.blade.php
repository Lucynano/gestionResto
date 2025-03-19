{{-- page liste des commandes --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des commandes') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Liste des commandes</h1>
    <a href="{{ route('commandes.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle commande</a> {{-- btn pour ajouter new commande --}}
    @if ($commandes->isEmpty())
        <p>Aucune commande disponible</p> {{-- s il n y a pas de commande --}}
    @else
        <table class="table table-striped"> {{-- Tableau Bootstrap --}}
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Menu ID</th>
                    <th>Table ID</th>
                    <th>Nom client</th>
                    <th>Type commande</th>
                    <th>Date commande</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>
                            <a href="{{ route('commandes.show', $commande->id) }}">
                                {{ $commande->id }} {{-- id en lien vers commandes.show --}}
                            </a>
                        </td>
                        <td>{{ $commande->menu_id }}</td>
                        <td>{{ $commande->table_id }}</td>
                        <td>{{ $commande->nomcli }}</td>
                        <td>{{ $commande->typecom }}</td>
                        <td>{{ $commande->datecom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection 
