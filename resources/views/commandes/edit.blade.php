{{-- page formulaire de modification d’une commande --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Modifier la commande') {{-- titre personnalise --}}

@section('content') {{-- contenu specifique --}}
    <h1>Modifier la commande</h1>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('commandes.update', $commande->id) }}" method="POST"> {{-- formulaire pour modif une commande --}}
        @csrf {{-- protection contre les attaques CSRF --}}

        @method('PUT') <!-- Méthode HTTP PUT -->

        <div class="mb-3">
            <label for="menu_id" class="form-label">Menu (optionnelle)</label>
            <select name="menu_id" class="form-control"> {{-- choix entre nom plat deja existant --}}
                @if(isset($menus) && count($menus) > 0)
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nomplat }}</option>
                    @endforeach
                @else
                    <option disabled>Aucun menu disponible</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="table_id" class="form-label">Table (optionnel)</label>
            <select id="table_id" name="table_id" class="form-control" required> {{-- choix entre designation deja existante --}}
                @if(isset($tables) && count($tables) > 0)
                    @foreach($tables as $table)
                        @if ($table->occupation==0)
                            <option value="{{ $table->id }}">{{ $table->designation }}</option>
                        @endif
                    @endforeach
                @else
                    <option disabled>Aucune table disponible</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="nomcli" class="form-label">Nom client</label>
            <input type="text" id="nomcli" name="nomcli" class="form-control" value="{{ old('nomcli', $commande->nomcli ?? '') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
        </div>

        <div class="mb-3">
            <label for="unite" class="form-label">Unite</label>
            <input type="number" id="unite" name="unite" class="form-control" value="{{ old('unite', $commande->unite ?? '') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
        </div>

        <div class="mb-3">
            <label for="typecom" class="form-label">Type commande</label>
            <select id="typecom" name="typecom" class="form-control"> {{-- champ a choix multiple --}}
                <option value="Sur table" {{ old('typecom', $commande->typecom ?? '') == 'Sur table' ? 'selected' : '' }}>Sur table</option> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
                <option value="A emporter" {{ old('typecom', $commande->typecom ?? '') == 'A emporter' ? 'selected' : '' }}>A emporter</option> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
            </select>
        </div>

        <div class="mb-3">
            <label for="datecom" class="form-label">Date commande</label>
            <input type="date" id="datecom" name="datecom" class="form-control" value="{{ old('datecom', $commande->datecom ?? '') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation, type date (YYYY-MM-DD) --}}
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button> {{-- btn pour enregistrer --}}
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a> {{-- lien pour annuler --}}
    </form>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typecomSelect = document.getElementById('typecom');
        const tableSelect = document.getElementById('table_id');

        // Fonction pour mettre à jour l'état du champ table_id
        function toggleTableField() {
            if (typecomSelect.value === 'A emporter') { // si vrai alors table_id est indispo
                tableSelect.disabled = true;
                tableSelect.value = null;
            } else {
                tableSelect.disabled = false;
            }
        }

        // Appeler la fonction au chargement de la page pour vérifier l'état initial
        toggleTableField();

        // Ajouter un événement pour changer l'état lorsque le type de commande change
        typecomSelect.addEventListener('change', toggleTableField);
    });
</script>
@endsection