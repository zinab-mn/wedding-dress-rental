<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    public function render()
    {
        $products = Product::paginate(12);
        $popular_products = Product::InRandomOrder()->limit(4)->get();

        $category = category::all();
        $data = ['products' => $products,
                 'category' => $category,
                 'popular_products' => $popular_products,

                 ];
        return view('livewire.shop-component', $data)->layout('layouts.base');
    }
}
