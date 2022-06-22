<?php

namespace App\Http\Livewire\Employeeexpense;
use App\Models\EmployeeExpense;
use Livewire\Component;

class Index extends Component
{
    public $employeeExpense;
    public function mount(){
        $this->employeeExpense = EmployeeExpense::all();
    }
    public function render()
    {
        return view('livewire.employeeexpense.index');
    }
    public function create(){
        return redirect()->route('employees-expense.create');
    }
    public function edit($id){
        return redirect()->route('employee-expense.edit', $id);
    }
}
