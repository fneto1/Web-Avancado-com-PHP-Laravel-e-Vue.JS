<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Wandão Marques',
            'email' => 'wandao@teste.com',
            'password' => '1234'

        ]);
    }
}
