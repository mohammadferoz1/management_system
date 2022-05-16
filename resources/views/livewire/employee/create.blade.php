<div>
    <x-page-title title="Create Employee"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('email') <li>{{$message}} </li>@enderror
                    @error('phone') <li>{{$message}} </li>@enderror
                    @error('password') <li>{{$message}} </li>@enderror
                    @error('password_confirmation') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label> Name* </x-form.label>
                    <x-form.input type="text" wire:model="name"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Email* </x-form.label>
                    <x-form.input type="email" wire:model="email"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Phone* </x-form.label>
                    <x-form.input type="number" wire:model="phone"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Password* </x-form.label>
                    <x-form.input type="password" wire:model="password" autocomplete="new-password"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Confirm Password* </x-form.label>
                    <x-form.input type="password" wire:model="password_confirmation" autocomplete="new-password"></x-form.input>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
