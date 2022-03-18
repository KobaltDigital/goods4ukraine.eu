<div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
    <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
        <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" />
            </div>
            <div class="sm:col-span-3">
                <div class="flex items-center justify-between py-5">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="space-y-1">
                            <h3 class="font-serif text-lg font-medium leading-6 text-black">
                                {{ __($ad->type) }}: 

                                {!! $ad->title !!} 
                            </h3>
                            <div class="font-bold text-sm">
                                {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                                <span class="font-sans text-gray-400">(4km)</span>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1 text-sm  text-black">
                    {{ \Illuminate\Support\Str::limit($ad->description, 150) }}
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <x-button :href="route('ads.show', $ad)">{{ __('View') }}</x-button>
        </div>
    </div>
</div>
