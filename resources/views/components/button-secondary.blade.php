@if(!isset($href))
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 md:px-4 py-1 md:py-2 bg-yellow border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:text-black active:bg-yellow focus:outline-none focus:border-blue focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }} >
    {{ $slot }}
</button>
@else
<a {{ $attributes->merge(['href' => '', 'class' => 'inline-flex items-center px-2 md:px-4 py-1 md:py-2 bg-yellow border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:text-black active:bg-yellow focus:outline-none focus:border-blue focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }} >
    {{ $slot }}
</a>
@endif

