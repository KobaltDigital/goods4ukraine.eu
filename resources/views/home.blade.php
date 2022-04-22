<x-layout>
    <x-hero />

    <section class="w-full sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-4 mb-10 space-y-4 md:mx-auto">
            <x-home-filters :sortedBy=$sortedBy  />

            @forelse ($ads as $ad)
                <x-card :ad="$ad" />
            @empty
                <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                    <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
                        <h2>{{ __('No search results') }}</h2>
                        <h4>{{ __('Searchtip') }}</h4>
                    </div>
                </div>
            @endforelse
            {{ $ads->appends(Request::all())->links() }}
        </div>
    </section>
</x-layout>
