<button {{ $attributes->merge(['class' => 'inline-flex items-center px-2 md:px-3 py-1 md:py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 hover:text-yellow active:bg-red-600 focus:outline-none focus:border-red focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}
    onclick="return confirm(__('Are you sure'))" 
    type="submit">
        {{ __('Delete Account') }}
</button>