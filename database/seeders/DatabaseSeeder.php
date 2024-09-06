<?php

namespace Database\Seeders;

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
        \App\Models\Category::factory(2)->create();
        \App\Models\Product::factory(22)->create();
        \App\Models\ProductAttribute::factory(1)->create();
        \App\Models\AttributeValue::factory(22)->create();
    }
}
