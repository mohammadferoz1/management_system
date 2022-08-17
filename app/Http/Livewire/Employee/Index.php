<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];

    public function render()
    {
        $employees = User::where([['name', 'like', '%'.$this->search.'%'], ['group', 'employee']])
        ->orWhere([['email', 'like', '%'.$this->search.'%'], ['group', 'employee']])
        ->orWhere([['phone', 'like', '%'.$this->search.'%'], ['group', 'employee']])
        ->orWhere([['created_at', 'like', '%'.$this->search.'%'], ['group', 'employee']])
        ->orderBy('created_at', 'desc');
        $employees = $employees->paginate(10);
        return view('livewire.employee.index', ['employees' => $employees]);
    }

    public function create(){
        return redirect()->route('employee.create');
    }

    public function edit($id){
        return redirect()->route('employee.edit', ['id' => $id]);
    }
}
