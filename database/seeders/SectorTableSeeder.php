<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create([
            'sector' =>'SEPULTURA TIERRA',
            'descripcion' => 'Cámaras construidas bajo rasante. Se ubican en parcelas, con los ornamentos y características previstas en las normas de edificación aplicables.',
        ]);
        Sector::create([
            'sector' =>'NICHOS',
            'descripcion' => 'Cavidades construidas dentro de un muro. Ofrecen una ventaja en el aprovechamiento del espacio de un cementerio ya que en ellos los ataúdes son depositados de forma horizontal.',
        ]);
    }
}
