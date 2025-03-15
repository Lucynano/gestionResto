{{-- page liste des tables --}}

@extends('layouts.main') {{--herite du layout principal --}}

@section('title', 'Liste des tables') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Liste des tables</h1>
    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle table</a> {{-- btn pour ajouter new table --}}
    @if ($tables->isEmpty())
        <p>Aucune table disponible.</p> {{-- s il n y a pas de table --}}
    @else
        <ul class="list-group">
            @foreach ($tables as $table)
                <li class="list-group-item">
                    <a href="{{ route('tables.show', $table->id) }}">{{ $table->id }}</a> {{-- afficher en liste les tables en tant que liens --}}
                </li>
            @endforeach
        </ul>
    @endif
@endsection