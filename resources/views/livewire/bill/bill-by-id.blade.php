<div>
    <x-page-title title="Generate Bill By ID">
    </x-page-title>
    <form wire:submit.prevent="viewPDFBill">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('bill_id') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">

                <div class="col-span-2" style="margin-right: 145px">
                    <x-form.label>Bill ID</x-form.label>
                    <x-form.input type="number" wire:model="bill_id"></x-form.input>
                 </div>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
