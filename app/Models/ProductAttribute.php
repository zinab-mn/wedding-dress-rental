<?php

namespace App\Models;
use App\Models\AttributeValue;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = 'product_attributes';
    public function attributeValue(){
        return $this->hasMany(AttributeValue::class);
    }
}
