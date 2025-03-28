{{-- page liste des additions --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Edition d\'addition') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">LuDo ReSTo</h1>

    @if ($additions->isEmpty())
        <p>Aucune addition disponible</p> {{-- s il n y a pas de addition --}}
    @else
        <p><strong>Nom du client:</strong> {{ $validated['nomcli'] }}</p>
        <p><strong>Table:</strong> {{ $validated['table_id'] }}</p>

        <table class="table table-striped"> {{-- Tableau Bootstrap --}}
            <thead class="table-dark">
                <tr>
                    <th>Menu</th>
                    <th>PU (Ar)</th>
                    <th>Unite</th>
                    <th>Total (Ar)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($additions as $addition)
                    <tr>
                        <td>{{ $addition->nomplat }}</td>
                        <td>{{ $addition->pu }}</td>
                        <td>{{ $addition->unite }}</td>
                        <td>{{ $addition->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>TOTAL (Ar): {{ $totalGeneral }}</h3>

    @endif
    <a href="{{ route('requetes.index') }}" class="btn btn-secondary">Retour</a> {{-- lien pour retourner a index --}}
@endsection 