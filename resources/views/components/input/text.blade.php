@aware(['name'])

<input
    name="{{ $name }}"
    {{ $attributes->merge(['type' => 'text']) }}
    {{ $attributes->class(['block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}
>
