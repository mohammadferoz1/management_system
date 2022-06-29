<div>
    <x-page-title title="Bills List">
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
                    Site Name
                </x-table.headings>
                <x-table.headings>
                    Total Price
                </x-table.headings>
                <x-table.headings>
                    Debit
                </x-table.headings>
                <x-table.headings>
                    Credit
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
            @foreach($bills as $bill)
                <x-table.row>
                    <x-table.cell>
                        {{$bill->site->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->total_price}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->debit}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->credit}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->status}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$bill->created_at}}
                    </x-table.cell>
                    <x-table.cell>
                        <x-common.button type="button" wire:click="edit({{$bill->id}})" class="">Edit</x-common.button>
                        @if($bill->credit != 0)
                            <x-common.button type="button" wire:click="makeLedger({{$bill->id}})" class="">Debit</x-common.button>
                        @endif
                        <x-common.button type="button" wire:click="listLedger({{$bill->id}})" class="">View</x-common.button>
                        <a href="{{$bill->pdf_link}}" target="_blank" class="inline-flex items-center px-5 py-2 tracking-wider border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">PDF</a>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    {{$bills->links()}}
</div>
