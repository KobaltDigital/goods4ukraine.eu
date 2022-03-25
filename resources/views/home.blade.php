<x-layout>
    <!-- Hero section -->
    <div class="relative">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 md:my-10">
            <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
                <div class="absolute inset-0">
                    <img class="object-cover w-full h-full" src="/img/photo.jpg" alt="People working on laptops">
                    <div class="absolute inset-0 bg-blue mix-blend-multiply"></div>
                </div>
                <div class="relative px-4 py-10 md:py-16 lg:py-24 sm:px-6 sm:py-24 lg:px-8">
                    <h1 class="text-2xl font-extrabold tracking-tight text-center text-white sm:text-3xl lg:text-4xl">
                        {{ __('Bringing people and goods together in times of need') }}
                    </h1>
                    <p class="max-w-lg mx-auto my-6 text-base text-center text-white md:text-xl sm:max-w-3xl lg:py-6">
                        {{ __("Goods4Ukraine brings supply and demand together with the aim of helping refugees with missing necessities.") }}
                    </p>
                    <div class="max-w-4xl mx-auto mt-6 text-xl text-white ">
                        <form id="search" action="{{ route('ads.index') }}" method="GET" class="md:flex md:justify-center">

                            <input x-model="latitude" id="latitude" type="hidden" value="{{ request()->input('latitude') }}" name="latitude">
                            <input x-model="longitude" id="longitude" type="hidden" value="{{ request()->input('longitude') }}" name="longitude">

                            <div class="w-full md:w-1/5">
                                <x-label class="!text-white">{{ __('Search') }}</x-label>
                                <x-input id="search" type="text" name="search" value="{{ request()->input('search') }}"
                                placeholder=""
                                class="block w-full text-black border-0 border-r rounded-none md:h-16 lg:rounded-none lg:rounded-l-lg" />
                            </div>
                            <div class="w-full md:w-1/5">
                                <x-label class="!text-white truncate pr-4">{{ __('Wanted or offered') }}</x-label>
                                <select id="type" name="type" class="w-full text-black border-0 border-r border-gray-300 bg-light md:h-16 focus:ring focus:ring-blue focus:ring-opacity-50">
                                    <option {{ request()->input('type') == "" ? 'selected' : '' }} value="">{{ __('Both') }}</option>
                                    <option value="Wanted" {{ request()->input('type') == "Wanted" ? 'selected' : '' }}>{{ __('Wanted') }}</option>
                                    <option value="Offered" {{ request()->input('type') == "Offered" ? 'selected' : '' }}>{{ __('Offered') }}</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/5">
                                <x-label class="!text-white">{{ __('Location') }}</x-label>
                                <div class="relative z-10 h-full">
                                    <x-input id="location_field" type="text"
                                        name="location"
                                        class="w-full text-black border-0 border-r rounded-none md:h-16"
                                        value="{{ request('location') }}"
                                    />
                                </div>
                            </div>
                            <div class="w-full md:w-1/5">
                                <x-label class="!text-white">{{ __('Distance') }}</x-label>
                                    <select id="distance" name="distance" class="w-full text-black border-0 border-gray-300 bg-light md:h-16 focus:ring focus:ring-blue focus:ring-opacity-50">
                                        <option value="5000" {{ request()->input('distance') == 5000 ? 'selected' : '' }}>5{{ __('km') }}</option>
                                        <option value="15000" {{ request()->input('distance') == 15000 ? 'selected' : '' }}>15{{ __('km')}}</option>
                                        <option value="25000" {{ request()->input('distance') == 25000 ? 'selected' : '' }}>25{{ __('km')}}</option>
                                        <option value="50000" {{ request()->input('distance') == 50000 ? 'selected' : '' }}>50{{ __('km')}}</option>
                                        <option value="100000" {{ request()->input('distance') == 100000 ? 'selected' : '' }}>100{{ __('km') }}</option>
                                        <option value="500000" {{ request()->input('distance') == 500000 ? 'selected' : '' }}>500{{ __('km') }}</option>
                                        <option value="1000000" {{ request()->input('distance') == 1000000 ? 'selected' : '' }}>1000{{__('km') }}</option>
                                        <option value="-1" {{ (request()->input('distance') == "-1" || request()->input('distance') == "") ? 'selected' : '' }}>{{ __('Any distance') }}</option>
                                    </select>
                                </div>
                                <div class="w-full lg:w-auto md:text-right">
                                    <x-label>&nbsp;</x-label>
                                    <x-button-secondary class="px-5 text-base rounded-lg md:h-16 md:w-full shadow-3xl lg:rounded-none lg:rounded-r-lg bg-yellow text-blue hover:text-black">
                                        {{ __('Search') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>


  <section class="w-full sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-4 mb-10 space-y-4 md:mx-auto">
      <div class="justify-between md:flex">
        <div class="my-4 md:mt-0">
          <x-button href="{{ route('admin.ads.create') }}">{{ __("Place advertisement") }}</x-button>
        </div>
        <div class="text-sm text-gray-500">
          {{ __('Sorted by') }}:
          @if($sortedBy == 'nearest')
          {{ __('nearest') }}
          @else
          {{ __('recently added') }}
          @endif
        </div>
      </div>
      <x-categories />
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
    </section>
</x-layout>
