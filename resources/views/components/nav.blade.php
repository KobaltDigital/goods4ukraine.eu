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

        <div class="flex items-center md:absolute md:right-0 md:inset-y-0">

          <div class="mx-4">
            <x-langswitch />
          </div>

          <div class="mr-4">
            <x-button href="{{ route('register') }}">{{ __("Place offer") }}</x-button>
          </div>
          <div class="">
            <x-button href="{{ route('login') }}">{{ __("Login") }}</x-button>
          </div>

        </div>
      </div>
    </div>

  </header>
