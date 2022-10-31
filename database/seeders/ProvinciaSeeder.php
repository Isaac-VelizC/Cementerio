<?php

namespace Database\Seeders;

use App\Models\provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        provincia::create([ 'nombre' =>'Cercado capital San Javier', 'ciudad_id' => 1 ]);
        provincia::create([ 'nombre' =>'Antonio Vaca Díez capital Riberalta', 'ciudad_id' => 1 ]);
        provincia::create([ 'nombre' =>'Mariscal José Ballivián Segurola capital antos Reyes', 'ciudad_id' => 1 ]);
        provincia::create([ 'nombre' =>'Yacuma capital Santa Ana de Yacuma', 'ciudad_id' => 1 ]);
        provincia::create([ 'nombre' =>'Moxos capital San Ignacio de Moxos', 'ciudad_id' => 1 ]);
        provincia::create([ 'nombre' =>'Oropeza capital Sucre', 'ciudad_id' => 2 ]);
        provincia::create([ 'nombre' =>'Azurduy capital Azurduy', 'ciudad_id' => 2 ]);
        provincia::create([ 'nombre' =>'Zudañes capital Villa Zudáñez', 'ciudad_id' => 2 ]);
        provincia::create([ 'nombre' =>'Tomina capital Padilla', 'ciudad_id' => 2 ]);
        provincia::create([ 'nombre' =>'Hernando Siles capital Monteagudo', 'ciudad_id' => 2 ]);
        provincia::create([ 'nombre' =>'Arani capital Arani', 'ciudad_id' => 3 ]);
        provincia::create([ 'nombre' =>'Esteban Arce capital Tarata', 'ciudad_id' => 3 ]);
        provincia::create([ 'nombre' =>'Arque capital Arque', 'ciudad_id' => 3 ]);
        provincia::create([ 'nombre' =>'Ayopaya capital Villa Independencia', 'ciudad_id' => 3 ]);
        provincia::create([ 'nombre' =>'Campero capital Aiquile', 'ciudad_id' => 3 ]);
        provincia::create([ 'nombre' =>'Aroma capital Sica Sica', 'ciudad_id' => 4 ]);
        provincia::create([ 'nombre' =>'Bautista Saavedra capital Charazani', 'ciudad_id' => 4 ]);
        provincia::create([ 'nombre' =>'Abel Iturralde capital Ixiamas', 'ciudad_id' => 4 ]);
        provincia::create([ 'nombre' =>'Caranavi capital Caranavi', 'ciudad_id' => 4 ]);
        provincia::create([ 'nombre' =>'Eliodoro Camacho capital Puerto Acosta', 'ciudad_id' => 4 ]);
        provincia::create([ 'nombre' =>'capital Sabaya', 'ciudad_id' => 5 ]);
        provincia::create([ 'nombre' =>'Carangas capital Corque', 'ciudad_id' => 5 ]);
        provincia::create([ 'nombre' =>'Cercado capital Oruro', 'ciudad_id' => 5 ]);
        provincia::create([ 'nombre' =>'Eduardo Avaroa capital Challapata', 'ciudad_id' => 5 ]);
        provincia::create([ 'nombre' =>'Ladislao Cabrera capital Salinas de Garcí Mendoza', 'ciudad_id' => 5 ]);
        provincia::create([ 'nombre' =>'Abuná capital Santa Rosa de Abuná', 'ciudad_id' => 6 ]);
        provincia::create([ 'nombre' =>'Federico Román capital Fortaleza', 'ciudad_id' => 6 ]);
        provincia::create([ 'nombre' =>'Madre de Dios capital Puerto Gonzales Moreno', 'ciudad_id' => 6 ]);
        provincia::create([ 'nombre' =>'Manuripi capital Puerto Rico', 'ciudad_id' => 6 ]);
        provincia::create([ 'nombre' =>'Nicolás Suárez capital Porvenir', 'ciudad_id' => 6 ]);
        provincia::create([ 'nombre' =>'Antonio Quijarro capital Uyuni', 'ciudad_id' => 7 ]);
        provincia::create([ 'nombre' =>'Charcas capital San Pedro de Buena Vista', 'ciudad_id' => 7 ]);
        provincia::create([ 'nombre' =>'Daniel Saavedra capital Llica', 'ciudad_id' => 7 ]);
        provincia::create([ 'nombre' =>'Modesto Omiste capital Villazón', 'ciudad_id' => 7 ]);
        provincia::create([ 'nombre' =>'Tomás Frías capital Tinguipaya', 'ciudad_id' => 7 ]);
        provincia::create([ 'nombre' =>'Andrés Ibáñez capital Ciudad de Santa Cruz', 'ciudad_id' => 8 ]);
        provincia::create([ 'nombre' =>'Ignacio Warnes capital Warnes', 'ciudad_id' => 8 ]);
        provincia::create([ 'nombre' =>'José Miguel de Velasco capital San Ignacio', 'ciudad_id' => 8 ]);
        provincia::create([ 'nombre' =>'Ichilo capital Buena Vista', 'ciudad_id' => 8 ]);
        provincia::create([ 'nombre' =>'Chiquitos capital San José', 'ciudad_id' => 8 ]);
        provincia::create([ 'nombre' =>'Aniceto Arce capital Padcaya', 'ciudad_id' => 9 ]);
        provincia::create([ 'nombre' =>'Burdet O’Connor capital Entre Ríos', 'ciudad_id' => 9 ]);
        provincia::create([ 'nombre' =>'Cercado capital Tarija', 'ciudad_id' => 9 ]);
        provincia::create([ 'nombre' =>'Eustaquio Méndez capital San Lorenzo', 'ciudad_id' => 9 ]);
        provincia::create([ 'nombre' =>'Gran Chaco capital Yacuíba', 'ciudad_id' => 9 ]);
    }
}