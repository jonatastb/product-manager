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
    protected $fake_category_names = ['Bebidas', 'Alimentos', 'Higiene', 'Vestuário', 'Brinquedos'];
    public function run(): void
    {
        foreach ($this->fake_category_names as $name) {
            Category::factory()->create(["name" => $name]);
        }
    }
}
