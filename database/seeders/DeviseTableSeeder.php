<?php

namespace Database\Seeders;

use App\Models\Devises;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $devises =[
            ['name'=> 'USD'],
            ['name'=> 'EUR'],
            ['name'=> 'BTC']
        ];

        DB::table('devises')->insert($devises);
    }
}
