<div>
    <x-page-title title="Products List">
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
                </x-table.headings>
                <x-table.headings>
                    Actions
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($this->products as $product)
                <x-table.row>
                    <x-table.cell>
                        {{$product->name}}
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                        {{$product->price}}
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                        <x-common.button type="button" wire:click="edit({{$product->id}})" class="">Edit</x-common.button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
