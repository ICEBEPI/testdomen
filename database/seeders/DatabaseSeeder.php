<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


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
     $this->call([
        BrandSeeder::class,
        CarSeeder::class,
        TypeEngineSeeder::class,
        EngineSeeder::class,
        CitySeeder::class,
        ClientSeeder::class
     ]);
    }
}
