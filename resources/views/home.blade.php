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
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Location</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="text" name="location" id="location"
                            class="block w-full pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-3xl"
                            placeholder="Alkmaar">
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <label for="currency" class="sr-only">Distance</label>
                            <select id="currency" name="currency"
                                class="h-full py-0 pl-2 text-gray-500 bg-transparent border-transparent rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-7 sm:text-sm">
                                <option>1km</option>
                                <option>10km</option>
                                <option>20km</option>
                            </select>
                        </div>
                    </div>
                </div>

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
                        <label for="currency" class="sr-only">Type</label>
                        <select id="currency" name="currency"
                            class="h-full py-0 pl-2 text-gray-500 bg-transparent border-transparent rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-7 sm:text-sm">
                            <option>alles</option>
                            <option>aangeboden</option>
                            <option>gevraagd</option>
                        </select>
                    </div>
                </div>

                <div class="text-gray-400">
                    <strong class="text-gray-500">{{ $ads->count() }}</strong> resultaten
                </div>
            </div>

            @foreach ($ads as $ad)
                <x-card :ad="$ad"/>
            @endforeach
        </div>
    </section>

    <script>
        console.log(google.places)
    </script>

</x-layout>
