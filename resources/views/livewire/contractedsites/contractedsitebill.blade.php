<div>
    <x-page-title title="{{$site->name}} Bills">
    </x-page-title>
    @if (session()->has('message'))
        <x-common.alert message="{{ session('message') }}">
        </x-common.alert>
    @endif
    <x-table>
        <x-slot name="head">
            <x-table.row>
                <x-table.headings>
                    Sr#
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
            @foreach($this->bills as $bill)
                <x-table.row>
                    <x-table.cell>
                        {{$i++}}
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
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
