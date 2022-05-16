<div>
    <x-page-title title="Employee List">
    </x-page-title>
    <x-common.button type="button" wire:click="create()" class="">Create</x-common.button>
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
                    Email
                </x-table.headings>
                <x-table.headings>
                    Contact
                </x-table.headings>
                <x-table.headings>
                    Register Date
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($this->employees as $employee)
                <x-table.row>
                    <x-table.cell>
                        {{$employee->name}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee->email}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee->phone}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$employee->created_at}}  
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
