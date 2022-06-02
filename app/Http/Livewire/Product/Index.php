<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
class Index extends Component
{
    public $products;
    public function mount(){
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.product.index');
    }
    public function create(){

        return redirect()->route('product.create');
    }
    public function edit($id){
        return redirect()->route('product.edit', $id);
    }
}
