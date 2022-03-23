<div class="overflow-hidden bg-white shadow-lg rounded-md sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" class="rounded" />
            </div>
            <div class="sm:col-span-3">
                <div class="relative flex justify-between">
                    <div>
                        <a href="{{ route('ads.show', $ad) }}">
                            <h3 class="font-serif text-lg md:text-2xl font-medium leading-6 hover:text-black hover:underline text-blue py-1">
                                {!! $ad->title_translated !!}
                            </h3>
                        </a>
                        <div class="text-sm font-bold">
                            {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                            @if($ad->calcDistance > 0)
                                <span class="font-sans text-gray-400">
                                @if($ad->calcDistance < 1000)
                                    ({{ round($ad->calcDistance) . __('mtr') }})
                                @else 
                                    ({{ round($ad->calcDistance / 1000) . __('km') }})
                                @endif
                                </span>
                            @endif
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
        <div class="flex justify-between">
            <div class="text-sm text-gray-500 mt-4">
                {{ $ad->created_at->diffForHumans()}} {{ strtolower(__('Added.')) }}
            </div>
            <x-button :href="route('ads.show', $ad)">{{ __('View') }}</x-button>
        </div>
    </div>
</div>
