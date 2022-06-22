<div>
    <x-page-title title="Edit Employee Expense"></x-page-tile>
    <form wire:submit.prevent="update">
        <x-form.main>
            @if($errors != '[]')
                <x-slot name="errorMessages">
                    @error('Expemployee_id') <li>{{$message}} </li>@enderror
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
                            <option value="{{$employee->id}}" {{$Expemployee_id == $employee->id ? 'selected' : ''}}>{{$employee->name}}</option>
                        @endforeach
                    </x-form.select>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Type of Payment</x-form.label>
                    <x-form.select name="type" wire:model="type">
                        <option value="null">Please Select</option>
                            <option value="salary" {{$Exptype == 'salary' ? 'selected' : ''}}>Salary</option>
                            <option value="otherexpense" {{$Exptype == 'otherexpense' ? 'selected' : ''}}>Other Expense</option>
                    </x-form.select>
                </x-form.group>
                <x-form.group>
                    <x-form.label>Payment Amount</x-form.label>
                    <x-form.input type="number" class="mt-4" value="{{$employeeExpense->price}}" wire:model="price"></x-form.input>
                </x-form.group>
            </x-slot>
        </x-form.main>
        <x-common.button type="submit">submit</x-common.button>
    </form>
</div>
