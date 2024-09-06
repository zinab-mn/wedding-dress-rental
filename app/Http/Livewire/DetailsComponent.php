<?php

namespace App\Http\Livewire;
use App\Models\Reservation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class DetailsComponent extends Component
{
    public $slug ;
    public $attribute_values_id ;

    public function mount($slug){
        $this->slug = $slug;
        // $this->attribute_values_id  = 2;
    }
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::InRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->InRandomOrder()->limit(8)->get();
        $data = [
                'product' => $product,
                'popular_products' => $popular_products,
                'related_products' => $related_products
                  ];
        return view('livewire.details-component',$data)->layout('layouts.base');
    }
}
