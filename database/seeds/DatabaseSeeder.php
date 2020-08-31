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
        DB::table('categories')->insert([
            'category' => 'Technology',
            'slug' => 'technology',
        ]);
        DB::table('categories')->insert([
            'category' => 'Art',
            'slug' => 'art',
        ]);
        DB::table('categories')->insert([
            'category' => 'Sports',
            'slug' => 'sport',
        ]);
        DB::table('categories')->insert([
            'category' => 'Health',
            'slug' => 'health',
        ]);
        DB::table('categories')->insert([
            'category' => 'History',
            'slug' => 'history',
        ]);
    }
}
