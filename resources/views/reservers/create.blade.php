{{-- fichier Blade pour le formulaire --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Ajouter une reservation') {{-- titre personnalise --}}

@section('content')
    <h1>Ajouter une nouvelle reservation</h1>

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

    <form action="{{ route('reservers.store') }}" method="POST"> {{-- action vers la route store --}}
        @csrf <!-- protection contre les attaques CSRF -->

        <div class="mb-3">
            <label for="table_id" class="form-label">Table (optionnel)</label>
            <select id="table_id" name="table_id" class="form-control"> {{-- choix entre table deja existante --}}
                @foreach($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->designation }}</option> {{-- on recupere l id mais on laisse l utilisateur choisir une desigantion correspondante --}}
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nomcli" class="form-label">Nom client</label>
            <input type="text" id="nomcli" name="nomcli" class="form-control" value="{{ old('nomcli') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation --}}
        </div>

        <div class="mb-3">
            <label for="date_reserve" class="form-label">Date reserve</label>
            <input type="date" id="date_reserve" name="date_reserve" class="form-control" value="{{ old('date_reserve') }}" required> {{-- conserver les donnees precedemment saisies en cas d erreur de validation, type date (YYYY-MM-DD) --}}
        </div>

        <div class="mb-3">
            <label for="date_reserve" class="form-label">Heure et minutes (07:00 - 22:30)</label>
            <div>
                <input type="number" id="heure" name="heure" min="7" max="22" step="1" value="{{ old('heure', $heure ?? '') }}" required> {{-- heure entre 07 a 22 (le resto est ouvert) --}}
                <label for="date_reserve"> : </label>
                <input type="number" id="minutes" name="minutes" min="00" max="30" step="30" value="{{ old('minutes', $minutes ?? '') }}" required>  {{-- minutes soit 00 soit 30 --}}
            </div>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button> {{-- btn pour enregistrer --}}
        <a href="{{ route('reservers.index') }}" class="btn btn-secondary">Annuler</a> {{-- lien pour annuler --}}
    </form>
@endsection
