{{-- page recette Total --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Recette total') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="text-center mb-4">Recette Total</h1>

    @if ($recettes->isEmpty())
        <p>Aucun recette disponible</p> {{-- s il n y a pas de recette --}}
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
                @foreach ($recettes as $recette)
                    <tr>
                        <td>{{ $recette->nomplat }}</td>
                        <td>{{ $recette->pu }}</td>
                        <td>{{ $recette->sommeUnite }}</td>
                        <td>{{ $recette->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>TOTAL (Ar): {{ $totalGeneral }}</h3>

    @endif
    <a href="{{ route('requetes.index') }}" class="btn btn-secondary">Retour</a> {{-- lien pour retourner a index --}}
@endsection 