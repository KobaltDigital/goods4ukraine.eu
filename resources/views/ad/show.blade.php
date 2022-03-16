<x-layout>
    <div class="py-10 mx-auto max-w-7xl">
        <div class="relative">
            <div class="absolute inset-0">
                <div class="absolute inset-y-0 left-0 w-1/2"></div>
            </div>
            <div class="relative mx-auto max-w-7xl lg:grid lg:grid-cols-5">
                <div class="px-4 py-16 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
                    <div class="max-w-lg mx-auto">
                        <img class="w-full mb-3" src="https://via.placeholder.com/200" />
                        <h2 class="text-2xl font-extrabold tracking-tight text-black sm:text-3xl">{{ $ad->title }}</h2>
                        <p class="mt-3 text-lg leading-6 text-gray-500">
                            {!! $ad->description !!}
                        </p>
                        <dl class="mt-8 text-base text-gray-500">
                            <div>
                                <dt class="sr-only">Postal address</dt>
                                @if ($ad->show_full_address)
                                    <dd>
                                        <p>{{ $ad->street }} {{ $ad->house_number }}{{ $ad->house_number_suffix }}</p>
                                        <p>{{ $ad->postcode }}, {{ $ad->city }}</p>
                                        <p>{{ __($ad->country) }}</p>
                                    </dd>
                                @else
                                    <dd>
                                        <p>{{ $ad->city }}</p>
                                        <p>{{ __($ad->country) }}</p>
                                    </dd>
                                @endif
                            </div>
                            @if ($ad->show_telephone)
                            <div class="mt-6">
                                <dt class="sr-only">{{ __('Phone number') }}</dt>
                                <dd class="flex">
                                    <!-- Heroicon name: outline/phone -->
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="ml-3">{{ $ad->telephone }}</span>
                                </dd>
                            </div>
                            @endif
                            @if ($ad->show_email)
                            <div class="mt-3">
                                <dt class="sr-only">{{ __('Email') }}</dt>
                                <dd class="flex">
                                    <!-- Heroicon name: outline/mail -->
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="ml-3">{{ $ad->email }}</span>
                                </dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>
                <div class="px-4 py-16 bg-white rounded sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
                    <div class="max-w-lg mx-auto lg:max-w-none">
                        <form action="#" method="POST" class="grid grid-cols-1 gap-y-6">
                            <div>
                                <label for="full-name" class="sr-only">{{ __('Full name') }}</label>
                                <input type="text" name="full-name" id="full-name" autocomplete="name"
                                    class="block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="{{ __('Full name') }}">
                            </div>
                            <div>
                                <label for="email" class="sr-only">{{ __('Email') }}</label>
                                <input id="email" name="email" type="email" autocomplete="email"
                                    class="block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="{{ __('Email') }}">
                            </div>
                            <div>
                                <label for="phone" class="sr-only">{{ __('Phone') }}</label>
                                <input type="text" name="phone" id="phone" autocomplete="tel"
                                    class="block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="{{ __('Phone') }}">
                            </div>
                            <div>
                                <label for="message" class="sr-only">{{ __('Message') }}</label>
                                <textarea id="message" name="message" rows="4"
                                    class="block w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="{{ __('Message') }}"></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="inline-flex justify-center px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
