<div>
    <x-page-title title="Request For Admin"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('description') <li>{{$message}} </li>@enderror
                    @error('site_id') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label>Requesting For</x-form.label>
                    <x-form.input type="text" wire:model="name"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Select Site</x-form.label>
                    <x-form.select class="mt-0" name="site_id" wire:model="site_id">
                        <option value="null">Please Select</option>
                        @foreach ($sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                        @endforeach
                    </x-form.select>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Details about request</x-form.label>
                    <x-form.textarea wire:model="description"></x-form.textarea>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
