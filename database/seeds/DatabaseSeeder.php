<?php

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
        DB::table('users')->insert([
            'name' => 'Pedro',
            'alias' => 'test97',
            'email' => 'test@test.com',
            'password' => Hash::make('probando'),
        ]);
        DB::table('users')->insert([
            'name' => 'Juan',
            'alias' => 'probando',
            'email' => 'probando@probando.com',
            'password' => Hash::make('probando'),
        ]);
        DB::table('categories')->insert([
            'category' => 'Tecnología',
            'slug' => 'tecnlogia',
        ]);
        DB::table('categories')->insert([
            'category' => 'Arte',
            'slug' => 'arte',
        ]);
        DB::table('categories')->insert([
            'category' => 'Deporte',
            'slug' => 'deporte',
        ]);
        DB::table('categories')->insert([
            'category' => 'Salud',
            'slug' => 'salud',
        ]);
    }
}
