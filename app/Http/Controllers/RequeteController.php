<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\View;

class RequeteController extends Controller
{
    public function index() {
        return view('requetes.index'); // Charge index.blade.php dans le dossier requetes
    }

    public function listeCli(Request $request) {
        // Validation des dates avec une meilleure gestion des erreurs
        $validated = $request->validate([
            'date'  => 'nullable|date',
            'date1' => 'nullable|date|required_with:date2|before_or_equal:date2', // Vérifie que date1 <= date2
            'date2' => 'nullable|date|required_with:date1|after_or_equal:date1', // Vérifie que date2 >= date1
        ], [
            'date1.before_or_equal' => 'La date de début doit être antérieure ou égale à la date de fin.',
            'date2.after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',
        ]);
    
        // Vérifier que l'utilisateur ne mélange pas date unique et intervalle
        if (!empty($validated['date']) && (!empty($validated['date1']) || !empty($validated['date2']))) {
            return redirect()->back()->withErrors(['date' => 'Veuillez choisir soit une date unique, soit un intervalle de dates.']);
        }
    
        // Construction de la requête
        $query = Commande::orderBy('datecom');
    
        if (!empty($validated['date'])) {
            $query->whereDate('datecom', $validated['date']);
        } elseif (!empty($validated['date1']) && !empty($validated['date2'])) {
            $query->whereBetween('datecom', [$validated['date1'], $validated['date2']]);
        } 
    
        // Récupération des commandes
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

        session([
            'additions' => $additions,
            'totalGeneral' => $totalGeneral,
            'validated' => $validated
        ]);      
    
        return view('requetes.addition', compact('additions', 'totalGeneral', 'validated'));
    }

    public function payer(Request $request, $table_id) {
        $table = Table::find($table_id); // Récupérer l'id
    
        // Vérifier si la table existe avant de modifier son occupation
        if ($table) {
            $table->update(['occupation' => false]); // Met à jour directement
        }

        return redirect()->route('requetes.addition'); // Redirige vers la vue des additions
    }



    public function telechargerPDF()
    {
        // Récupérer les données stockées dans la session
        $additions = session('additions', []);
        $totalGeneral = session('totalGeneral', 0);
        $validated = session('validated', []);

        // Générer le contenu HTML avec les données
        $html = View::make('requetes.addition-pdf', compact('additions', 'totalGeneral', 'validated'))->render();

        // Créer le PDF
        $pdf = SnappyPdf::loadHTML($html);

        // Télécharger le PDF
        return $pdf->download('addition.pdf');
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

    public function histogramme() {
        $sixMonthsAgo = Carbon::now()->subMonths(6)->toDateString();

        $query = Commande::join('menus', 'commandes.menu_id', '=', 'menus.id')
        ->select(
            DB::raw('DATE_FORMAT(commandes.datecom, "%Y-%m") as mois'),
            DB::raw('SUM(menus.pu * commandes.unite) as total')
        )
        ->where('commandes.datecom', '>=', $sixMonthsAgo)
        ->groupBy('mois')
        ->orderBy('mois')
        ->orderByRaw('mois ASC');

        $datas = $query->get(); // select date_format(datecom, '%Y-%m') as mois, sum(pu*unite) as total from commandes join menus on menus.id=commandes.menu_id where datecom>=date_sub(curdate(),interval 6 month) group by mois order by mois;

		// La vue "histogramme"
		return view("requetes.histogramme", compact('datas')); 
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


