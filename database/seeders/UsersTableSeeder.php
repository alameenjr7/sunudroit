<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'prenom'=>'SunuDroit',
                'nom'=>'ADMIN',
                'email'=>'admin@gmail.com',
                'telephone'=>'00221 78 107 53 53',
                'adresse'=>'Cite keur goorgui',
                'role'=>'admin',
                'password'=>Hash::make('ALAMEENjr@7'),
            ]
        ]);
    }
}
