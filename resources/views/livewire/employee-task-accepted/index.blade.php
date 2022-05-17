<div>
    <x-page-title title="Accepted Task">
    </x-page-title>
    <x-table>
        <x-slot name="head">
            <x-table.row>
                <x-table.headings>
                    Name
                </x-table.headings>
                <x-table.headings>
                    Site Name
                </x-table.headings>
                <x-table.headings>
                    Start At
                </x-table.headings>
                <x-table.headings>
                    End At
                </x-table.headings>
                <x-table.headings>
                     Number Of Workers
                </x-table.headings>
                <x-table.headings>
                    Status
               </x-table.headings>
                <x-table.headings>
                    Created At
                </x-table.headings>
                <x-table.headings>
                    Action
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($this->employee_tasks as $employee_task)
                <x-table.row>
                    <x-table.cell>
                        {{$employee_task->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee_task->site->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee_task->start_at}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee_task->end_at}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee_task->num_of_workers}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee_task->status}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee_task->created_at}}
                    </x-table.cell>
                    <x-table.cell>
                        @if(App\Models\TaskEmployee::where('task_id', $employee_task->id)->where('user_id', Auth::user()->id)->first())
                            Accpeted
                        @else
                        <button wire:click="taskUpdate({{$employee_task->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Accpet
                        </button>
                        @endif

                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

</div>
