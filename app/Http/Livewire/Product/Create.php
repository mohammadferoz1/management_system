<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Create extends Component
{
    public $products= [];
    public $prices = [];

    public function mount(){
        $this->products = [];
        $this->prices = [];
        $this->optionCount = 1;

    }
    public function render()
    {
        return view('livewire.product.create');
    }
    public function store(){
        $this->validate([
            'products' => 'required|array|min:1',
            'products.*' => 'required|string',
            'prices' => 'required|array|min:1',
            'prices.*' => 'required|integer'
        ]);
        for($i = 0; $i < count($this->products); $i++)
        {
            Product::create([
                'name' => $this->products[$i],
                'price' => $this->prices[$i],
            ]);
        }
        session()->flash('message', 'Products successfully created.');
        return redirect()->route('product.index');


    }
}
