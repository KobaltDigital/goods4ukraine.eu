@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-accent bg-indigo-50 focus:outline-none focus:text-accent focus:bg-indigo-100 focus:border-accent transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-black hover:text-black hover:bg-light hover:border-gray-300 focus:outline-none focus:text-black focus:bg-light focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
