<div>
    <x-page-title title="Update Task"></x-page-tile>
    <form wire:submit.prevent="update">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('name') <li>{{$message}} </li>@enderror
                    @error('site_id') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label>Name</x-form.label>
                    <x-form.input type="text" wire:model="name"></x-form.input>
                </x-form.group>
                <div class="col-span-6 sm:col-span-3">
                    <x-form.label>Select Site</x-form.label>
                    <x-form.select name="site_id" wire:model="site_id">

                        <option value="null">Please Select</option>
                        @foreach ($sites as $site)
                            <option value="{{$site->id}}" {{$site->id == $this->site_id ? 'selected':''}}>{{$site->name}}</option>
                        @endforeach
                    </x-form.select>
                </div>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
