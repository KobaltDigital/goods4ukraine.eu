<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="flex items-center justify-between px-4 py-5 sm:px-6">
        <div class="flex items-center justify-center space-x-4">
            <div class="space-y-1">
                <h3 class="font-serif text-lg font-medium leading-6 text-black">
                    {!! $ad->title !!} <small class="font-sans text-gray-400">(4km)</small>
                </h3>
                <p class="text-[10px] text-blue underline">Tag 1, Tag 2</p>
            </div>
        </div>
        <div class="flex justify-end">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                {{ __($ad->type) }}
            </span>
        </div>
    </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <img src="https://via.placeholder.com/200" />
            </div>
            <div class="sm:col-span-3">
                <dd class="mt-1 text-sm prose text-black">
                    {!! $ad->description !!}
                </dd>
                <div class="flex mt-4">
                    @if ($ad->show_full_address)
                        <div class="w-1/2">
                            <dt class="text-sm font-medium text-black">{{ __('Address') }}</dt>
                            <dd class="mt-1 mb-4 text-sm text-black">{{ $ad->street }} {{ $ad->postcode }}, {{ $ad->city }}, {{ __($ad->country) }}</dd>
                        </div>
                    @endif
                    <div class="w-1/2">
                        @if ($ad->show_email)
                            <dt class="text-sm font-medium text-black">{{ __('Email') }}</dt>
                            <dd class="mt-1 mb-4 text-sm text-black">{{ $ad->email }}</dd>
                        @endif
                        @if ($ad->show_phone)
                            <dt class="text-sm font-medium text-black">{{ __('Phone') }}</dt>
                            <dd class="mt-1 text-sm text-black">{{ $ad->phone }}</dd>
                        @endif
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-button :href="route('ad.show', $ad)">Neem contact op!</x-button>
                </div>
            </div>
        </dl>
    </div>
</div>
