<?php

namespace App\Http\Livewire\HomeExpense;

use Livewire\Component;
use App\Models\HomeExpense;

class Edit extends Component
{
    public $product_detail;
    public $name;
    public $price;

    public function mount($id){
        $this->product_detail = HomeExpense::find($id);
        $this->name = $this->product_detail->name;
        $this->price = $this->product_detail->price;
    }
    public function render()
    {
        return view('livewire.home-expense.edit');
    }
    public function update(){
        $this->validate([
            'name' => 'required|string',
            'price' => 'required|integer'
        ]);
        HomeExpense::find($this->product_detail->id)->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);
        session()->flash('message', 'Home Expense successfully updated.');
        return redirect()->route('home-expense.index');
    }
}
