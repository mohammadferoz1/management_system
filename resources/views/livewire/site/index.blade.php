<div>
    <x-page-title title="Sites List">
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
                    Profit
                </x-table.headings>
                <x-table.headings>
                    Loss
                </x-table.headings>
                <x-table.headings>
                    Debit
                </x-table.headings>
                <x-table.headings>
                    Credit
                </x-table.headings>
                <x-table.headings>
                    Contact
                </x-table.headings>
                <x-table.headings>
                    Address
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($this->sites as $site)
                <x-table.row>
                    <x-table.cell>
                        {{$site->name}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->profit}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->loss}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->debit}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->credit}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->phone}}  
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->address}}  
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
