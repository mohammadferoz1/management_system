<?php

namespace App\Http\Livewire\EmployeeRequest;

use Livewire\Component;
use App\Models\EmployeeRequest;
use App\Models\Site;
use Auth;

class Create extends Component
{
    public $name;
    public $description;
    public $site_id;

    public function mount(){
        $this->sites = Site::all();
    }
    public function render()
    {
        return view('livewire.employee-request.create');
    }

    public function store(){
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'site_id' => 'required'
        ]);
        EmployeeRequest::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => Auth::id(),
            'site_id' => $this->site_id,
            'status' => 'waiting_for_approval',
        ]);

        session()->flash('message', 'Request successfully created.');
        return redirect()->route('request.index');
    }
}
