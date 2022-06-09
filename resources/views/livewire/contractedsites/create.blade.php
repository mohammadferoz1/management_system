<div>
    <x-page-title title="Create Contracted Site"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('phone') <li>{{$message}} </li>@enderror
                    @error('address') <li>{{$message}} </li>@enderror
                    @error('start_at') <li>{{$message}} </li>@enderror
                    @error('end_at') <li>{{$message}} </li>@enderror
                    @error('contracted_amount') <li>{{$message}} </li>@enderror
                    @error('amount_taken') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label> Name* </x-form.label>
                    <x-form.input type="text" wire:model="name"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Contact*</x-form.label>
                    <x-form.input type="number" wire:model="phone"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Start At</x-form.label>
                    <x-form.input type="date" wire:model="start_at"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> End At</x-form.label>
                    <x-form.input type="date" wire:model="end_at"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Amount Taken</x-form.label>
                    <x-form.input type="number" wire:model="amount_taken"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Contracted Amount</x-form.label>
                    <x-form.input type="number" wire:model="contracted_amount"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Email (optional)</x-form.label>
                    <x-form.input type="email" wire:model="email"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Address* </x-form.label>
                    <x-form.input type="text" wire:model="address"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Description (optional) </x-form.label>
                    <x-form.textarea wire:model="description"></x-form.textarea>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
