<?php

namespace Database\Seeders;

use App\Models\ciudad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ciudad::create([ 'nombre' =>'Beni' ]);
        ciudad::create([ 'nombre' =>'Chuquisaca' ]);
        ciudad::create([ 'nombre' =>'Cochabamba' ]);
        ciudad::create([ 'nombre' =>'La Paz' ]);
        ciudad::create([ 'nombre' =>'Oruro' ]);
        ciudad::create([ 'nombre' =>'Pando' ]);
        ciudad::create([ 'nombre' =>'Potosi' ]);
        ciudad::create([ 'nombre' =>'Santa Cruz' ]);
        ciudad::create([ 'nombre' =>'Tarija' ]);
    }
}
