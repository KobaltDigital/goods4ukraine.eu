<x-layout>
    <div class="py-10 mx-auto max-w-7xl">
            <div class="lg:grid lg:grid-cols-3">

                <div class="lg:pr-10 sm:px-6 lg:col-span-2">
                    <div class="bg-white shadow rounded p-6">
                        <h2 class="text-2xl font-extrabold tracking-tight text-black sm:text-3xl mb-6">{{ $ad->translated_title }}</h2>
                    
                        <a data-fancybox href="{{ $ad->getFirstMediaUrl('images', 'large') }}">
                            <img class="w-full mb-3 border" src="{{ $ad->getFirstMediaUrl('images', 'single') }}" />
                        </a>

                        <p class="mt-3 text-lg leading-6 text-gray-500">
                            {{ $ad->translated_description }}
                        </p>

                        <dl class="mt-8 text-base text-gray-500">
                            <div>
                                <dt class="sr-only">Postal address</dt>
                                @if ($ad->show_full_address)
                                    <dd>
                                        <p>{{ $ad->street }} {{ $ad->house_number }}{{ $ad->house_number_suffix }}</p>
                                        <p>{{ $ad->postcode }}, {{ $ad->city }}</p>
                                        <p>{{ __(config('goods4ukraine.countries')[$ad->country]) }}</p>
                                    </dd>
                                @else
                                    <dd>
                                        <p>{{ $ad->city }}</p>
                                        <p>{{ __(config('goods4ukraine.countries')[$ad->country]) }}</p>
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
                <div class="lg:col-span-1">
                    <div class="max-w-lg mx-auto lg:max-w-none bg-white shadow rounded p-6">
                        <x-ad.contact :ad="$ad" />
                    </div>
                </div>
        </div>
    </div>
</x-layout>
