<?php

namespace App\Http\Livewire\Employeeexpense;

use Livewire\Component;
use App\Models\User;
use App\Models\EmployeeExpense;

class Create extends Component
{
    public $employees;
    public $employee_id;
    public $type;
    public $description;
    public $price;
    public function mount(){
        $this->employees = User::whereGroup('employee')->get();
    }
    public function render()
    {
        return view('livewire.employeeexpense.create');
    }
    public function store(){
        $employeeName =  User::whereId($this->employee_id)->first();
        $validatedData = $this->validate([
            'employee_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        EmployeeExpense::create([
            'name' => $employeeName->name,
            'employee_id' => $this->employee_id,
            'type' => $this->type,
            'description' => $this->description,
            'price' => $this->price,
        ]);
        session()->flash('message', 'Employee Expense successfully created.');
        return redirect()->route('employees-expense.index');
    }
}
