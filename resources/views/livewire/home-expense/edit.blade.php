<div>
    <x-page-title title="Edit Home Expense"></x-page-tile>
    <form wire:submit.prevent="update">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('products') <li>{{$message}} </li>@enderror
                    @error('prices') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group name="group">
                        <x-form.label> Product Name </x-form.label>
                        <x-form.input type="text" class="mt-4" wire:model="name" value="{{$this->name}}" placeholder="Products Name" required>  </x-form.input>
                </x-form.group>

                <x-form.group name="group">
                        <x-form.label> Product Price </x-form.label>
                        <x-form.input type="number" class="mt-4" wire:model="price" value="{{$this->price}}" placeholder="Product Price" required>  </x-form.input>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
