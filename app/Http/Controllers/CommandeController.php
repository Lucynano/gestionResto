<?php

namespace App\Http\Controllers;

use \App\Models\Commande;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Table;

class CommandeController extends Controller
{
    // afficher toutes les commandes 

    public function index(Request $request) {
        $query = Commande::query();

        // Filtrer par recherche si un terme est fourni
        if ($request->has('search') && $request->search != '') {
            $query->where('nomcli', 'like', '%' . $request->search . '%'); // recherche en utilisant like avec '%' . $var . '%'
        }

        $commandes = $query->get(); 
        return view('commandes.index', compact('commandes')); // elle envoie ces donnees vers la vue 'commandes.index' en utilisant compact() pour rendre $commandes dispo dans la vue
    }

    // afficher une commande specifique 

    public function show($id) {
        $commande = \App\Models\Commande::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('commandes.show', compact('commande')); // si trouve, la commande est envoyee vers la vue 'commandes.show'
    }

    // afficher le formulaire de creation 

    public function create() {
        $menus = Menu::all();  // Récupérer tous les menus
        $tables = Table::all(); // Récupérer toutes les tables

        return view('commandes.create', compact('menus', 'tables')); // rediriger vers cette vue
    }

    // enregistrer une nouvelle commande 

    public function store(Request $request) {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id', // verifie seulement l'existence
            'table_id' => 'nullable|exists:tables,id',  // verifie seulement l'existence
            'nomcli' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'unite' => 'required|integer', // obligatoire, entier
            'typecom' => 'required|string', // obligatoire, chaine de caractere
            'datecom' => 'nullable|date', // verifie que c'est une date valide
        ]);

        if($validated['typecom'] == 'A emporter') // si A emporter (1) => id = null
            $validated['table_id'] = null;

        Commande::create($validated); // envoye de ces donnees vers la bases de donnees

        return redirect()->route('commandes.index')->with('success', 'commande créée avec succès !'); // redirection vers la vue (liste des commandes) avec une petite message de succes
    }

    // afficher le formulaire d edition 

    public function edit($id) {
        $menus = Menu::all();  // Récupérer tous les menus
        $tables = Table::all(); // Récupérer toutes les tables

        $commande = Commande::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        return view('commandes.edit', compact('commande','menus', 'tables')); // si trouve, la commande est envoye vers la vue 'commandes.edit' (formulaire) et les champs du formulaire est deja rempli avec les anciennes donnees
    }

    // mettre a jour une commande existante 

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id', // verifie seulement l'existence
            'table_id' => 'nullable|exists:tables,id',  // verifie seulement l'existence
            'nomcli' => 'required|string|max:255', // obligatoire, chaine de caractere, lenght<=255
            'unite' => 'required|integer', // obligatoire, entier
            'typecom' => 'required|string', // obligatoire, chaine de caractere
            'datecom' => 'nullable|date', // verifie que c'est une date valide
        ]);

        if($validated['typecom'] == 'A emporter') // si A emporter (1) => id = null
            $validated['table_id'] = null;

        $commande = Commande::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $commande->update($validated); // mise a jour d un commande apres avoir rempli les champs

        return redirect()->route('commandes.index')->with('success', 'commande mise à jour avec succès !'); // redirection vers la vue (liste des commandes) avec une petite message de succes
    }

    // supprimer un commande 

    public function destroy($id) {
        $commande = Commande::findOrFail($id); // chercher le id correspondant et si non trouve, error 404
        $commande->delete(); // si trouve, on le supprime

        return redirect()->route('commandes.index')->with('success', 'commande supprimé avec succès !'); // redirection vers la vue (liste des commandes) avec une petite message de succes
    }
}
