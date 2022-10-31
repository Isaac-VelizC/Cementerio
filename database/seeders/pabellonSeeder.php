<?php

namespace Database\Seeders;

use App\Models\Pabellon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pabellonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pabellon::create([ 'codigo' => 'PAB-101',]);
        Pabellon::create([ 'codigo' => 'PAB-201',]);
        Pabellon::create([ 'codigo' => 'PAB-301',]);
    }
}
