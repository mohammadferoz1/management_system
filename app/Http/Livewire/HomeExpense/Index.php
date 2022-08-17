<?php

namespace App\Http\Livewire\HomeExpense;

use Livewire\Component;
use App\Models\HomeExpense;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];
    public function render()
    {
        
        $homeExpenses = HomeExpense::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('price', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orderBy('created_at', 'desc');

        $homeExpenses = $homeExpenses->paginate(10);
        return view('livewire.home-expense.index', ['homeExpenses' => $homeExpenses]);
    }
    public function create(){

        return redirect()->route('home-expense.create');
    }
    public function edit($id){
        return redirect()->route('home-expense.edit', $id);
    }
}
