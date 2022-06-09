<div>
    <x-page-title title="Contracted Sites List">
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
                    Amount Taken
                </x-table.headings>
                <x-table.headings>
                    Contracted Amount
                </x-table.headings>
                <x-table.headings>
                    Start At
                </x-table.headings>
                <x-table.headings>
                    End At
                </x-table.headings>
                <x-table.headings>
                    Debit
                </x-table.headings>
                <x-table.headings>
                    Credit
                </x-table.headings>
                <x-table.headings>
                    Bills
                </x-table.headings>
                <x-table.headings>
                    Status
                </x-table.headings>
                <x-table.headings>
                    Actions
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($this->contracted_sites as $site)
                <x-table.row>
                    <x-table.cell>
                        {{$site->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->amount_taken}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->contracted_amount}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->start_at}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->end_at}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->debit}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->credit}}
                    </x-table.cell>
                    <x-table.cell>
                        <x-common.button type="button" wire:click="bills({{$site->id}})" class="">View</x-common.button>
                    </x-table.cell>
                    <x-table.cell>
                    </x-table.cell>
                    <x-table.cell>
                        <button wire:click="edit({{$site->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button wire:click="view({{$site->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
