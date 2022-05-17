<div>
    <x-page-title title="Create Site"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('site_id') <li>{{$message}} </li>@enderror
                    @error('product_details') <li>{{$message}} </li>@enderror
                    @error('product_price') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label>Select Site</x-form.label>
                    <x-form.select name="site_id" wire:model="site_id">
                        <option value="null">Please Select</option>
                        @foreach ($sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                        @endforeach
                    </x-form.select>
                </x-form.group>
                <x-form.group name="group">
                    <x-form.label> Select Product Count` </x-form.label>
                    <x-form.input type="number" wire:model="optionCount">  </x-form.input>
                </x-form.group>

                <x-form.group name="group">

                    @for($i = 0; $i < $optionCount; $i++)
                    @if ($i == 0)
                        <x-form.label> Products </x-form.label>
                    @endif
                        <x-form.input type="text" class="mt-4" wire:model="products.{{$i}}" placeholder="Products Name" required>  </x-form.input>
                    @endfor
                </x-form.group>

                <x-form.group name="group">
                    @for($i = 0; $i < $optionCount; $i++)
                    @if ($i == 0)
                        <x-form.label> Price </x-form.label>
                    @endif
                        <x-form.input type="number" class="mt-4" wire:model="prices.{{$i}}" placeholder="Product Price" required>  </x-form.input>
                    @endfor
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
