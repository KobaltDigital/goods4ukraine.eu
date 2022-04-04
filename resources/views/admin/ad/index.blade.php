<x-layout>
    <div class="relative mx-auto max-w-7xl">
        <div class="px-4 py-12">

        @if(count($ads)<1)
            <div class="w-full mb-6 text-center">
                <h1 class="mb-4">{{ __('You do not have any ads yet') }}</h1>
                <x-button href="{{ route('admin.ads.create') }}">{{ __('Create') }}</x-button>
            </div>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <img src="/img/noadds.svg" />
            </div>
        @else
            <div class="flex justify-between w-full mb-6">
                <h1>
                    {{ __('Ads') }}
                </h1>

                <div class="flex justify-end w-full mb-6">
                    <x-button href="{{ route('admin.ads.create') }}">{{ __('Create') }}</x-button>
                </div>
            </div>

        <table class="w-full bg-white divide-y divide-gray-300 rounded-lg shadow-lg mb-6">
            <thead>
                <tr>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">{{ __('Ad') }}</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black hidden sm:block">{{ __('Category') }}</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">{{ __('Edit') }}</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @foreach($ads as $ad)

                <tr class="@if(isset($ad->deleted_at)) bg-gray-100  @endif">
                    <td class="px-3 py-4 @if(isset($ad->deleted_at)) text-gray-400 @else text-black @endif">
                        <a href="{{ route('ads.show', $ad) }}" class="flex items-center hover:underline">
                                <img class="h-10 w-10 md:h-20 md:w-20 rounded @if(isset($ad->deleted_at)) opacity-50  @endif"
                                src="{{ $ad->getFirstMediaUrl('images', 'thumb') }}"
                                alt="">

                            <div class="pl-2">
                                {{ $ad->title }}<br>
                                <div class="text-sm text-gray-500">
                                    {{ $ad->created_at->diffForHumans(); }}
                                </div>
                            </div>
                        </a>
                    </td>
                    <td class="px-3 hidden sm:table-cell">{{ optional($ad->category)->name ?? '-' }}</td>
                    <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                        <div class="w-full md:flex md:justify-end">
                            @if(isset($ad->deleted_at))
                                <form action="{{ route('admin.ads.activate', ['id'=> $ad->id]) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <x-button-secondary class="mb-2 mr-2 md:mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>                                
                                        {{ __("Activate") }}</x-button>
                                </form>
                            @else
                            <x-editbuttons :ad=$ad />
                            @endif
                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

        {{ $ads->links() }}

        @endif
    </div>
    </div>
</x-layout>
