<div>
    <x-page-title title="Create Site"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('phone') <li>{{$message}} </li>@enderror
                    @error('address') <li>{{$message}} </li>@enderror
                    @error('blacklist') <li>{{$message}} </li>@enderror
                    @error('allowed') <li>{{$message}} </li>@enderror
                    @error('good') <li>{{$message}} </li>@enderror
                    @error('excellent') <li>{{$message}} </li>@enderror
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
                    <x-form.label> When to blacklist*</x-form.label>
                    <x-form.input type="number" wire:model="blacklist"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> When to allowed*</x-form.label>
                    <x-form.input type="number" wire:model="allowed"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> When to Good*</x-form.label>
                    <x-form.input type="number" wire:model="good"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> When to Excellect*</x-form.label>
                    <x-form.input type="number" wire:model="excellent"></x-form.input>
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
