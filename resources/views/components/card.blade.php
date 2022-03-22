<div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
    <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
        <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" />
            </div>
            <div class="sm:col-span-3">
                <div class="relative flex justify-between">
                    <div>
                        <a href="{{ route('ads.show', $ad) }}">
                            <h3 class="font-serif text-lg font-medium leading-6 text-black">
                                {!! $ad->title_translated !!}
                            </h3>
                        </a>
                        <div class="text-sm font-bold">
                            {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                            <span class="font-sans text-gray-400">(4km)</span>
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
                <div class="mt-1 text-sm text-black">
                    {{ \Illuminate\Support\Str::limit($ad->description_translated, 150) }}
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <x-button :href="route('ads.show', $ad)">{{ __('View') }}</x-button>
        </div>
    </div>
</div>
