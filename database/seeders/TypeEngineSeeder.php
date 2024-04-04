<?php

namespace Database\Seeders;

use App\Models\TypeEngine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use TypeError;

class TypeEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'benzine',
            'diezel',
            'electric',
        ];

        foreach($types as $type)
        {
            TypeEngine::create([
                'name' => $type,
            ]);
        }
    }
}
