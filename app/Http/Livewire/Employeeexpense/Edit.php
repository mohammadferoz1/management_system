<?php

namespace App\Http\Livewire\Employeeexpense;
use App\Models\EmployeeExpense;
use App\Models\User;

use Livewire\Component;

class Edit extends Component
{
    public $employeeExpense;
    public $employees;
    public $Expemployee_id;
    public $type;
    public $price;
    public $employee_id;
    public $Exptype;
    public function mount($id){
        $this->employees = User::whereGroup('employee')->get();
        $this->employeeExpense = EmployeeExpense::whereId($id)->first();
        $this->Expemployee_id = $this->employeeExpense->employee_id;
        $this->Exptype = $this->employeeExpense->type;
        $this->price = $this->employeeExpense->price;
        $this->employee_id = $this->Expemployee_id;
        $this->type = $this->Exptype;
    }
    public function render()
    {
        return view('livewire.employeeexpense.edit');
    }
    public function update(){
        $employeeName =  User::whereId($this->employee_id)->first();
        $validatedData = $this->validate([
            'employee_id' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);
        EmployeeExpense::whereId($this->employeeExpense->id)->update([
            'name' => $employeeName->name,
            'employee_id' => $this->employee_id,
            'type' => $this->type,
            'price' => $this->price,
        ]);
        session()->flash('message', 'Employee Expense successfully created.');
        return redirect()->route('employees-expense.index');
    }
}
