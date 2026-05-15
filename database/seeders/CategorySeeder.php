<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Teknologi',
            'Pendidikan',
            'Fiksi',
            'Bisnis & Ekonomi',
            'Sains & Alam',
            'Komik',
            'Novel',
            'Pengembangan Diri'
        ];

        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);
        }
    }
}
