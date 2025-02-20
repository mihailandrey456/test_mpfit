<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Легкий', 'Хрупкий', 'Тяжелый'];
        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->saveOrFail();
        }
    }
}
