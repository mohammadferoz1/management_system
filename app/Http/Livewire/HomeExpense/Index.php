<?php

namespace App\Http\Livewire\HomeExpense;

use Livewire\Component;
use App\Models\HomeExpense;

class Index extends Component
{
    public $homeExpenses;
    public function mount(){
        $this->homeExpenses = HomeExpense::all();
    }
    public function render()
    {
        return view('livewire.home-expense.index');
    }
    public function create(){

        return redirect()->route('home-expense.create');
    }
    public function edit($id){
        return redirect()->route('home-expense.edit', $id);
    }
}
