<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        \App\Models\User::factory(1)->create();
        \App\Models\Categorie::factory(10)->create();
        \App\Models\Publication::factory(10)->create();
    }
}
