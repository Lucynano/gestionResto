{{-- page liste des menus --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Liste des menus') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des menus</h1>
        @if ($menus->isEmpty())
            <p>Aucun menu disponible</p> {{-- s il n y a pas de menu --}}
        @else
            <table class="table table-striped text-center"> {{-- Tableau Bootstrap --}}
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom plat</th>
                        <th>Prix unitaire</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td>
                                <a href="{{ route('menus.show', $menu->id) }}">
                                    {{ $menu->id }} {{-- id en lien vers menus.show --}}
                                </a>
                                </a>
                            </td>
                            <td>{{ $menu->nomplat }}</td>
                            <td>{{ $menu->pu }}</td>
                            <td>
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Modifier</a> {{-- lien pour modifier le menu (vers 'menus.edit') --}}

                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline"> {{-- action vers la route destroy --}}
                                    @csrf {{-- protection contre les attaques CSRF --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce menu ?');">Supprimer</button> {{-- btn pour supprimer la commande (en rouge) avec message de confirmation --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $menus->links() }}
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau menu</a> {{-- btn pour ajouter new menu --}}
            </div>
        @endif
    </div>
@endsection