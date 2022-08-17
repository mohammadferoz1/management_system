<div>
    <x-page-title title="Requests">
    </x-page-title>
    <div class="grid grid-cols-4 gap-2">
        @if(Auth::user()->group != 'admin')
            <div>
                <x-common.button type="button" wire:click="create()" class="">Create</x-common.button>
            </div>
        @endif
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
                @if(Auth::user()->group == 'admin')
                    <x-table.headings>
                        Request Made By
                    </x-table.headings>
                @endif
                <x-table.headings>
                    Request Name
                </x-table.headings>
                <x-table.headings>
                    Site Name
                </x-table.headings>
                <x-table.headings>
                    Description
                </x-table.headings>
                <x-table.headings>
                    Status
                </x-table.headings>
                <x-table.headings>
                    Created at
                </x-table.headings>
                <x-table.headings>
                    Actions
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($requests as $request)
                <x-table.row>
                    @if(Auth::user()->group == 'admin')
                        <x-table.cell>
                            {{$request->user->name}}
                        </x-table.cell>
                    @endif
                    <x-table.cell>
                        {{$request->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$request->site->name}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$request->description}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$request->status}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$request->created_at}}
                    </x-table.cell>
                    <x-table.cell>
                        @if(Auth::user()->group != 'admin')
                            @if($request->status == "approved_and_in_pending" || $request->status == "compeleted")
                                <button wire:click="edit({{$request->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            @endif
                        @else
                            @if($request->status == 'waiting_for_approval')
                                <button wire:click="approve({{$request->id}})" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    Approve
                                </button>
                            @elseif($request->status == 'approved_and_in_pending')
                                <button wire:click="completed({{$request->id}})" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    Complete
                                </button>
                            @elseif($request->status == 'completed')
                                <button class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    Request Closed
                                </button>
                            @endif
                        @endif
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
