<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;

class Index extends Component
{
    public $tasks;
    public function mount(){
        $this->tasks = Task::all();
    }
    public function create(){

        return redirect()->route('task.create');
    }
    public function edit($id){
        return redirect()->route('task.edit', ['id' => $id]);
    }
    public function render()
    {
        return view('livewire.task.index');
    }
}
