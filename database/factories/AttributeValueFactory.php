<?php

namespace Database\Factories;
use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = AttributeValue::class;
    public function definition()
    {
        $product_id = $this->faker->unique(true)->numberBetween(1,22);
        $product_attribute_id  = 1 ;
        $value  = 'L' ;
        return [
            'product_id' =>  $product_id ,
            'product_attribute_id' =>  $product_attribute_id  ,
            'value' =>  $value  ,
        ];
    }
}
