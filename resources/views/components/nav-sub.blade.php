<ul class="px-6 sm:px-0 sm:flex text-sm text-blue">
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left sm:inline p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('about') ? 'border-accent border  bg-white' : 'border-white' }}"
            href="{{ route('about') }}">{{ __("About") }}
        </a>
    </li>
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left sm:inline p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('press') ? 'border-accent border  bg-white' : 'border-white' }}"
            href="{{ route('press') }}">{{ __("Presskit") }}
        </a>
    </li>
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left sm:inline p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('rules') ? 'border-accent border bg-white' : 'border-white' }}"
            href="{{ route('rules') }}">{{ __("Rules") }}
        </a>
    </li>
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left  sm:inline  p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('terms-of-use') ? 'border-accent border bg-white' : 'border-white' }}"
            href="{{ route('terms-of-use') }}">{{ __("Terms of use") }}
        </a>
    </li>
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left  sm:inline  p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('privacy') ? 'border-accent border bg-white' : 'border-white' }}"
            href="{{ route('privacy'); }}">{{ __("Privacy") }}
        </a>
    </li>
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left  sm:inline  p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('cookies') ? 'border-accent border bg-white' : 'border-white' }}"
            href="{{ route('cookies'); }}">{{ __("Cookies") }}
        </a>
    </li>
    <li>
        <a class="hover:bg-white hover:underline block text-center sm:text-left sm:inline p-2 sm:px-4 sm:py-2 rounded-full {{ request()->routeIs('contact') ? 'border-accent border  bg-white' : 'border-white' }}"
            href="{{ route('contact') }}">{{ __("Contact") }}
        </a>
    </li>
</ul>