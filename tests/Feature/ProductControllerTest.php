<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function test_list_product_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('product.index'));

        $response->assertStatus(200);
        $response->assertViewIs('product.index');
    }
    public function test_new_product_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('product.create'));

        $response->assertStatus(200);
        $response->assertViewIs('product.create');
    }
    public function test_new_product_can_be_created()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Produto Teste',
            'price' => '100.00',
            'category_id' => Category::factory()->create()->id,
        ];

        $response = $this->actingAs($user)->post(route('product.store'), $data);

        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseHas('products', $data);
    }
    public function test_edit_product_screen_can_be_rendered()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('product.edit', $product->id));

        $response->assertStatus(200);
        $response->assertViewIs('product.edit');
    }
    public function test_product_can_be_updated()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['user_id' => $user->id]);

        $data = [
            'name' => 'Produto Atualizado',
            'price' => '150.00',
            'category_id' => $product->category_id,
        ];

        $response = $this->actingAs($user)->put(route('product.update', $product->id), $data);

        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseHas('products', $data);
    }
    public function test_product_can_be_deleted()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('product.destroy', $product->id));

        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
