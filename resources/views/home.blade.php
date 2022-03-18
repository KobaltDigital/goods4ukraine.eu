<x-layout>
  <!-- Hero section -->
  <div class="relative">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:my-20">
      <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
        <div class="absolute inset-0">
          <img class="h-full w-full object-cover" src="/img/photo.jpg"
            alt="People working on laptops">
          <div class="absolute inset-0 bg-blue mix-blend-multiply"></div>
        </div>
        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-24 lg:px-8">
          <h1 class="text-center text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-4xl">
            <span class="block text-white">
              {{ __('Bringing people and goods together in times of need') }}
            </span>
          </h1>
          <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">
            {{ __("Goods4Ukraine brings supply and demand together with the aim of helping refugees with missing necessities.") }}</p>
          <div class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">
            <form action="{{ route('ads.index') }}" method="GET" class="flex justify-center">
              <div class="w-2/5">
                <input id="search" type="text" name="search" value="{{ request()->input('search') }}"
                  placeholder="{{ __('Search') }}..."
                  class="block  text-black w-full border-gray-300 rounded-l-lg focus:ring-accent focus:border-accent sm:text-lg">
              </div>
              <div class="w-2/5">
                <div class="relative z-10 rounded-md">
                  <input id="location" type="text" name="location" value="{{ $location ?? '' }}"
                    class="block text-black w-full pr-12 border-gray-300 focus:ring-accent focus:border-accent sm:text-lg"
                    placeholder="{{ __('Location') }}">
                  <div class="absolute inset-y-0 right-0 flex items-center">
                    <select id="distance" name="distance"
                      class="h-full py-0 pl-2 text-black bg-transparent border-transparent focus:ring-accent focus:border-accent pr-7 sm:text-lg">
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
                      <option value="null">{{ __('Any distance') }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="w-1/5">
                <button type="submit"
                  class="w-full items-center h-full px-3 text-black border border-transparent rounded-r-lg bg-accent hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
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
    <div class="max-w-5xl py-10 mx-auto space-y-4">
      @foreach ($ads as $ad)
        <x-card :ad="$ad" />
      @endforeach
      {{ $ads->links() }}
    </div>
  </section>
</x-layout>