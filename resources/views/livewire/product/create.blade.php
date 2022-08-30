<div>
    <x-page-title title="Create Products"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('products') <li>{{$message}} </li>@enderror
                    @error('prices') <li>{{$message}} </li>@enderror
                    @error('quantity') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <div class="col-span-12" style="margin-right: 145px">
                    <x-form.label> Select Product Count` </x-form.label>
                    <x-form.input type="number" wire:model="optionCount">  </x-form.input>
                 </div>

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

                <x-form.group name="group">
                    @for($i = 0; $i < $optionCount; $i++)
                    @if ($i == 0)
                        <x-form.label> Price </x-form.label>
                    @endif
                        <x-form.input type="number" class="mt-4" wire:model="quantity.{{$i}}" placeholder="Product Quantity" required>  </x-form.input>
                    @endfor
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
