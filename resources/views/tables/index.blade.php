{{-- page liste des tables --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des tables') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des tables</h1>
        @if ($tables->isEmpty())
            <p>Aucune table disponible</p> {{-- s il n y a pas de table --}}
        @else
            <table class="table table-striped text-center"> {{-- Tableau Bootstrap --}}
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Designation</th>
                        <th>Occupation</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                    @php
                        $table->occupation == 0 ? $occupations="Libre" : $occupations="Non libre";
                    @endphp 
                        <tr>
                            <td>
                                <a href="{{ route('tables.show', $table->id) }}">
                                    {{ $table->id }} {{-- id en lien vers tables.show --}}
                                </a>
                            </td>
                            <td>{{ $table->designation }}</td>
                            <td>{{ $occupations }}</td>
                            <td>
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la table (vers 'tables.edit') --}}
                                <form action="{{ route('tables.destroy', $table->id) }}" method="POST" class="d-inline">  {{-- action vers la route destroy --}}
                                    @csrf {{-- protection contre les attaques CSRF --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette table ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $tables->links() }}
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle table</a> {{-- btn pour ajouter new table --}}
            </div>
        @endif
    </div>
@endsection

