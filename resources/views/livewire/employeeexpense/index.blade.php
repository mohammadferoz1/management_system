<div>
    <x-page-title title="Employee Expense List">
    </x-page-title>
    <div class="grid grid-cols-4 gap-2">
        <div>
            <x-common.button type="button" wire:click="create()" class="">Create</x-common.button>
        </div>
        <div>

        </div>
        <div>

        </div>
        <div>
            <x-form.input type="text" type="search" wire:model="search"  placeholder="Search..."></x-form.input>
        </div>
    </div>
    @if (session()->has('message'))
        <x-common.alert message="{{ session('message') }}">
        </x-common.alert>
    @endif
    <x-table>
        <x-slot name="head">
            <x-table.row>
                <x-table.headings>
                    Name
                </x-table.headings>
                <x-table.headings>
                    Type
                </x-table.headings>
                <x-table.headings>
                    Price
                </x-table.headings>
                <x-table.headings>
                    Date
                </x-table.headings>
                <x-table.headings>
                    Actions
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($employeeExpense as $employee)
                <x-table.row>
                    <x-table.cell>
                        {{$employee->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee->type}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee->price}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee->created_at}}
                    </x-table.cell>
                    <x-table.cell>
                        <button wire:click="edit({{$employee->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    {{$employeeExpense->links()}}
</div>
