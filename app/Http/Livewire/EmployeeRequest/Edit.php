<?php

namespace App\Http\Livewire\EmployeeRequest;

use Livewire\Component;
use App\Models\EmployeeRequest;

class Edit extends Component
{
    public $name;
    public $description;
    public $request;
    public $site_id;
    public function mount($id)
    {
        $this->request = EmployeeRequest::whereId($id)->first();
        $this->name = $this->request->name;
        $this->description = $this->request->description;
        $this->site_id = $this->request->site_id;
    }
    public function render()
    {
        return view('livewire.employee-request.edit');
    }
    public function Update()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'site_id' => 'required'
        ]);
        EmployeeRequest::whereId($this->request->id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'site_id' => $this->site_id
        ]);
        session()->flash('message', 'Request successfully updated.');
        return redirect()->route('request.index');
    }
}
