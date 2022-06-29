<?php

namespace App\Http\Livewire\Employeeexpense;
use App\Models\EmployeeExpense;
use Livewire\Component;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];
    public function render()
    {
        $employeeExpense = EmployeeExpense::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('type', 'like', '%'.$this->search.'%')
        ->orWhere('price', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orderBy('created_at', 'desc');

        $employeeExpense = $employeeExpense->paginate(10);
        return view('livewire.employeeexpense.index', ['employeeExpense' => $employeeExpense]);
    }
    public function create(){
        return redirect()->route('employees-expense.create');
    }
    public function edit($id){
        return redirect()->route('employee-expense.edit', $id);
    }
}
