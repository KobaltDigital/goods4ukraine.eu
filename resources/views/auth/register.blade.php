<x-layout>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-4xl sm:rounded-lg">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                    @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div>
                            <h3 class="text-2xl font-medium leading-6 text-black">{{ __('Create an account and place an ad') }}</h3>
                            <p class="max-w-2xl mt-1 text-sm text-gray-500">{{ __('Fill in the form below to register for an account and place an ad') }}</p>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-medium leading-6 text-black">{{ __('Ad details') }}</h3>
                        </div>

                        <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                            <x-input.group name="type" :label="__('Type')" required>
                                <x-input.select
                                    :options="$adTypes"
                                    value="{{ old('type') }}"
                                />
                            </x-input.group>

                            <x-input.group name="title" :label="__('Title')" required>
                                <x-input.text
                                    value="{{ old('title') }}"
                                />
                            </x-input.group>

                            <x-input.group name="description" :label="__('Description')" required>
                                <x-input.textarea type="textarea">
                                    {{ old('description') }}
                                </x-input.textarea>
                            </x-input.group>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Image') }}</label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>{{ __('Upload a file') }}</span>
                                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
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

                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-black">{{ ('Personal information') }}</h3>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <x-input.group name="name" :label="__('Name')" required>
                                <x-input.text
                                    value="{{ old('name') }}"
                                />
                            </x-input.group>

                            <x-input.group name="email" :label="__('Email')" required>
                                <x-input.text
                                    type="email"
                                    autocomplete="email"
                                    value="{{ old('email') }}"
                                />
                            </x-input.group>

                            <x-input.group name="password" :label="__('Password')" required>
                                <x-input.text
                                    type="password"
                                />
                            </x-input.group>

                            <x-input.group name="password_confirmation" :label="__('Confirm password')" required>
                                <x-input.text
                                    type="password"
                                />
                            </x-input.group>

                            <x-input.group name="phone" :label="__('Phone number')" required>
                                <x-input.text
                                    value="{{ old('phone') }}"
                                />
                            </x-input.group>

                            <x-input.group name="country" :label="__('Country')" required>
                                <x-input.select
                                    autocomplete="country-name"
                                    :options="config('goods4ukraine.countries')"
                                    value="{{ old('country') }}"
                                />
                            </x-input.group>

                            <x-input.group :label="__('Street address')" required>
                                <x-input.text
                                    name="street"
                                    autocomplete="street-address"
                                    value="{{ old('street') }}"
                                />
                            </x-input.group>

                            <x-input.group name="postcode" :label="__('ZIP / Postal code')" required>
                                <x-input.text
                                    autocomplete="postal-code"
                                    value="{{ old('postcode') }}"
                                />
                            </x-input.group>

                            <x-input.group name="city" :label="__('City')" required>
                                <x-input.text
                                    autocomplete="address-level2"
                                    value="{{ old('city') }}"
                                />
                            </x-input.group>
                        </div>
                    </div>

                    <div class="pt-8 space-y-6 divide-y divide-gray-200 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-black">{{ __('Contact settings') }}</h3>
                            <p class="max-w-2xl mt-1 text-sm text-gray-500">{{ __('Please tell us how you want people to contact you')}}</p>
                        </div>
                        <div class="space-y-6 divide-y divide-gray-200 sm:space-y-5">
                            <div class="pt-6 sm:pt-5">
                                <div role="group" aria-labelledby="label-email">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg space-y-4">
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input
                                                        id="show_phone"
                                                        name="show_phone"
                                                        type="checkbox"
                                                        value="1"
                                                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                        @if(old('show_phone')) checked @endif
                                                    >
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="show_phone" class="font-medium text-gray-700">{{ __('Phone') }}</label>
                                                    <p class="text-gray-500">{{ __('Show my phone number on the website')}}</p>
                                                </div>
                                            </div>

                                                <div class="relative flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input
                                                            id="show_email"
                                                            name="show_email"
                                                            type="checkbox"
                                                            value="1"
                                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                            @if(old('show_email')) checked @endif
                                                        >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="show_email" class="font-medium text-gray-700">{{ __('Email') }}</label>
                                                        <p class="text-gray-500">{{ __('Show my email address on the website')}}</p>
                                                    </div>
                                                </div>

                                                <div class="relative flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input
                                                            id="show_full_address"
                                                            name="show_full_address"
                                                            type="checkbox"
                                                            value="1"
                                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                                            @if(old('show_full_address')) checked @endif
                                                        >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="show_full_address" class="font-medium text-gray-700">{{ __('Address') }}</label>
                                                        <p class="text-gray-500">{{ __('Show my address on the website')}}</p>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex items-center justify-end">
                        <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-900"><span aria-hidden="true">&larr;</span> {{ __('Back to homepage') }}</a>
                        <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Create account and place ad') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
