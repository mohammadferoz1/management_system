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
    public $start_at;
    public $end_at;
    public $num_of_workers;

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
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'num_of_workers' => 'required',
        ],
            ['site_id.required' => 'Please select site name',
             'end_at.after' => 'End date should be after the start date'
            ]
        );
        Task::create([
            'name' => $this->name,
            'site_id' => $this->site_id,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'num_of_workers' => $this->num_of_workers,
            'created_by' => Auth::id()
        ]);
        session()->flash('message', 'Task successfully created.');
        return redirect()->route('task.index');
    }
}
