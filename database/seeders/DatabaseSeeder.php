<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([CategorySeeder::class, UserSeeder::class, PostSeeder::class]);

        // User::factory()->create([
        //     'name' => 'Arindan',
        //     "username" => "indantampan",
        //     'email' => 'arindan@gmail.com',
        // ]);
    }
}