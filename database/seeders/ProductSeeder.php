<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $fake_products = [
        ["name" => 'Coca Café', "category_id" => 1],
        ["name" => 'Água mineral', "category_id" => 1],
        ["name" => 'Chocolate', "category_id" => 2],
        ["name" => 'Arroz Integral', "category_id" => 2],
        ["name" => 'Cotonete', "category_id" => 3],
        ["name" => 'Sabão em pó', "category_id" => 3],
        ["name" => 'Roupão feminino', "category_id" => 4],
        ["name" => 'Camisa social masculina', "category_id" => 4],
        ["name" => 'Boneca Barbie', "category_id" => 5],
        ["name" => 'Dinossauro T-REX', "category_id" => 5],
    ];
    public function run(): void
    {
        foreach ($this->fake_products as $product) {

            Product::factory()->create([
                "name" => $product['name'],
                "price" => fake()->randomFloat(2,10,100),
                "category_id" => $product['category_id'],
                "user_id" => User::find(1)->id,

            ]);
        }
    }
}
