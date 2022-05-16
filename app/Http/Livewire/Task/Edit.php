<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\Site;

class Edit extends Component
{
    public $task;
    public $name;
    public $site_id;
    public function mount($id){
        $this->task = Task::find($id);
        $this->name = $this->task->name;
        $this->site_id = $this->task->site_id;
        $this->sites = Site::all();
        $this->render();
    }
    public function render()
    {
        return view('livewire.task.edit');
    }
    public function update(){
        $validatedData = $this->validate([
            'name' => 'required',
            'site_id' => 'required',
        ]);
        Task::find($this->task->id)->update([
            'name' => $this->name,
            'site_id' => $this->site_id,
        ]);
        session()->flash('message', 'Task successfully updated.');
        return redirect()->route('task.index');
    }

}
