<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\Site;

class View extends Component
{
    public $task;
    public $name;
    public $site_name;
    public $start_at;
    public $end_at;
    public $employeesName;
    public function mount($id){
        $this->task = Task::whereId($id)->first();
        $this->employeesName = $this->task->taskEmployees->all();
        $this->site_name = Site::whereId($this->task->site_id)->first();
        $this->site_name = $this->site_name->name;
        $this->name = $this->task->name;
        $this->start_at = $this->task->start_at;
        $this->end_at = $this->task->end_at;
    }
    public function render()
    {
        return view('livewire.task.view');
    }
}
