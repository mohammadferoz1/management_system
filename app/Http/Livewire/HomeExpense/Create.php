<?php

namespace App\Http\Livewire\HomeExpense;

use Livewire\Component;
use App\Models\HomeExpense;

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
        return view('livewire.home-expense.create');
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
            HomeExpense::create([
                'name' => $this->products[$i],
                'price' => $this->prices[$i],
            ]);
        }
        session()->flash('message', 'Home Expense successfully created.');
        return redirect()->route('home-expense.index');


    }
}
