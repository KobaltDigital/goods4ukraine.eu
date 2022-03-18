<div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
    <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
        <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
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
                            <span class="font-sans text-gray-400">(4km)</span>
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
        <div class="flex justify-end">
            <x-button :href="route('ads.show', $ad)">{{ __('View') }}</x-button>
        </div>
    </div>
</div>
