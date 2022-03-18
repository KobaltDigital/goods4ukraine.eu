@if(Session::get('language'))
<div class="relative inline-block text-left" x-data="{ langOpen: false}">
    <div>
        <button type="button"
            class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 lg:p-2 lg:rounded-md lg:hover:bg-blue-50"
            id="menu-button" aria-expanded="true" aria-haspopup="true" @click="langOpen = !langOpen"
            @keydown.escape="langOpen = false">
            <img src="/img/{{ Session::get('language') }}.svg" class="w-6 h-auto border border-gray-300 shadow-md">
            <!-- Heroicon name: solid/chevron-down -->
            <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div x-cloak
        class="absolute right-0 z-20 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical" aria-labelledby="menu-button"
        tabindex="-1" x-show="langOpen" @click.away="langOpen = false">
        <div class="py-1" role="none">
            @foreach (languages() as $language)
            @if (Session::get('language') != $language->locale)
            <a href="{{ route('sessions.languages.update', ['lang' => $language->locale]) }}"
                class="flex block px-4 py-2 text-sm text-blue" role="menuitem" tabindex="-1" id="menu-item-1">
                <img src="/img/{{ $language->locale }}.svg" class="h-auto mr-3 shadow-md w-7">
                <span class="ml-2">
                    {!! __($language->title) !!}
                </span>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endif
