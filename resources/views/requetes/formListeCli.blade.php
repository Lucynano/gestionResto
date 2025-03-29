<!-- Formulaire pour la liste des clients -->

<div class="form-popup" id="formListeCli">
    <form action="{{ route('requetes.listeCli') }}" class="form-container" method="GET">
        @csrf {{-- protection contre les attaques CSRF --}}

        <h3>Formulaire pour la liste des clients</h3>

        <label for="date" class="form-label"><b>Une date donnée</b></label>
        <input type="date" id="date" name="date" class="form-control">

        <label class="form-label"><b>Deux dates</b></label>
        <input type="date" id="date1" name="date1" class="form-control">
        <input type="date" id="date2" name="date2" class="form-control">

        <button type="submit" class="btn">Rechercher</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
    </form>
</div>