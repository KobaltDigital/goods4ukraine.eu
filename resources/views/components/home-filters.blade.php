<div class="justify-between flex items-center mt-3">
    <x-button href="{{ route('admin.ads.create') }}">{{ __("Place advertisement") }}</x-button>
    <div class="hidden md:inline text-sm text-gray-500">
        {{ __('Sorted by') }}:
        @if($sortedBy == 'nearest')
        {{ __('nearest') }}
        @else
        {{ __('recently added') }}
        @endif
    </div>
    <div class="flex">
        <x-button href="{{ route('ads.index') }}" class="rounded-none rounded-l-lg  m-0 {{ request()->routeIs('ads.index') ? 'bg-blue' : 'bg-gray-400'}} ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
        </x-button>
        <x-button href="{{ route('ads.map') }}" class="rounded-none rounded-r-lg m-0 {{ request()->routeIs('ads.map') ? 'bg-blue' : 'bg-gray-400'}}" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </x-button>
    </div>
</div>
<x-categories />