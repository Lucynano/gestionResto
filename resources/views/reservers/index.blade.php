{{-- page liste des reservers --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des reservations') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Liste des reservations</h1>
    <a href="{{ route('reservers.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle reservation</a> {{-- btn pour ajouter new reserver --}}
    @if ($reservers->isEmpty())
        <p>Aucune reservation disponible</p> {{-- s il n y a pas de reserver --}}
    @else
        <table class="table table-striped"> {{-- Tableau Bootstrap --}}
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Table ID</th>
                    <th>Nom client</th>
                    <th>Date de reservation</th>
                    <th>Date reserve</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservers as $reserver)
                    <tr>
                        <td>
                            <a href="{{ route('reservers.show', $reserver->id) }}">
                                {{ $reserver->id }} {{-- id en lien vers reservers.show --}}
                            </a>
                        </td>
                        <td>{{ $reserver->table_id }}</td>
                        <td>{{ $reserver->nomcli }}</td>
                        <td>{{ $reserver->date_de_reserv }}</td>
                        <td>{{ $reserver->date_reserve }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection