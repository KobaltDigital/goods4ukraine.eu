<x-layout>

    <div class="w-full my-10">
        <div class="max-w-5xl pb-10 mx-auto space-y-4">
            <div class="p-4">
                <form action="{{ route('ads.index') }}" method="GET" class="flex">
                    <div class="w-2/6">
                        <label for="search" class="block text-sm font-medium text-gray-700">
                            {{ __('Search term') }}
                        </label>
                        <div class="mt-1">
                            <input
                                id="search"
                                type="text"
                                name="search"
                                value="{{ request()->input('search') }}"
                                placeholder="{{ __('Search term..') }}"
                                class="block w-full border-gray-300 rounded-md focus:ring-accent focus:border-accent sm:text-3xl"
                            >
                        </div>
                    </div>
                    <div class="w-2/6">
                        <label for="location" class="block text-sm font-medium text-gray-700">
                            {{ __('Location') }}
                        </label>
                        <div class="relative z-10 mt-1 rounded-md shadow-sm">
                            <input
                                id="location"
                                type="text"
                                name="location"
                                value="{{ $location ?? '' }}"
                                class="block w-full pr-12 border-gray-300 rounded-md focus:ring-accent focus:border-accent sm:text-3xl"
                                placeholder="{{ __('Location..') }}"
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <label for="distance" class="sr-only">
                                    {{ __('Distance') }}
                                </label>
                                <select id="distance" name="distance"
                                    class="h-full py-0 pl-2 text-black bg-transparent border-transparent rounded-md focus:ring-accent focus:border-accent pr-7 sm:text-sm">
                                    <option value="5000" {{ request()->input('distance') == 5000 ? 'selected' : '' }}>5{{ __('km') }}</option>
                                    <option value="15000" {{ request()->input('distance') == 15000 ? 'selected' : '' }}>15{{ __('km') }}</option>
                                    <option value="25000" {{ request()->input('distance') == 25000 ? 'selected' : '' }}>25{{ __('km') }}</option>
                                    <option value="50000" {{ request()->input('distance') == 50000 ? 'selected' : '' }}>50{{ __('km') }}</option>
                                    <option value="100000" {{ request()->input('distance') == 100000 ? 'selected' : '' }}>100{{ __('km') }}</option>
                                    <option value="500000" {{ request()->input('distance') == 500000 ? 'selected' : '' }}>500{{ __('km') }}</option>
                                    <option value="null">{{ __('Any distance') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-2/6">
                        <button type="submit" class="inline-flex items-center h-full px-3 py-2 text-sm font-medium leading-4 text-white border border-transparent rounded-md shadow-sm bg-blue hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                            {{ __('Search') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="w-full">
        <div class="max-w-5xl pb-10 mx-auto space-y-4">
            <div class="flex justify-between w-full items-right">
                <div></div>
                <div class="text-gray-400">
                    <strong class="text-black">{{ $ads->count() }}</strong> {{ __('pagination.results') }}
                </div>
            </div>

            @foreach ($ads as $ad)
                <x-card :ad="$ad"/>
            @endforeach
        </div>
    </section>
</x-layout>
