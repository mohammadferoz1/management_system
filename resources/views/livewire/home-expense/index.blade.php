<div>
    <x-page-title title="Home Expense List">
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
                </x-table.headings>
                <x-table.headings>
                </x-table.headings>
                <x-table.headings>
                </x-table.headings>
                <x-table.headings>
                    Price
                </x-table.headings>
                <x-table.headings>
                </x-table.headings>
                <x-table.headings>
                </x-table.headings>
                <x-table.headings>
                    Created At
                </x-table.headings>
                <x-table.headings>
                    Actions
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($homeExpenses as $homeExpense)
                <x-table.row>
                    <x-table.cell>
                        {{$homeExpense->name}}
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                        {{$homeExpense->price}}
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                        {{$homeExpense->created_at}}
                    </x-table.cell>
                    <x-table.cell>
                        <x-common.button type="button" wire:click="edit({{$homeExpense->id}})" class="">Edit</x-common.button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    {{$homeExpenses->links()}}
</div>
