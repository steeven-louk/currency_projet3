<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $paires = [
            ['devise_1' => 'USD', 'devise_2' => 'EUR', 'taux' => 0.85],
            ['devise_1' => 'EUR', 'devise_2' => 'USD', 'taux' => 1.18], // Paire en sens inverse
            ['devise_1' => 'USD', 'devise_2' => 'BTC', 'taux' => 0.00003],
            ['devise_1' => 'BTC', 'devise_2' => 'USD', 'taux' => 35000], // Paire en sens inverse
            ['devise_1' => 'EUR', 'devise_2' => 'BTC', 'taux' => 0.000035],
            ['devise_1' => 'BTC', 'devise_2' => 'EUR', 'taux' => 28571.42], // Paire en sens inverse
            // Ajoutez d'autres paires de devises si nécessaire
        ];

        // Insérer les paires dans la table paire
       DB::table('paires')->insert($paires);
    }
}
