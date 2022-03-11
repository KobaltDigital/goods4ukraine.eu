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
<header class="bg-white shadow-sm lg:static lg:overflow-y-visible">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">

        {{-- Hier language switch met flag icons --}}
        <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
          <div class="flex-shrink-0 flex items-center">
            <a href="#">
              <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="Workflow">
            </a>
          </div>
        </div>

        {{-- Hier logo/naam --}}
        <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
          <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
            <div class="w-full">
              <h1 class="text-center">
                  Goods4Ukraine
              </h1>
            </div>
          </div>
        </div>


        <div class="flex items-center md:absolute md:right-0 md:inset-y-0">
          <!-- Mobile menu button -->
          <button type="button" class="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!--
              Icon when menu is closed.
  
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.
  
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="lg:hidden" aria-label="Global">
      <div class="max-w-3xl mx-auto px-2 pt-2 pb-3 space-y-1 sm:px-4">
        <!-- Current: "bg-gray-100 text-gray-900", Default: "hover:bg-gray-50" -->
        <a href="#" aria-current="page" class="bg-gray-100 text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Dashboard</a>
  
        <a href="{{ route('login') }}" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">
            {{ __('Login') }}
        </a>

        <a href="{{ route('login') }}" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">
            {{ __('Make an offer') }}
        </a>

        <a href="{{ route('login') }}" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">
            {{ __('Make a request') }}
        </a>
      </div>
    </nav>
  </header>