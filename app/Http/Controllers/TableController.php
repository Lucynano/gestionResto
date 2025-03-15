<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller {

    // Afficher toutes les Tables 

    public function index() {
        $tables = \App\Models\Table::all(); // recuperer toutes les tables depuis la base de donnees
        return view('tables.index', compact('tables')); // elle envoie ces donnees vers la vue 'tables.index' en utilisant compact() pour rendre $tables dispo dans la vue
    }

    // Afficher une Table specifique 

    public function show($id) {
        $tables = \App\Models\Table::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('tables.show', compact('tables')); // si trouve, la table est envoyee vers la vue 'tables.show'
    }

    // Afficher le formulaire de creation 

    public function create() {
        return view('tables.create'); // rediriger vers cette vue
    }

    // Enregistrer une nouvelle Table 

    public function store(Request $request) {
        $validated = $request->validate([
            'designation' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'occupation' => 'required|string|in:libre,non', // obligatoire, 0 ou 1 (libre ou non)
        ]);

        $validated['occupation'] = $validated['occupation'] === 'libre' ? 0 : 1; // Convertir "libre" en 0 et "non" en 1

        \App\Models\Table::create($validated); // envoye de ces donnees vers la bases de donnees

        return redirect()->route('tables.index')->with('success', 'Table créée avec succès !'); // redirection vers la vue (liste des tables) avec une petite message de succes
    }

    // Afficher le formulaire d edition 

    public function edit($id) {
        $tables = \App\Models\Table::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('tables.edit', compact('tables')); // si trouve, la table est envoyee vers la vue 'tables.edit' (formulaire) et les champs du formulaire est deja rempli avec les anciennes donnees
    }

    // Mettre a jour une Table existante 

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'designation' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'occupation' => 'required|string|in:libre,non', // obligatoire, 0 ou 1 (libre ou non)
        ]);

        $validated['occupation'] = $validated['occupation'] === 'libre' ? 0 : 1; // Convertir "libre" en 0 et "non" en 1

        \App\Models\Table::create($validated); // envoye de ces donnees vers la bases de donnees

        $tables = \App\Models\Table::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $tables->update($validated); // mise a jour d une table apres avoir rempli les champs

        return redirect()->route('tables.index')->with('success', 'Table mise à jour avec succès !'); // redirection vers la vue (liste des tables) avec une petite message de succes
    }

    // Supprimer une Table 

    public function destroy($id) {
        $tables = \App\Models\Table::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $tables->delete(); // si trouve, on le supprime

        return redirect()->route('tables.index')->with('success', 'Table supprimée avec succès !'); // redirection vers la vue (liste des tables) avec une petite message de succes
    }
    
}

