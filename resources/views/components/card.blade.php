<div class="overflow-hidden bg-white rounded-md shadow sm:rounded-lg">
    <div class="grid grid-cols-1 sm:grid-cols-6">
        <div @class(['hidden sm:block' => $ad->hasPlaceholder, "sm:col-span-1"])>
            <a href="{{ route('ads.show', $ad) }}">
                <img src="{{ $ad->getFirstMediaUrl('images', 'medium') }}" class="object-cover w-full h-full rounded-t-md sm:rounded-l-lg" alt="{{ $ad->title_translated }}" />
            </a>
        </div>
        <div class="p-5 sm:col-span-5">
            <div class="relative flex items-stretch justify-between">
                <div>
                    @foreach ($ad->categories as $category)
                        <h6 class="font-sans text-accent text-sm uppercase font-medium leading-6">
                            <a href="{{ route('ads.index', ['category' => $category->id]) }}" class="hover:underline">
                                {{ $category->name }}
                            </a>
                        </h6>
                    @endforeach
                    <a href="{{ route('ads.show', $ad) }}">
                        <h3 class="pb-1 font-serif text-lg font-medium leading-6 md:text-lg hover:text-black hover:underline text-blue lg:pr-10">
                            {!! $ad->title_translated !!}
                        </h3>
                    </a>
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
                {{ Str::limit($ad->description_translated, 150) }}
            </div>
            <div class="flex justify-between">
                <div class="flex items-center text-accent">
                    <div class="text-sm font-bold ">
                        {{ $ad->city }}, {{ __(config('goods4ukraine.countries')[$ad->country]) }}
                    </div>
                    @if($ad->calcDistance > 0)
                        <span class="font-sans text-accent">
                        @if($ad->calcDistance < 1000)
                            ({{ round($ad->calcDistance) . __('mtr') }})
                        @else
                            ({{ round($ad->calcDistance / 1000) . __('km') }})
                        @endif
                        </span>
                    @endif
                    <div class="text-sm ml-4">
                        {{ $ad->created_at->diffForHumans()}} {{ strtolower(__('Added.')) }}
                    </div>
                </div>
                <x-button :href="route('ads.show', $ad)">{{ __('View') }}</x-button>
            </div>
        </div>
    </div>
</div>
