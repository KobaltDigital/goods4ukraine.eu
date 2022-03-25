<div class="overflow-hidden bg-white shadow rounded-md sm:rounded-lg">
        <div class="grid grid-cols-1 sm:grid-cols-6">
            <div class="sm:col-span-1">
                <a href="{{ route('ads.show', $ad) }}">
                    <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" class="w-full h-full object-cover rounded-t-md sm:rounded-l-lg" />
                </a>
            </div>
            <div class="sm:col-span-5 p-5">
                <div class="relative flex items-center justify-between">
                    <div>
                        <a href="{{ route('ads.show', $ad) }}">
                            <h3 class="font-serif text-lg md:text-2xl font-medium leading-6 hover:text-black hover:underline text-blue pb-1">
                                {!! $ad->title_translated !!}
                            </h3>
                        </a>
                        <div class="text-sm font-bold">
                            {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                            @if($ad->calcDistance > 0)
                                <span class="font-sans text-accent">
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
                <div class="flex justify-between">
                    <div class="text-sm text-accent mt-4">
                        {{ $ad->created_at->diffForHumans()}} {{ strtolower(__('Added.')) }}
                    </div>
                    <x-button :href="route('ads.show', $ad)">{{ __('View') }}</x-button>
                </div>
                </div>
    
        </div>
</div>
