@aware(['name'])

<textarea
    name="{{ $name }}"
    rows="5"
    {{ $attributes->class(['block w-full max-w-lg border border-gray-300 rounded-md shadow-sm focus:ring-accent focus:border-accent sm:text-sm']) }}
>{{ $slot }}</textarea>
