<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];
   
    public function create(){

        return redirect()->route('task.create');
    }
    public function edit($id){
        return redirect()->route('task.edit', ['id' => $id]);
    }
    public function view($id){
        return redirect()->route('task.view', ['id' => $id]);
    }
    public function render()
    {
        $tasks = Task::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('num_of_workers', 'like', '%'.$this->search.'%')
        ->orWhere('start_at', 'like', '%'.$this->search.'%')
        ->orWhere('end_at', 'like', '%'.$this->search.'%')
        ->orWhere('status', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orWhereHas('site', function ($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orderBy('created_at', 'desc');

        $tasks = $tasks->paginate(10);
        return view('livewire.task.index', ['tasks' => $tasks]);
    }
}
