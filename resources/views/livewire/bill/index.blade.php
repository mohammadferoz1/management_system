<div>
    <x-page-title title="Bills List">
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
                    Site Name
                </x-table.headings>
                <x-table.headings>
                    Total Price
                </x-table.headings>
                <x-table.headings>
                    Status
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
            @foreach($this->bills as $bill)
                <x-table.row>
                    <x-table.cell>
                        {{$bill->site->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->total_price}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->status}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->created_at}}
                    </x-table.cell>
                    <x-table.cell>
                        <button wire:click="edit({{$bill->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
