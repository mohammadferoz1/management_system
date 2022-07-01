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
    public function create(){
        return redirect()->route('request.create');
    }
    public function edit($id)
    {
        return redirect()->route('request.edit', $id);
    }
    public function approve($id){
        EmployeeRequest::whereId($id)->update([
            'status' => 'approved_and_in_pending',
        ]);
        $this->requests = EmployeeRequest::get();
    }

    public function completed($id){
        EmployeeRequest::whereId($id)->update([
            'status' => 'completed',
        ]);
        $this->requests = EmployeeRequest::get();
    }
}
