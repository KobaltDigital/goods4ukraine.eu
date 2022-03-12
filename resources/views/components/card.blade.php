<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="flex items-center justify-between px-4 py-5 sm:px-6">
        <div class="flex items-center justify-center space-x-4">
            <div class="space-y-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    {!! $ad->title !!} <small class="text-gray-400">(4km)</small>
                </h3>
                <p class="text-[10px] text-blue underline">Tag 1, Tag 2</p>
            </div>
        </div>
        <div class="flex justify-end">
            <span
                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Aangeboden</span>
            </div>
    </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
            <div class="sm:col-span-1">
                <img src="https://via.placeholder.com/350" />
            </div>
            <div class="sm:col-span-3">
                <dd class="mt-1 text-sm prose text-gray-900">
                    {!! $ad->description !!}
                </dd>
                <div class="flex mt-4">
                    <div class="w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                        <dd class="mt-1 mb-4 text-sm text-gray-900">{{ $ad->street }} {{ $ad->house_number }}{{ $ad->house_number_suffix }} {{ $ad->postcode }}, {{ $ad->city }}, {{ __($ad->country) }}</dd>
                    </div>
                    <div class="w-1/2">
                        @if ($ad->show_email)
                            <dt class="text-sm font-medium text-gray-500">E-mail</dt>
                            <dd class="mt-1 mb-4 text-sm text-gray-900">{{ $ad->email }}</dd>
                        @endif
                        @if ($ad->show_telephone)
                            <dt class="text-sm font-medium text-gray-500">Telefoon</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $ad->telephone }}</dd>
                        @endif
                    </div>

                </div>
                <div class="flex justify-end">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white border border-transparent rounded-md shadow-sm bg-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Neem
                        contact op!
                    </button>
                </div>
            </div>
        </dl>
    </div>
</div>
