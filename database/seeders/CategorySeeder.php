<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            'name' => 'легкий'
        ]);
        Category::insert([
            'name' => 'хрупкий'
        ]);
        Category::insert([
            'name' => 'тяжелый'
        ]);
    }
}
