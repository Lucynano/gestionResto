<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Les commandes artisan disponibles pour l'application.
     *
     * @var array
     */
    protected $commands = [
        // Enregistrer d'autres commandes ici
    ];

    /**
     * Configure les commandes de planification de l'application.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Planification des commandes si nécessaire
    }

    /**
     * Enregistrer les commandes pour l'application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    
        require base_path('routes/console.php');
    
        // Ajoutez ces lignes pour vous assurer que les commandes sont enregistrées
        $this->command('config:clear')->description('Clear the configuration cache');
        $this->command('cache:clear')->description('Clear the application cache');
    }

}
