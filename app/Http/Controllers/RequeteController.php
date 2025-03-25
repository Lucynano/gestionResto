<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Menu;

class RequeteController extends Controller
{
    public function index() {
        return view('requetes.index'); // Charge index.blade.php dans le dossier requetes
    }

    public function listeCli(Request $request) {
        $validated = $request->validate([
            'date' => 'nullable|date', // verifie que c'est une date valide
            'date1' => 'nullable|date', // verifie que c'est une date valide
            'date2' => 'nullable|date', // verifie que c'est une date valide
        ]);

        // Récupération des commandes selon les filtres fournis
        $query = Commande::orderBy('datecom');

        if (!empty($validated['date']) && empty($validated['date1']) && empty($validated['date2'])) {
            $query->whereDate('datecom', $validated['date']);
        } elseif (empty($validated['date']) && !empty($validated['date1']) && !empty($validated['date2'])) {
            $query->whereBetween('datecom', [$validated['date1'], $validated['date2']]);
        } else {
            return redirect()->back()->with('error', 'Veuillez saisir une date unique OU un intervalle de dates');
        }

        $commandes = $query->get();

        return view('requetes.listeCli', compact('commandes'));
    }

    public function addition(Request $request) {
        $validated = $request->validate([
            'nomcli' => 'required|string',
            'table_id' => 'required|string',
        ]);
    
        // Récupération des commandes filtrées
        $additions = DB::table('menus')
            ->join('commandes', 'commandes.menu_id', '=', 'menus.id')
            ->select('menus.nomplat', 'menus.pu', 'commandes.unite', DB::raw('menus.pu * commandes.unite as total'))
            ->where('commandes.nomcli', $validated['nomcli'])
            ->where('commandes.table_id', $validated['table_id'])
            ->orderBy('menus.nomplat')
            ->get();
    
        return view('requetes.addition', compact('additions'));
    }
   
}


