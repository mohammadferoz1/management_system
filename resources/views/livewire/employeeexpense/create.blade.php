<div>
    <x-page-title title="Create Employee Expense"></x-page-tile>
    <form wire:submit.prevent="store">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('employee_id') <li>{{$message}} </li>@enderror
                    @error('type') <li>{{$message}} </li>@enderror
                    @error('price') <li>{{$message}} </li>@enderror
                </x-slot>
            @endif
            <x-slot name="body">
                <x-form.group>
                    <x-form.label>Select Employee</x-form.label>
                    <x-form.select name="employee_id" wire:model="employee_id">
                        <option value="null">Please Select</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </x-form.select>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Type of Payment</x-form.label>
                    <x-form.select name="type" wire:model="type">
                        <option value="null">Please Select</option>
                            <option value="salary">Salary</option>
                            <option value="other expense">Other Expense</option>
                    </x-form.select>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Payment Amount</x-form.label>
                    <x-form.input type="number" class="mt-4" wire:model="price"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.label> Description</x-form.label>
                    <x-form.textarea wire:model="description"></x-form.textarea>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
