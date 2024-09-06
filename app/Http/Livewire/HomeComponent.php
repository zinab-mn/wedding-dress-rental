<?php

namespace App\Http\Livewire;
use App\Models\Category;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = Category::All();
        return view('livewire.home-component',['categories'=>$categories])->layout('layouts.base');
    }
}
