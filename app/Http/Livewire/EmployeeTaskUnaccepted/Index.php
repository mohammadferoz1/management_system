<?php

namespace App\Http\Livewire\EmployeeTaskUnaccepted;

use Livewire\Component;

use Auth;
use App\Models\Task;
use App\Models\TaskEmployee;

class Index extends Component
{
    public $employee_tasks;
    public function mount(){
        $user_id = Auth::id();
        $this->employee_tasks = Task::whereStatus('not accepted')->orWhereStatus('pending')->where('num_of_workers', '>' , '')->whereDoesntHave('taskEmployees',function ($query) use ($user_id) {
            $query->where('user_id','=', $user_id);
        })->get();
    }
    public function taskUpdate($id){
        TaskEmployee::create([
            'task_id' => $id,
            'user_id' => Auth::user()->id,

        ]);
        $task = Task::find($id);
        if($task->taskEmployees->count() > 0)
        {
            $task->status = 'pending';
            $task->save();
        }
        $user_id = Auth::id();
        $this->employee_tasks = Task::whereStatus('not accepted')->whereDoesntHave('taskEmployees',function ($query) use ($user_id) {
            $query->where('user_id','=', $user_id);
        })->get();


    }
    public function render()
    {
        return view('livewire.employee-task-unaccepted.index');
    }
}
