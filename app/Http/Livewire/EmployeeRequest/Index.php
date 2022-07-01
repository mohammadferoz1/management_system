<?php

namespace App\Http\Livewire\EmployeeRequest;

use Livewire\Component;
use Auth;
use App\Models\EmployeeRequest;

class Index extends Component
{
    public $requests;
    public function mount(){
        if(Auth::user()->group == "employee")
        {
            $this->requests = EmployeeRequest::where('user_id', Auth::id())->get();
        }
        else{
            $this->requests = EmployeeRequest::get();
        }
    }
    public function render()
    {
        return view('livewire.employee-request.index');
    }
}
