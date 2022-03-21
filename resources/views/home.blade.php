<x-layout>
  <!-- Hero section -->
  <div class="relative">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 lg:my-10">
      <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
        <div class="absolute inset-0">
          <img class="object-cover w-full h-full" src="/img/photo.jpg" alt="People working on laptops">
          <div class="absolute inset-0 bg-blue mix-blend-multiply"></div>
        </div>
        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-24 lg:px-8">
          <h1 class="text-2xl font-extrabold tracking-tight text-center sm:text-3xl lg:text-4xl">
            <span class="block text-white">
              {{ __('Bringing people and goods together in times of need') }}
            </span>
          </h1>
          <p class="max-w-lg mx-auto mt-6 text-xl text-center text-white sm:max-w-3xl">
            {{ __("Goods4Ukraine brings supply and demand together with the aim of helping refugees with missing necessities.") }}</p>
          <div class="max-w-lg mx-auto mt-6 text-xl text-white sm:max-w-3xl">
            <form action="{{ route('ads.index') }}" method="GET" class="flex justify-center">
              <input x-model="latitude" id="latitude" type="hidden" value="{{ request()->input('latitude') }}"
              name="latitude">
            <input x-model="longitude" id="longitude" type="hidden" value="{{ request()->input('longitude') }}"
              name="longitude">

              <div class="w-1/5">
                <x-label class="text-white">{{ __('Search') }}</x-label>
                <x-input id="search" type="text" name="search" value="{{ request()->input('search') }}"
                  placeholder="{{ __('Titel') }}..."
                  class="block  h-16 w-full rounded-none rounded-l-lg text-black border-0 border-r" />
              </div>
              <div class="w-1/5">
                <x-label class="text-white">{{ __('Wanted or offered') }}</x-label>
                <select id="type" name="type"
                class="text-black w-full  h-16 border-0 border-r border-gray-300 focus:ring focus:ring-blue focus:ring-opacity-50">
                <option value="" {{ request()->input('type') == "" ? 'selected' : '' }}>{{ __('Both') }}</option>
                <option value="Wanted" {{ request()->input('type') == "Wanted" ? 'selected' : '' }}>{{ __('Wanted') }}</option>
                <option value="Offered" {{ request()->input('type') == "Offered" ? 'selected' : '' }}>{{ __('Offered') }}</option>
              </select>
          
              </div>
              <div class="w-1/5">
                <x-label class="text-white">{{ __('Location') }}</x-label>
                <div x-data="location" class="relative z-10  h-full">
                  <x-input x-model="location" x-on:change="autocompleteLocation($event)" id="location" type="text"
                    name="location"
                    class="w-full h-16 rounded-none text-black  border-0 border-r"
                    placeholder="{{ __('Location') }}"
                    value="{{ request('location') }}"
                    />
                  </div>
                </div>
                <div class="w-1/5">
                  <x-label class="text-white">{{ __('Distance') }}</x-label>
                    <select id="distance" name="distance"
                      class="text-black w-full  h-16 border-0 border-gray-300 focus:ring focus:ring-blue focus:ring-opacity-50">
                      <option value="5000" {{ request()->input('distance') == 5000 ? 'selected' : '' }}>5{{ __('km') }}
                      </option>
                      <option value="15000" {{ request()->input('distance') == 15000 ? 'selected' : '' }}>15{{ __('km')
                        }}</option>
                      <option value="25000" {{ request()->input('distance') == 25000 ? 'selected' : '' }}>25{{ __('km')
                        }}</option>
                      <option value="50000" {{ request()->input('distance') == 50000 ? 'selected' : '' }}>50{{ __('km')
                        }}</option>
                      <option value="100000" {{ request()->input('distance') == 100000 ? 'selected' : '' }}>100{{
                        __('km') }}</option>
                      <option value="500000" {{ request()->input('distance') == 500000 ? 'selected' : '' }}>500{{
                        __('km') }}</option>
                      <option value="1000000" {{ request()->input('distance') == 1000000 ? 'selected' : '' }}>1000{{
                        __('km') }}</option>
                      <option value="-1" {{ (request()->input('distance') == "-1" || request()->input('distance') == "")
                        ? 'selected' : '' }}>{{ __('Any distance') }}</option>
                    </select>
                </div>
                <div class="text-right">
                    <x-label>&nbsp;</x-label>
                    <button type="submit"
                    class="text-base px-5  h-16 w-full rounded-r-lg text-black bg-accent hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                    {{ __('Search') }}
                  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="w-full">
    <div class="mx-4 max-w-5xl py-10 md:mx-auto space-y-4">
      @forelse ($ads as $ad)
        <x-card :ad="$ad" />    
      @empty
      <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
        <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
          <h2>{{ __('No search results') }}</h2>
          <h4>{{ __('Searchtip') }}</h4>
        </div>
      </div>
      @endforelse
      {{ $ads->links() }}
    </div>
  </section>
</x-layout>