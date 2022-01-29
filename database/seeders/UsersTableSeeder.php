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
                'prenom'=>'Baba',
                'nom'=>'NGOM',
                'email'=>'admin@gmail.com',
                'telephone'=>'00221772050626',
                'adresse'=>'Liberté 6',
                'role'=>'admin',
                'password'=>Hash::make('ALAMEENjr@7'),
            ]
        ]);
    }
}
