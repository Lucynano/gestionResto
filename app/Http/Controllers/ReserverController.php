<?php

namespace App\Http\Controllers;

use \App\Models\Reserver;
use Illuminate\Http\Request;

use App\Models\Table;

class ReserverController extends Controller
{
    // afficher toutes les reservers 

    public function index(Request $request) {
        $query = Reserver::query();

        // Filtrer par recherche si un terme est fourni
        if ($request->has('search') && $request->search != '') {
            $query->where('nomcli', 'like', '%' . $request->search . '%'); // recherche en utilisant like avec '%' . $var . '%'
        }

        $reservers = $query->get(); 
        return view('reservers.index', compact('reservers')); // elle envoie ces donnees vers la vue 'reservers.index' en utilisant compact() pour rendre $reservers dispo dans la vue
    }

    // afficher une reserver specifique 

    public function show($id) {
        $reserver = Reserver::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('reservers.show', compact('reserver')); // si trouve, la reserver est envoyee vers la vue 'reservers.show'
    }

    // afficher le formulaire de creation 

    public function create() {
        $tables = Table::all(); // Récupérer toutes les tables

        return view('reservers.create', compact('tables')); // rediriger vers cette vue
    }

    // enregistrer une nouvelle reserver 

    public function store(Request $request) {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',  // verifie seulement l'existence
            'nomcli' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'date_reserve' => 'required|date', // verifie que c'est une date valide
            'heure' => 'required', // heure pour la datetime
            'minutes' => 'required', // minutes pour la datetime
        ]);

        $validated['date_reserve'] = $validated['date_reserve']. ' ' .$validated['heure']. ':' .$validated['minutes']. ':00'; // concatenation pour la stucture datetime (YYYY-MM-DD hh:mm:ss)

        // Vérifier si la table est déjà réservée à cette date et heure
        $existingReservation = Reserver::where('table_id', $validated['table_id'])
        ->where('date_reserve', $validated['date_reserve'])
        ->exists();

        if (!$existingReservation) {
            Reserver::create($validated); // envoye de ces donnees vers la bases de donnees

            return redirect()->route('reservers.index')->with('success', 'Réservation créée avec succès !');
        } else {
            \Log::alert("Table déjà réservée à cette date");

            return back()->withErrors(['table_id' => 'Cette table est déjà réservée à cette date.']);
        }
    }

    // afficher le formulaire d edition 

    public function edit($id) {
        $tables = Table::all(); // Récupérer toutes les tables

        $reserver = Reserver::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('reservers.edit', compact('reserver', 'tables')); // si trouve, la reserver est envoye vers la vue 'reservers.edit' (formulaire) et les champs du formulaire est deja rempli avec les anciennes donnees
    }

    // mettre a jour une reserver existante 

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',  // verifie seulement l'existence
            'nomcli' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'date_reserve' => 'required|date', // verifie que c'est une date valide
            'heure' => 'required', // heure pour la datetime
            'minutes' => 'required', // minutes pour la datetime
        ]);

        $validated['date_reserve'] = $validated['date_reserve']. ' ' .$validated['heure']. ':' .$validated['minutes']. ':00'; // concatenation pour la stucture datetime (YYYY-MM-DD hh:mm:ss)

        // Vérifier si la table est déjà réservée à cette date et heure
        $existingReservation = Reserver::where('table_id', $validated['table_id'])
        ->where('date_reserve', $validated['date_reserve'])
        ->where('id', '!=', $id) // Exclure la réservation actuelle
        ->exists();

        $reserver = Reserver::findOrFail($id); // chercher le id correspondant et si non trouve, error 404

        if (!$existingReservation) {
            $reserver->update($validated); // mise a jour d un reserver apres avoir rempli les champs

            return redirect()->route('reservers.index')->with('success', 'reserver mise à jour avec succès !'); // redirection vers la vue (liste des reservers) avec une petite message de succes
        } else {
            \Log::alert("Table déjà réservée à cette date");
            return back()->withErrors(['table_id' => 'Cette table est déjà réservée à cette date.']);
        }

        
    }

    // supprimer un reserver 

    public function destroy($id) {
        $reserver = Reserver::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $reserver->delete(); // si trouve, on le supprime

        return redirect()->route('reservers.index')->with('success', 'reserver supprimé avec succès !'); // redirection vers la vue (liste des reservers) avec une petite message de succes
    }
}
