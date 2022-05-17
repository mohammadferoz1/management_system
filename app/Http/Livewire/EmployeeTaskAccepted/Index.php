<?php

namespace App\Http\Livewire\EmployeeTaskAccepted;

use Livewire\Component;
use Auth;
use App\Models\Task;

class Index extends Component
{
    public $employee_tasks;
    public function mount(){
        $user_id = Auth::id();
        $this->employee_tasks = Task::whereHas('taskEmployees',function ($query) use ($user_id) {
            $query->where('user_id','=', $user_id);
        })->get();
    }
    public function render()
    {
        return view('livewire.employee-task-accepted.index');
    }
}
