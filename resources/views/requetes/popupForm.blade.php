<!-- formulaire pour la date -->

<div class="form-popup" id="myFormListeCli">
    <form action="{{ route('requetes.listeCli') }}" class="form-container" method="GET">
        @csrf {{-- protection contre les attaques CSRF --}}

        <label for="date" class="form-label"><b>Une date donnee</b></label>
        <input type="date" id="date" name="date" class="form-control">

        <label class="form-label"><b>Deux dates</b></label>
        <input type="date" id="date1" name="date1" class="form-control">
        <input type="date" id="date2" name="date2" class="form-control">

        <button type="submit" class="btn">Rechercher</button>
        <button type="button" class="btn cancel" onclick="closeForm('myFormListeCli')">Fermer</button>
    </form>
</div>

<!-- formulaire pour l addition -->

<div class="form-popup" id="myFormAddition">
    <form action="{{ route('requetes.addition') }}" class="form-container" method="GET">
        @csrf {{-- protection contre les attaques CSRF --}}

        <div class="mb-3">
            <label for="nomcli" class="form-label">Nom du client</label>
            <select id="nomcli" name="nomcli" class="form-control" required> {{-- choix entre designation deja existante --}}
                @if(isset($tables) && count($tables) > 0)
                    @foreach($tables as $table)
                        <option value="{{ $table->nomcli }}">{{ $table->nomcli }}</option>
                    @endforeach
                @else
                    <option disabled>Aucun client disponible</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="table_id" class="form-label">Table</label>
            <select id="table_id" name="table_id" class="form-control" required> {{-- choix entre designation deja existante --}}
                @if(isset($tables) && count($tables) > 0)
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->designation }}</option>
                    @endforeach
                @else
                    <option disabled>Aucune table disponible</option>
                @endif
            </select>
        </div>

        <label for="date" class="form-label"><b>Date</b></label>
        <input type="date" id="date" name="date" class="form-control">

        <button type="submit" class="btn">Rechercher</button>
        <button type="button" class="btn cancel" onclick="closeForm('myFormAddition')">Fermer</button>
    </form>
</div>

{{-- The script JS --}}

<script>
    document.querySelector('.form-container').addEventListener('submit', function(event) {
        let date = document.getElementById('date').value;
        let date1 = document.getElementById('date1').value;
        let date2 = document.getElementById('date2').value;

        if (!date && !date1 && !date2) {
            alert("Veuillez remplir au moins un champ.");
            event.preventDefault(); // Empêche l'envoi du formulaire
        }
    });
    
    function openForm($id) {
        document.getElementById($id).style.display ="block";
    }
    
    function closeForm($id) {
        document.getElementById($id).style.display = "none";
    } 
</script>