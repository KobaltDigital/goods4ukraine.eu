@php
    $editing = isset($ad);
@endphp

<x-layout>
    <div class="flex flex-col items-center sm:justify-center sm:pt-0">
        <h1>{{ __("Ads") }} </h1>
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-4xl sm:rounded-lg">


            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            @if($editing)
                <form
                    method="POST"
                    action="{{ route('admin.ads.update', ['ad' => $ad]) }}"
                    class="space-y-8" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form
                    method="POST"
                    action="{{ route('admin.ads.store') }}"
                    class="space-y-8" enctype="multipart/form-data"
                >
                @method('POST')
            @endif
            @csrf

                <div class="gap-6 lg:grid lg:grid-cols-2">
                    <div>
                        <h3>{{ __('Ad details') }}</h3>
                        <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                            <x-input.group name="type" :label="__('Type')" required>
                                <x-input.select
                                    :options="$adTypes ?? ''"
                                    value="{{ old('type', ($editing ? $ad->type ?? '' : '')) }}"
                                />
                            </x-input.group>

                            <x-input.group name="category" :label="__('Category')" required>
                                <x-input.select
                                    :options="$categories ?? ''"
                                    value="{{ old('category', ($editing ? $ad->category->id ?? '' : '')) }}"
                                />
                            </x-input.group>

                            <x-input.group name="title" :label="__('Title')" required>
                                <x-input.text
                                    value="{{ old('title', ($editing ? $ad->title : '')) }}"
                                />
                            </x-input.group>

                            <x-input.group name="description" :label="__('Description')" required>
                                <x-input.textarea type="textarea">
                                    {{ old('description', ($editing ? $ad->description : '')) }}
                                </x-input.textarea>
                            </x-input.group>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Photo') }}</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div id="image-grid" class="bg-gray-400">
                                    </div>
                                    <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload" class="relative font-medium text-blue bg-white rounded-md cursor-pointer hover:text-blue focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                    <span>{{ __('Choose File') }}</span>
                                                    <input id="file-upload" name="file-upload" type="file" accept="image/*" class="sr-only">
                                                </label>
                                                <p class="pl-1">{{ __('or drag and drop') }}</p>
                                            </div>
                                            <p class="text-xs text-gray-500">{{ __('PNG, JPG, GIF up to 10MB') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                    const fileUploader = document.getElementById('file-upload');
                    const reader = new FileReader();
                    const imageGrid = document.getElementById('image-grid');

                    fileUploader.addEventListener('change', (event) => {
                        const files = event.target.files;
                        const file = files[0];
                        
                        const img = document.createElement('img');
                        imageGrid.appendChild(img);
                        img.src = URL.createObjectURL(file);
                        img.alt = file.name;
                    });

                    </script>

                    <div class="mt-6 md:mt-0">
                        <h3>{{ __('Contact information') }}</h3>
                        <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                            <x-input.group :label="__('Street address')" required>
                                <x-input.text
                                    name="street"
                                    autocomplete="street-address"
                                    value="{{ old('street', ($editing ? $ad->street : '')) }}"
                                />
                            </x-input.group>

                            <x-input.group name="postcode" :label="__('Zip / Postal Code')" required>
                                <x-input.text
                                    autocomplete="postal-code"
                                    value="{{ old('postcode', ($editing ? $ad->postcode : '')) }}"
                                />
                            </x-input.group>

                            <x-input.group name="city" :label="__('City')" required>
                                <x-input.text
                                    autocomplete="address-level2"
                                    value="{{ old('city', ($editing ? $ad->city : '')) }}"
                                />
                            </x-input.group>
                            <x-input.group name="country" :label="__('Country')" required>
                                <x-input.select
                                    autocomplete="country-name"
                                    :options="config('goods4ukraine.countries')"
                                    value="{{ old('country', ($editing ? $ad->country : 'nl')) }}"
                                />
                            </x-input.group>
                        </div>
                        <div class="mt-4 text-sm text-gray-600">
                            {{ __('This information is used to make a good match with the searcher and is not shown online unless you want it to.') }}
                        </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.ads.index') }}" class="text-sm font-semibold text-blue"><span aria-hidden="true">&larr;</span> {{ __('Back') }}</a>
                        <x-button>{{ __('Save') }}</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
