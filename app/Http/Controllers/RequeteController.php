<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class RequeteController extends Controller
{
    public function index() {
        return view('requetes.index'); // Charge index.blade.php dans le dossier requetes
    }

    public function listeCli(Request $request) {
        $validated = $request->validate([
            'date' => 'nullable|date',
            'date1' => 'nullable|date',
            'date2' => 'nullable|date|required_with:date1|after_or_equal:date1',

        ]);
    
        // Vérifier que l'utilisateur ne mélange pas date unique et intervalle
        if (!empty($validated['date']) && (!empty($validated['date1']) || !empty($validated['date2']))) {
            return redirect()->back()->withErrors(['date' => 'Veuillez choisir soit une date unique, soit un intervalle de dates.']);
        }
    
        $query = Commande::orderBy('datecom');
    
        if (!empty($validated['date'])) {
            $query->whereDate('datecom', $validated['date']);
        } elseif (!empty($validated['date1']) && !empty($validated['date2'])) {
            $query->whereBetween('datecom', [$validated['date1'], $validated['date2']]);
        } else {
            return redirect()->back()->withErrors(['date' => 'Veuillez entrer une date ou un intervalle valide.']);
        }
    
        $commandes = $query->get();
    
        return view('requetes.listeCli', compact('commandes'));
    }
    
    public function addition(Request $request) {
        $validated = $request->validate([
            'nomcli' => 'required|string|exists:commandes,nomcli',
            'table_id' => 'nullable|exists:tables,id',
            'date' => 'nullable|date',
        ]);
    
        $query = Commande::join('menus', 'commandes.menu_id', '=', 'menus.id')
            ->select(
                'menus.nomplat',
                'menus.pu',
                'commandes.unite',
                DB::raw('menus.pu * commandes.unite as total')
            )
            ->where('commandes.nomcli', $validated['nomcli'])
            ->where(function ($query) use ($validated) {
                $query->where('commandes.table_id', $validated['table_id'])
                      ->orWhereNull('commandes.table_id');
            })
            ->whereDate('commandes.datecom', $validated['date']);
    
        $additions = $query->get();
    
        $totalGeneral = $additions->sum('total');
    
        return view('requetes.addition', compact('additions', 'totalGeneral', 'validated'));
    }

    public function recetteTotal() {
        $query = Commande::join('menus', 'commandes.menu_id', '=', 'menus.id')
        ->select(
            'menus.nomplat',
            'menus.pu',
            DB::raw('SUM(commandes.unite) as sommeUnite'), 
            DB::raw('SUM(menus.pu * commandes.unite) as total')
        )
        ->groupBy('menus.nomplat', 'menus.pu');

        $recettes = $query->get(); // select nomplat, pu, sum(unite), sum(pu*unite) total from commandes join menus on commandes.menu_id=menus.id group by nomplat

        $totalGeneral = $recettes->sum('total');

    return view('requetes.recetteTotal', compact('recettes', 'totalGeneral'));
    }

    public function listePlat() {
        $query = Commande::join('menus', 'commandes.menu_id', '=', 'menus.id')
        ->select(
            'menus.nomplat',
            'menus.pu',
            DB::raw('SUM(commandes.unite) as sommeUnite'), 
            DB::raw('SUM(menus.pu * commandes.unite) as total')
        )
        ->groupBy('menus.nomplat', 'menus.pu')
        ->orderBy('sommeUnite', 'desc')
        ->limit(10);

        $plats = $query->get(); // select nomplat, sum(unite) from commandes join menus on commandes.menu_id=menus.id group by nomplat order by sum(unite) desc limit 10;


        return view('requetes.listePlat', compact('plats'));
    }
    
   
}


