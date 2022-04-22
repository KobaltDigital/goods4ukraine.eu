<x-layout>
<x-hero />

<script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.js"></script>
    <section class="w-full sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-4 mb-10 space-y-4 md:mx-auto">
            <x-home-filters :sortedBy=$sortedBy  />

            <div id="map_wrapper">
                <div id="map_canvas" class="mapping"></div>
            </div>
        </div>
    </section>
</x-layout>

<script>
const ads = [
    @foreach ($ads as $location => $adsCollection)
        {
            position: {
                lat: {{ explode(' ', $location)[1] }},
                lng: {{ explode(' ', $location)[0] }},
            },
            infoWindow: `<x-info-window :ads="$adsCollection"></x-info-window>`,
            adsCount: '{{ $adsCollection->count() }}'
        },
    @endforeach
];
</script>
