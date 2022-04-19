@props([
    'ad' => null,
    'partOfMultiple' => false,
])

<div @class([
    'overflow-hidden bg-white',
    'rounded-md shadow sm:rounded-lg' => !$partOfMultiple,
    ])>
    <div class="grid grid-cols-1 sm:grid-cols-6">
        <div class="sm:col-span-1">
            <a href="{{ route('ads.show', $ad) }}">
                <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" class="object-cover w-full h-full rounded-t-md sm:rounded-l-lg" />
            </a>
        </div>
        <div class="p-5 sm:col-span-5">
            <div class="relative flex items-stretch justify-between">
                <div>
                    <a href="{{ route('ads.show', $ad) }}">
                        <h3 class="pb-1 font-serif text-lg font-medium leading-6 md:text-2xl hover:text-black hover:underline text-blue">
                            {{ $ad->title_translated }}
                        </h3>
                    </a>
                    <div class="text-sm font-bold">
                        {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                    </div>
                </div>
            <div>
                @if($ad->type == 'Wanted')
                    <span class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-purple-600 uppercase bg-purple-200 rounded last:mr-0">
                        {{ __($ad->type) }}
                    </span>
                @else
                    <span class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-orange-600 uppercase bg-orange-200 rounded last:mr-0">
                        {{ __($ad->type) }}
                    </span>
                @endif
            </div>
        </div>
        <div class="flex justify-between">
            <div class="mt-4 text-sm text-accent">
                {{ $ad->created_at->diffForHumans()}} {{ strtolower(__('Added.')) }}
            </div>
                <a href="{{ route('ads.show', $ad) }}" class="inline-flex items-center px-2 py-1 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md md:px-4 md:py-2 bg-blue hover:bg-blue hover:text-yellow active:bg-blue focus:outline-none focus:border-blue focus:ring ring-gray-300 disabled:opacity-25" >
                    Bekijk
                </a>
            </div>
        </div>
    </div>
</div>
