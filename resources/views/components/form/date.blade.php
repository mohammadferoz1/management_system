@props(['disabled' => false])
<input type="date" {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
     'class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full pr-12'
     ]) !!}
/>
