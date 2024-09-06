<?php

namespace App\Models;
use App\Models\User;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'attribute_values_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
