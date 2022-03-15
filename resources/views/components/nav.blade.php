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
<header x-data="{ open: false }" :class="{ 'fixed inset-0 z-40 overflow-y-auto': open }" class="lg:static lg:overflow-y-visible">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
      <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">

        {{-- Hier language switch met flag icons --}}
        <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
          <div class="flex items-center flex-shrink-0">
            <a href="/">
              <x-application-logo class="block w-auto h-16 my-3 fill-current" />
            </a>
          </div>
        </div>

        {{-- Hier logo/naam --}}
        <div class="flex-1 min-w-0 md:px-8 lg:px-0 xl:col-span-6">
          <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
            <div class="w-full">
              <h1 class="text-base font-semibold text-center">
                "{{ __('Bringing people and goods together in times of need') }}"
              </h1>
            </div>
          </div>
        </div>

        <div class="flex items-center md:absolute md:right-0 md:inset-y-0">

          <div class="mx-4">
            <x-langswitch />
          </div>

          <div class="mr-4">
            <x-button href="/add/create">{{ __("Place offer") }}</x-button>
          </div>

          <!-- Mobile menu button -->
          <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-center p-2 -mx-2 text-black rounded-md hover:bg-light hover:text-blue focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg x-show="!open" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg x-show="open" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav x-show="open" class="" aria-label="Global">
      <div class="max-w-3xl px-2 pt-2 pb-3 mx-auto space-y-1 sm:px-4">
        <!-- Current: "bg-light text-black", Default: "hover:bg-light" -->
        <a href="#" aria-current="page" class="block px-3 py-2 text-base font-medium text-black rounded-md bg-light">Dashboard</a>

        <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-light">
            {{ __('Login') }}
        </a>

        <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-light">
            {{ __('Place offer') }}
        </a>

        <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-light">
            {{ __('Make a request') }}
        </a>
      </div>
    </nav>
  </header>
