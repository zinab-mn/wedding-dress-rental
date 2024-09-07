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
        $product_id = range(1, 22);
        shuffle($product_id);
        foreach($product_id as $id){
            \App\Models\AttributeValue::factory()->create([
            'product_id' =>  $id ,
            'product_attribute_id' =>  1  ,
            'value' =>  'L',
            ]);
            \App\Models\AttributeValue::factory()->create([
                'product_id' =>  $id ,
                'product_attribute_id' =>  1  ,
                'value' =>  'M',
                ]);
            \App\Models\AttributeValue::factory()->create([
                'product_id' =>  $id ,
                'product_attribute_id' =>  1  ,
                'value' =>  'XL',
                ]);
        }
    }
}
