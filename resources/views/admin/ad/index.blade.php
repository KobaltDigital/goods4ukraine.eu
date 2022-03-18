<x-layout>


    <div class="relative mx-auto max-w-7xl">
        <div class="py-12">
            
        @if(count($ads)<1)

        <div class="w-full text-center mb-6">
            <h1 class="mb-4">{{ __('You do not have any ads yet') }}</h1>
            <x-button href="{{ route('admin.ads.create') }}">{{ __('Create') }}</x-button>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <img src="/img/noadds.svg" />
            </div>
        @else

        <div class="w-full flex justify-between mb-6">

            <h1>    
                {{ __('Ads') }}
            </h1>
        
            <div class="w-full flex justify-end mb-6">
                <x-button href="{{ route('admin.ads.create') }}">{{ __('Create') }}</x-button>
            </div>
        </div>

        <table class="w-full divide-y divide-gray-300 shadow-lg bg-white rounded-lg">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-black sm:pl-6">{{ __('Photo') }}</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">{{ __('Name') }}</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">{{ __('Created') }}</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">{{ __('Edit') }}</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @foreach($ads as $ad)
                <tr class="@if(isset($ad->deleted_at)) bg-gray-100  @endif">
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                        <img class="h-20 w-20 rounded @if(isset($ad->deleted_at)) opacity-50  @endif"
                            src="{{ $ad->getFirstMediaUrl('images', 'thumb') }}"
                            alt="">
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 @if(isset($ad->deleted_at)) text-gray-400 @else text-black @endif">
                        {{ $ad->title }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 @if(isset($ad->deleted_at)) text-gray-400 @else text-black @endif">
                        {{ $ad->created_at->diffForHumans(); }}
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <div class="w-full flex justify-end">
                            @if(isset($ad->deleted_at))
                                <form action="{{ route('admin.ads.activate', ['id'=> $ad->id]) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <x-button-secondary class="mr-2">{{ __("Activate") }}</x-button>
                                </form>
                            @else
                                <form action="{{ route('admin.ads.reserve', ['ad'=> $ad]) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <x-button-secondary class="mr-2">{{ __("Reserve") }}</x-button>
                                </form>
                                <form action="{{ route('admin.ads.destroy', ['ad'=> $ad]) }}" method="POST" onsubmit="return confirm('{{__('Are you sure you want to delete this resource?')}}');">
                                    @method('delete')
                                    @csrf
                                    <x-button-secondary class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                          </svg>
                                    </x-button>      
                                </form>
                                    <x-button href="{{ route('admin.ads.edit', ['ad'=> $ad]) }}" class="mr-1">{{ __("Edit") }}</x-button>
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