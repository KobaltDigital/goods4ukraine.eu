<div class="overflow-hidden bg-white shadow-lg rounded-md sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" />
            </div>
            <div class="sm:col-span-3">
                <div class="relative flex justify-between">
                    <div>
                        <h3 class="font-serif text-lg font-medium leading-6 text-black">
                            {!! $ad->title_translated !!}
                        </h3>
                        <div class="text-sm font-bold">
                            {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                            <span class="font-sans text-gray-400">(
                            @if($ad->calcDistance < 1000)
                                {{ round($ad->calcDistance) . __('mtr') }}
                            @else 
                                {{ round($ad->calcDistance / 1000) . __('km') }}
                            @endif
                            )</span>
                        </div>
                    </div>
                    <div>                        
                        @if($ad->type == 'Wanted')
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-purple-600 bg-purple-200 uppercase last:mr-0 mr-1">
                                {{ __($ad->type) }}
                            </span>
                        @else 
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-orange-600 bg-orange-200 uppercase last:mr-0 mr-1">
                            {{ __($ad->type) }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mt-1 text-sm  text-black">
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
