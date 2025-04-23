{{-- page liste des additions --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Edition d\'addition') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="text-center mb-4">LuDo ReSTo</h1>

    @if ($additions->isEmpty())
        <p>Aucune addition disponible</p> {{-- s il n y a pas de addition --}}
    @else
        <p><strong>Nom du client:</strong> {{ $validated['nomcli'] }}</p>
        <p><strong>Table:</strong> {{ $validated['table_id'] }}</p>

        <h5 class="text-center mb-4">Votre facture en detail</h5>

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
    <form action="{{ route('requetes.payer', ['table_id' => $validated['table_id'] ?? null]) }}" method="POST" id="payer-form" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-secondary">Payer</button>
    </form>    
    <a href="{{ route('telecharger.pdf') }}" class="btn btn-secondary">Télécharger en PDF</a> <!-- Bouton pour télécharger le PDF -->
    <a href="{{ route('requetes.index') }}" class="btn btn-secondary">Retour</a> {{-- lien pour retourner a index --}}
@endsection 

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('payer-form');
        form.addEventListener('submit', function (e) {
            const confirmPay = confirm("Voulez-vous vraiment effectuer le paiement ?");
            if (!confirmPay) {
                e.preventDefault();
            }
        });
    });
</script>
