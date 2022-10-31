<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'IsaKV',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('123456'),
            'admin' => true,
        ]);
        User::create([
            'name' =>'Cliente',
            'email' => 'Cliente@gmail.com',
            'password' => bcrypt('cliente'),
        ]);
    }
}
