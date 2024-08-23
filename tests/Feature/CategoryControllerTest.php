<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function test_list_categories_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('category.index'));

        $response->assertStatus(200);
        $response->assertViewIs('category.index');
    }
    public function test_new_category_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('category.create'));

        $response->assertStatus(200);
        $response->assertViewIs('category.create');
    }
    public function test_new_category_can_be_created()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Teste',
        ];

        $response = $this->actingAs($user)->post(route('category.store'), $data);

        $response->assertRedirect(route('category.index'));
        $this->assertDatabaseHas('categories', $data);
    }
    public function test_edit_category_screen_can_be_rendered()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->get(route('category.edit', $category->id));

        $response->assertStatus(200);
        $response->assertViewIs('category.edit');
    }
    public function test_category_can_be_updated()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $data = [
            'name' => 'Teste novo',
        ];

        $response = $this->actingAs($user)->put(route('category.update', $category->id), $data);

        $response->assertRedirect(route('category.index'));
        $this->assertDatabaseHas('categories', $data);
    }
    public function test_category_can_be_deleted()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->delete(route('category.destroy', $category->id));

        $response->assertRedirect(route('category.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
