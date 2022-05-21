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
        $this->employee_tasks = Task::whereEmployeeAcceptanceStatus('not accepted')
        ->orWhere('employee_acceptance_status', 'partially accepted')
        ->whereStatus('pending')
        ->whereDoesntHave('taskEmployees',function ($query) use ($user_id) {
            $query->where('user_id','=', $user_id);
        })->get();
    }
    public function taskUpdate($id){
        TaskEmployee::create([
            'task_id' => $id,
            'user_id' => Auth::user()->id,

        ]);
        $task = Task::find($id);
        if($task->taskEmployees->count() < $task->num_of_workers)
        {
            $task->employee_acceptance_status = 'partially accepted';
            $task->save();
        }
        else
        {
            $task->employee_acceptance_status = 'accepted by all';
            $task->save();
        }
        $user_id = Auth::id();
        $this->employee_tasks = Task::whereStatus('not accepted')->whereDoesntHave('taskEmployees',function ($query) use ($user_id) {
            $query->where('user_id','=', $user_id);
        })->get();
        session()->flash('message', 'Task has been accepted.');
        return redirect()->route('employee-task-accepted.index');

    }
    public function render()
    {
        return view('livewire.employee-task-unaccepted.index');
    }
}
