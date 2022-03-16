@aware(['name'])

<textarea
    name="{{ $name }}"
    rows="5"
    {{ $attributes->class(['block w-full max-w-lg border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}
>{{ $slot }}</textarea>
