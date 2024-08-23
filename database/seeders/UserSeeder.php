<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create();
        
        User::factory()->create([
            "name" => 'admin',
            "email" => 'admin@admin.com',
            "password" => 'password',
            "is_admin" => true,
        ]);

    }
}
