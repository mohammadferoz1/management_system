<div>
    <x-page-title title="Sites List">
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
                    Debit
                </x-table.headings>
                <x-table.headings>
                    Credit
                </x-table.headings>
                <x-table.headings>
                    Contact
                </x-table.headings>
                <x-table.headings>
                    Bills
                </x-table.headings>
                <x-table.headings>
                    Address
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
            @foreach($sites as $site)
                <x-table.row>
                    <x-table.cell>
                        {{$site->name}}
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
                        <x-common.button type="button" wire:click="bills({{$site->id}})" class="">View</x-common.button>
                    </x-table.cell>
                    <x-table.cell>
                        {{$site->address}}
                    </x-table.cell>
                    <x-table.cell>
                        {{-- @if($site->checkIfBlackList()[0] > 0 || $site->checkIfBlackList()[1] > 1)
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-black rounded-full">BlackList</span>
                        @else
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-lime-500 rounded-full">Good</span>
                        @endif --}}
                        @if($site->credit < $site->excellent && $site->credit >= 0 )
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-black bg-green-400 rounded-full">Marvelous</span>
                        @elseif ($site->credit >= $site->excellent && $site->credit < $site->good )
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-black bg-green-300 rounded-full">Excellent</span>
                        @elseif ($site->credit >= $site->good && $site->credit < $site->allowed)
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-black bg-yellow-400 rounded-full">Good</span>
                        @elseif ($site->credit >= $site->allowed && $site->credit < $site->blacklist)
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-black bg-orange-500 rounded-full">Allowed</span>
                        @else
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-black rounded-full">Blacklist</span>
                        @endif
                    </x-table.cell>
                    <x-table.cell>
                        <button wire:click="edit({{$site->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    {{$sites->links()}}
</div>
