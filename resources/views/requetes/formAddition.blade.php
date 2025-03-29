<div class="form-popup" id="formAddition">
    <form action="{{ route('requetes.addition') }}" class="form-container" method="GET">
        @csrf {{-- Protection contre les attaques CSRF --}}

        <h3>Formulaire pour l'édition d'addition</h3>

        <div class="mb-3">
            <label for="nomcli" class="form-label"><b>Nom du client</b></label>
            <input type="text" id="nomcli" name="nomcli" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="table_id" class="form-label"><b>Table</b></label>
            <input type="text" id="table_id" name="table_id" class="form-control">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label"><b>Date</b></label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn">Rechercher</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
    </form>
</div>
