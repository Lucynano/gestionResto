<?php

namespace App\Http\Controllers;

use \App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {

    // afficher tous les Menus 

    public function index(Request $request) {
        $query = Menu::query();

        // Filtrer par recherche si un terme est fourni
        if ($request->has('search') && $request->search != '') {
            $query->where('nomplat', 'like', '%' . $request->search . '%'); // recherche en utilisant like avec '%' . $var . '%'
        }

        $menus = $query->get(); 
        return view('menus.index', compact('menus')); // elle envoie ces donnees vers la vue 'menus.index' en utilisant compact() pour rendre $menus dispo dans la vue
    }

    // afficher un menu specifique 

    public function show($id) {
        $menu = Menu::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('menus.show', compact('menu')); // si trouve, le menu est envoyee vers la vue 'menus.show'
    }

    // afficher le formulaire de creation 

    public function create() {
        return view('menus.create'); // rediriger vers cette vue
    }

    // enregistrer une nouvelle menu 

    public function store(Request $request) {
        $validated = $request->validate([
            'nomplat' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'pu' => 'required|string', // obligatoire, chaine de caractere
        ]);

        $validated['pu'] = intval($validated['pu']); // convertir pu string en int

        Menu::create($validated); // envoye de ces donnees vers la bases de donnees

        return redirect()->route('menus.index')->with('success', 'menu créé avec succès !'); // redirection vers la vue (liste des menus) avec une petite message de succes
    }

    // afficher le formulaire d edition 

    public function edit($id) {
        $menu = Menu::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('menus.edit', compact('menu')); // si trouve, le menu est envoye vers la vue 'menus.edit' (formulaire) et les champs du formulaire est deja rempli avec les anciennes donnees
    }

    // mettre a jour une menu existante 

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nomplat' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'pu' => 'required|string', // obligatoire, chaine de caractere
        ]);

        $validated['pu'] = intval($validated['pu']); // convertir pu string en int

        $menu = Menu::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $menu->update($validated); // mise a jour d un menu apres avoir rempli les champs

        return redirect()->route('menus.index')->with('success', 'menu mise à jour avec succès !'); // redirection vers la vue (liste des menus) avec une petite message de succes
    }

    // supprimer un menu 

    public function destroy($id) {
        $menu = Menu::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $menu->delete(); // si trouve, on le supprime

        return redirect()->route('menus.index')->with('success', 'menu supprimé avec succès !'); // redirection vers la vue (liste des menus) avec une petite message de succes
    }
    
}

