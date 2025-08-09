<?php

namespace Database\Seeders;

use App\Models\istifadeci;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([kategoriyaTableSeeder::class]);
        $this->call([mehsulTableSeeder::class]);
        $this->call([istifadeciTableSeeder::class]);

        istifadeci::factory()->create([
            'name' => 'Test istifadeci',
            'email' => 'test@example.com',
        ]);
    }
}
