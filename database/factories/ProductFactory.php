<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
           'name' =>  $product_name ,
           'slug' =>  $slug ,
           'short_description' => $this->faker->text(100),
           'description' => $this->faker->text(200),
           'regular_price' => $this->faker->numberBetween(10,500),
           'SKU' => 'DIGI' . $this->faker->numberBetween(10,500),
           'stock_status' => 'instock',
           'quantity' => $this->faker->numberBetween(10,20),
           'image' => 'digital_' . $this->faker->unique()->numberBetween(1,22).'.jpg',
           'category_id' => $this->faker->numberBetween(1,2)
        ];
    }
}
