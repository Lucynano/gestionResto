{{-- page liste des tables --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des tables') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Liste des tables</h1>
    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle table</a> {{-- btn pour ajouter new table --}}
    @if ($tables->isEmpty())
        <p>Aucune table disponible</p> {{-- s il n y a pas de table --}}
    @else
        <table class="table table-striped"> {{-- Tableau Bootstrap --}}
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Designation</th>
                    <th>Occupation</th>
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
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
@endsection

