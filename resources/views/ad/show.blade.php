@push('ogtags')
<meta property="og:site_name" content="Goods4Ukraine.eu">
<meta property="og:title" content="{{ $ad->title_translated }} - Goods4Ukraine" />
<meta property="og:description" content="{{  substr($ad->description, 0, 200)  }}" />
<meta property="og:image" itemprop="image" content="{{ $ad->getFirstMediaUrl('images', 'single') }}">
<meta property="og:type" content="website" />
<meta property="og:updated_time" content="1440432930" />
@endpush

<x-layout>
    <div class="py-10 mx-auto max-w-7xl">
        @if(auth()->user() && (auth()->user()->id = $ad->user_id || auth()->user()->admin == 1))
        <div class="px-2 sm:px-6 mb-4">
            <x-editbuttons :ad=$ad />
        </div>
        @endif
        <div class="lg:grid lg:grid-cols-3">
            <div class="lg:pr-10 sm:px-6 lg:col-span-2">

                <div class="p-6 bg-white rounded shadow">
                    <div class="relative flex justify-between mb-4">
                        <div>
                            <h1 class="mb-2 font-serif text-3xl font-medium leading-6 text-black">
                                {{ $ad->title_translated }}
                            </h1>
                            <div>
                                <ul>
                                    @foreach ($ad->categories as $category)
                                        <li class="text-sm">
                                            <a href="{{ route('ads.index', ['category' => $category->id]) }}" class="underline">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="text-sm">
                                {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                            </div>
                        </div>
                        <div class="inline md:flex items-center">
                            @if($ad->type == 'Wanted')
                            <span
                                class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-purple-600 uppercase bg-purple-200 rounded last:mr-0">
                                {{ __($ad->type) }}
                            </span>
                            @else
                            <span
                                class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-orange-600 uppercase bg-orange-200 rounded last:mr-0">
                                {{ __($ad->type) }}
                            </span>
                            @endif
                        </div>
                    </div>

                    @if (!$ad->hasPlaceholder)
                        <a data-fancybox href="{{ $ad->getFirstMediaUrl('images', 'large') }}">
                            <img class="w-full mb-3 border" src="{{ $ad->getFirstMediaUrl('images', 'single') }}" />
                        </a>
                    @endif

                    <div class="flex items-center pb-3 space-x-2 border-b {{ !$ad->hasPlaceholder ? 'md:justify-end' : '' }} md:space-x-4">
                        <div class="text-sm text-black">{{ __('Share') }}:</div>
                        <div class="flex items-center space-x-2 md:space-x-4">
                            <div class="w-8 h-8">
                                <a target="_blank" href="whatsapp://send?text={{ urlencode(route('ads.show', ['ad'=>$ad])) }}" data-action="share/whatsapp/share">
                                    <img src="/img/social-share-whatsapp.svg" alt="{{ __('Share') }} whatsapp" class="" />
                                </a>
                            </div>
                            <div class="w-8 h-8">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('ads.show', ['ad'=>$ad])) }}">
                                    <img src="/img/social-share-facebook.svg" alt="{{ __('Share') }} Facebook" />
                                </a>
                            </div>
                            <div class="w-8 h-8">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($ad->title_translated) }}&url={{ urlencode(route('ads.show', ['ad'=>$ad])) }}&via=goods4ukraine" target="_blank">
                                <img src="/img/social-share-twitter.svg" alt="{{ __('Share') }} Twitter" />
                               </a>
                            </div>
                            <div class="w-8 h-8">
                                <a href="mailto:?subject={{ urlencode($ad->title_translated) }}&amp;body=Check out this site {{ route('ads.show', ['ad'=>$ad]) }}." target="_blank">
                                    <img src="/img/social-share-email.svg" alt="{{ __('Share') }} Email" />
                                </a>
                            </div>
                            <a href="#" onclick="navigator.clipboard.writeText('{{ route('ads.show', ['ad'=>$ad]) }}');const feedback = new Notyf({duration: 5000, dismissible: false});feedback.success('Copy!')" class="flex items-center space-x-2 text-sm text-blue hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                <span>{{ __('copy link') }}</span>

                            </a>
                        </div>
                    </div>
                    @if ($ad->translated_description)
                        <div class="py-3 border-b">
                            <p class="leading-6 text-black text-md">
                                {{ $ad->translated_description }}
                            </p>
                        </div>
                    @endif
                    <dl class="mt-8 text-base text-black">
                        <h4 class="mb-2">{{ __("From:")}} {{ $ad->user->name}}</h4>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <dt class="sr-only">{{ __('Postal address') }}</dt>
                            @if ($ad->user->show_full_address)
                            <dd class="ml-3">
                                <p>{{ $ad->street }} {{ $ad->house_number }}{{ $ad->house_number_suffix }}</p>
                                <p>{{ $ad->postcode }}, {{ $ad->city }}</p>
                                <p>{{ __(config('goods4ukraine.countries')[$ad->country]) }}</p>
                            </dd>
                            @else
                            <dd class="ml-3">
                                <p>{{ $ad->city }}</p>
                                <p>{{ __(config('goods4ukraine.countries')[$ad->country]) }}</p>
                            </dd>
                            @endif
                        </div>

                        @if ($ad->user->show_phone && $ad->user->phone)
                        <div class="mt-6">
                            <dt class="sr-only">{{ __('Phone number') }}</dt>
                            <dd class="flex">
                                <!-- Heroicon name: outline/phone -->
                                <svg class="flex-shrink-0 w-6 h-6 text-accent" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-3">
                                    <a class="underline" href="tel:{{ $ad->user->phone }}">{{ $ad->user->phone }}</a>
                                </span>
                            </dd>
                        </div>
                        @endif
                        @if ($ad->user->show_email && $ad->user->email)
                        <div class="mt-3">
                            <dt class="sr-only">{{ __('Email') }}</dt>
                            <dd class="flex">
                                <!-- Heroicon name: outline/mail -->
                                <svg class="flex-shrink-0 w-6 h-6 text-accent" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">
                                    <a class="underline" href="mailto:{{ $ad->user->email }}">{{ $ad->user->email }}</a>
                                </span>
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="sticky top-0 max-w-lg p-6 mx-auto bg-white rounded shadow lg:max-w-none">
                    <x-ad.contact :ad="$ad" />
                </div>
            </div>
        </div>
    </div>
</x-layout>
