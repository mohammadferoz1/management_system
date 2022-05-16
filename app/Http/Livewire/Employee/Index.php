<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $employees;

    public function mount(){
        $this->employees = User::whereGroup('employee')->get();
    }

    public function render()
    {
        return view('livewire.employee.index');
    }

    public function create(){
        return redirect()->route('employee.create');
    }

    public function edit($id){
        return redirect()->route('employee.edit', ['id' => $id]);
    }
}
