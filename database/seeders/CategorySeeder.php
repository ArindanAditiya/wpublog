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
        Category::create([
            "name" => "Fikih",
            "slug" => "fikih"
        ]);
        Category::create([
            "name" => "Ilmu Tasawuf",
            "slug" => "ilmu-tasawuf"
        ]);
        Category::create([
            "name" => "Ilmu Hadits",
            "slug" => "ilmu-hadits"
        ]);
        Category::create([
            "name" => "Al-qur'an",
            "slug" => "al-qur'an"
        ]);
        Category::create([
            "name" => "Akhlaq",
            "slug" => "akhlaq"
        ]);
        Category::create([
            "name" => "Nahwu Shorof",
            "slug" => "nahwu-shorof"
        ]);
    }
}
