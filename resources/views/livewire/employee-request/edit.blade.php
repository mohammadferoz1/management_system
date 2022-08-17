<div>
    <x-page-title title="Edit Request For Admin"></x-page-tile>
    <form wire:submit.prevent="Update">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('description') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label>Requesting For</x-form.label>
                    <x-form.input type="text" wire:model="name" value="{{$this->name}}"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Details about request</x-form.label>
                    <x-form.textarea wire:model="description">{{$this->description}}</x-form.textarea>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
