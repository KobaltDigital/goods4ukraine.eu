@aware(['name'])

<input
    name="{{ $name }}"
    {{ $attributes->merge(['type' => 'text']) }}
    {{ $attributes->class(['block w-full border-gray-300 rounded-md shadow-sm focus:ring-accent focus:border-accent sm:text-sm']) }}
>
