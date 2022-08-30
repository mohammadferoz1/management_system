<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Create extends Component
{
    public $products= [];
    public $prices = [];
    public $quantity = [];

    public function mount(){
        $this->products = [];
        $this->prices = [];
        $this->quantity = [];
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
            'prices.*' => 'required|integer',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer'
        ]);
        for($i = 0; $i < count($this->products); $i++)
        {
            Product::create([
                'name' => $this->products[$i],
                'price' => $this->prices[$i],
                'quantity' => $this->quantity[$i],
            ]);
        }
        session()->flash('message', 'Products successfully created.');
        return redirect()->route('product.index');


    }
}
