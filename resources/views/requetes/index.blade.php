{{-- page requetes specifiques --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Requetes specifiques') {{-- titre personnalise --}}

@include('requetes.popupForm') {{-- pour inclure le fic blade popupForm --}}

@section('content') {{-- contenu specifique --}}
    <h1 class="mb-4">Requetes specifiques</h1>
    <div class="mb-3">
        <button onclick="openForm('myFormListeCli')" class="open-button">Listes des clients passes pour une date donnee ou entre deux dates</button> 
    </div>
    <div class="mb-3">
        <button onclick="openForm('myFormAddition')" class="open-button">Edition d'une addition</button> 
    </div>
    <div class="mb-3">
        <button class="open-button">Recette total accumule par le restaurant</button>
    </div>
    {{--
    <div class="mb-3">
        <a href="{{ route('requetes.histogramme') }}" class="btn btn-primary mb-3">Histogramme des recettes pendant les 6 derniers mois</a> {{-- btn pour   --}}
    {{-- </div>
    <div class="mb-3">
        <a href="{{ route('requetes.listePlat') }}" class="btn btn-primary mb-3">Liste des 10 plats les plus vendu</a> {{-- btn pour   --}}
    {{-- </div> --}} 
@endsection

 

















































