<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

  Open: "fixed inset-0 z-40 overflow-y-auto", Closed: ""
-->
<header x-data="{ open: false }" :class="{ 'fixed inset-0 z-40 overflow-y-auto': open }"
  class="lg:static lg:overflow-y-visible">
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
    <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">

      {{-- Hier language switch met flag icons --}}
      <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
        <div class="flex items-center flex-shrink-0">
          <a href="/">
            <x-application-logo class="block w-auto h-10 lg:h-16 lg:my-3 fill-current" />
          </a>
        </div>
      </div>

      <div class="flex items-center md:absolute md:right-0 md:inset-y-0">

        <div class="mx-4">
          <x-langswitch />
        </div>

        @if(Auth()->check())

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <x-button class="flex items-center transition duration-150 ease-in-out">
                <div>{{ Auth::user()->name }}</div>
                <div class="ml-1">
                  <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </x-button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('admin.ads.index')">
                {{ __('Ads') }}
              </x-dropdown-link>
              <x-dropdown-link :href="route('admin.profile.edit')">
                {{ __('Profile') }}
              </x-dropdown-link>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                          this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>

            </x-slot>
          </x-dropdown>
        </div>
        @else
        <div class="mr-4">
          <x-button href="{{ route('register') }}">{{ __("Register") }}</x-button>
        </div>
        <div class="">
          <x-button-secondary href="{{ route('login') }}">{{ __("Login") }}</x-button>
        </div>
        @endif


      </div>
    </div>
  </div>

</header>