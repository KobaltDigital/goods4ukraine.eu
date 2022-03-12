<x-layout>

    <section class="w-full my-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-6 p-5 bg-white rounded">

                </div>
                <div class="col-span-6 p-5 bg-white rounded">

                </div>
            </div>
        </div>
    </section>

    <div class="w-full mb-10">
        <div class="max-w-2xl mx-auto">
            <div class="p-4">
                <form action="{{ route('home') }}" method="GET">
                    <label for="location" class="block text-sm font-medium text-gray-700">
                        {{ __('Location') }}
                    </label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input
                            id="location"
                            type="text"
                            name="location"
                            class="block w-full pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-3xl"
                            placeholder="your location.."
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <label for="distance" class="sr-only">
                                {{ __('Distance') }}
                            </label>
                            <select id="distance" name="distance"
                                class="h-full py-0 pl-2 text-gray-500 bg-transparent border-transparent rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-7 sm:text-sm">
                                <option value="5000">5{{ __('km') }}</option>
                                <option value="15000">15{{ __('km') }}</option>
                                <option value="25000">25{{ __('km') }}</option>
                                <option value="50000">50{{ __('km') }}</option>
                                <option value="100000">100{{ __('km') }}</option>
                                <option value="500000">500{{ __('km') }}</option>
                                <option value="null">{{ __('Any distance') }}</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <section class="w-full">

        <div class="max-w-5xl mx-auto space-y-4">

            <div class="flex items-center justify-between w-full">
                <div class="relative mt-1 rounded-md shadow-sm sm:w-1/3">
                    <input type="text" name="search" id="search"
                        class="block w-full pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Pindakaas">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <label for="type" class="sr-only">
                            {{ __('Type') }}
                        </label>
                        <select id="type" name="type"
                            class="h-full py-0 pl-2 text-gray-500 bg-transparent border-transparent rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-7 sm:text-sm">
                            <option value="everything">{{ __('Everything') }}</option>
                            <option value="offered">{{ __('Offered') }}</option>
                            <option value="wanted">{{ __('Wanted') }}</option>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white border border-transparent rounded-md shadow-sm bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Search') }}
                    </button>
                </div>

                <div class="text-gray-400">
                    <strong class="text-gray-500">{{ $ads->count() }}</strong> {{ __('results') }}
                </div>
            </div>

            @foreach ($ads as $ad)
                <x-card :ad="$ad"/>
            @endforeach
        </div>
    </section>
</x-layout>
