{{-- page Liste des 10 plats les plus vendus --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des 10 plats les plus vendus') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>Liste des 10 plats les plus vendus</h1>

    @if ($plats->isEmpty())
        <p>Aucun plat disponible</p> {{-- s il n y a pas de plat --}}
    @else
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
                @foreach ($plats as $plat)
                    <tr>
                        <td>{{ $plat->nomplat }}</td>
                        <td>{{ $plat->pu }}</td>
                        <td>{{ $plat->sommeUnite }}</td>
                        <td>{{ $plat->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
    <a href="{{ route('requetes.index') }}" class="btn btn-secondary">Retour</a> {{-- lien pour retourner a index --}}
@endsection 