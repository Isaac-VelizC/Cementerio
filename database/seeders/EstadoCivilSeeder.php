<?php

namespace Database\Seeders;

use App\Models\estado_civil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estado_civil::create([ 'civil' =>'Soltero(a)' ]);
        estado_civil::create([ 'civil' =>'Casado(a)' ]);
        estado_civil::create([ 'civil' =>'Conviviente civil' ]);
        estado_civil::create([ 'civil' =>'Separado(a)' ]);
        estado_civil::create([ 'civil' =>'Divorciado(a)' ]);
        estado_civil::create([ 'civil' =>'Viudo(a)' ]);
    }
}
