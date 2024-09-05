<?php

namespace Database\Seeders;
use App\Models\category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories= [
            ['id' => '1','name' => 'Inicio'],
            ['id' => '2','name' => 'Qué hacemos - Info'],
            ['id' => '3','name' => 'Qué hacemos - Lineas'],
            ['id' => '4','name' => 'EDT - Info'],
            ['id' => '5','name' => 'EDT - Elemento'],
            ['id' => '6','name' => 'Boletin - Info'],
            ['id' => '7','name' => 'Boletin - Elemento'],
        ];

        foreach ($categories as $category){
            category::create($category);
        }

    }
}
