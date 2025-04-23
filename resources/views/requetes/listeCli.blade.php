{{-- page requetes specifiques --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des clients') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
     <h1 class="text-center mb-4">Liste des clients passes pour une date donnee ou entre deux dates</h1>
     
     <!-- Affichage des erreurs -->
     @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

     @if ($commandes->isEmpty())
        <p>Aucun client correspondant</p> {{-- s il n y a pas de client qui correspond a ces dates --}}
     @else
        <table class="table table-striped"> {{-- Tableau Bootstrap --}}
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Menu ID</th>
                    <th>Table ID</th>
                    <th>Nom client</th>
                    <th>Unite</th>
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
                        <td>{{ $commande->unite }}</td>
                        <td>{{ $commande->typecom }}</td>
                        <td>{{ $commande->datecom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
     @endif
    <a href="{{ route('requetes.index') }}" class="btn btn-secondary">Retour</a> {{-- lien pour retourner a index --}}
@endsection



