<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Site;
use App\Models\Task;
use Auth;

class Create extends Component
{
    public $sites;
    public $name;
    public $site_id;

    public function mount(){
        $this->sites = Site::all();
    }
    public function render()
    {
        return view('livewire.task.create');
    }
    public function store(){
        $validatedData = $this->validate([
            'name' => 'required',
            'site_id' => 'required',
        ]);
        Task::create([
            'name' => $this->name,
            'site_id' => $this->site_id,
            'created_by' => Auth::id()
        ]);
        session()->flash('message', 'Task successfully created.');
        return redirect()->route('task.index');
    }
}
