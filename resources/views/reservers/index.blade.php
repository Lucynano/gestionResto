{{-- page liste des reservers --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des reservations') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des reservations</h1>
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
                        <th></th>
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
                            <td>
                                <a href="{{ route('reservers.edit', $reserver->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la reserver (vers 'reservers.edit') --}}

                                <form action="{{ route('reservers.destroy', $reserver->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
                                    @csrf {{-- protection contre les attaques CSRF --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette reservation ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $reservers->links() }}
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('reservers.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle reservation</a> {{-- btn pour ajouter new reserver --}}
            </div>
        @endif
    </div>
@endsection