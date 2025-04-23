{{-- page liste des commandes --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des commandes') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des commandes</h1>
        @if ($commandes->isEmpty())
            <p>Aucune commande disponible</p> {{-- s il n y a pas de commande --}}
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
                        <th></th>
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
                            <td>
                                <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier la commande (vers 'commandes.edit') --}}

                                <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
                                    @csrf {{-- protection contre les attaques CSRF --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $commandes->links() }}
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('commandes.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle commande</a> {{-- btn pour ajouter new commande --}}
            </div>
        @endif
    </div>
@endsection 
