{{-- page requetes specifiques --}}

@extends('layouts.main') {{-- herite du layout principal --}}

@section('title', 'Requetes specifiques') {{-- titre personnalise --}}

@include('requetes.formListeCli') {{-- pour inclure le fic blade popupForm --}}

@include('requetes.formAddition') {{-- pour inclure le fic blade popupForm --}}

@section('content') {{-- contenu specifique --}}
    <link rel="stylesheet" href="{{ asset('css/popupForm.css') }}"> {{-- lien css pour popupForm --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Requetes specifiques</h1>
        <div class="container d-flex flex-column align-items-center gap-3 mt-5">
            <button onclick="openForm('formListeCli')" class="btn btn-success mb-3">Listes des clients passes pour une date donnee ou entre deux dates</button> 
        
            <button onclick="openForm('formAddition')" class="btn btn-success mb-3">Edition d'une addition</button>
        
            <a href="{{ route('requetes.recetteTotal') }}" class="btn btn-primary mb-3">Recette total accumule par le restaurant</a>
        
            <a href="{{ route('requetes.histogramme') }}" class="btn btn-primary mb-3">Histogramme des recettes pendant les 6 derniers mois</a> 
        
            <a href="{{ route('requetes.listePlat') }}" class="btn btn-primary mb-3">Liste des 10 plats les plus vendu</a> {{-- btn pour   --}}
        </div> 
    </div>

    <!-- Script JS pour validation et gestion des popups -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.form-container').forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    let formId = form.parentElement.id;

                    if (formId === "formListeCli") {
                        let date = document.getElementById('date').value;
                        let date1 = document.getElementById('date1').value;
                        let date2 = document.getElementById('date2').value;

                        if (!date && (!date1 || !date2)) {
                            alert("Veuillez remplir soit une date unique, soit deux dates.");
                            event.preventDefault();
                        }
                    } else if (formId === "formAddition") {
                        let date = form.querySelector('#date2').value;
                        let nomcli = form.querySelector('#nomcli').value;
                        let table_id = form.querySelector('#table_id').value;

                        if (!date || !nomcli || table_id === "" || table_id === null || table_id === "Aucune table disponible") {
                            alert("Tous les champs sont obligatoires. Vérifiez si des tables sont disponibles.");
                            event.preventDefault();
                        } 
                    }
                });
            });
        });

        function openForm(id) {
            closeForm(); // Ferme toutes les popups avant d'ouvrir la nouvelle
            document.getElementById(id).classList.add("show");
        }

        function closeForm() {
            document.querySelectorAll('.form-popup').forEach(function(popup) {
                popup.classList.remove("show");
            });
        }
    </script>

@endsection

 

















































