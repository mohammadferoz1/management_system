<div>
    <x-page-title title="Update Site"></x-page-tile>
    <form wire:submit.prevent="update">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('phone') <li>{{$message}} </li>@enderror
                    @error('address') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label> Name* </x-form.label>
                    <x-form.input type="text" value="{{$site->name}}" wire:model="name"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Contact*</x-form.label>
                    <x-form.input type="number" wire:model="phone" value="{{$site->phone}}"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Email (optional)</x-form.label>
                    <x-form.input type="email" wire:model="email" value="{{$site->email}}" ></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Address* </x-form.label>
                    <x-form.input type="text" wire:model="address" value="{{$site->address}}"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Description (optional) </x-form.label>
                    <x-form.textarea wire:model="description">{{$site->description}}</x-form.textarea>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
