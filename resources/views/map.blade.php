
<x-layout>
    <x-hero />

    <section class="w-full sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-4 mb-10 space-y-4 md:mx-auto">
        <x-home-filters :sortedBy=$sortedBy  />

        <div id="map_wrapper">
            <div id="map_canvas" class="mapping"></div>
        </div>

    </div>
    </section>
</x-layout>




<style>
#map_wrapper {
    height: 75vh;
}

#map_canvas {
    width: 100%;
    height: 100%;
}

</style>

<script>
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyCxzPwEB7A9i6Fwvi41SrVbApygce3Sq9c";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
        @foreach ($ads as $ad)
            @php
                $location = explode(" ", $ad->location);
            @endphp
            ['{{$ad->title}}', {{$location[1]}}, {{$location[0]}}],
        @endforeach
    ];

    // Info Window Content
    var infoWindowContent = [
        @foreach ($ads as $ad)
        @php
        $location = explode(" ", $ad->location);

        @endphp
        ['<div class="overflow-hidden bg-white rounded-md shadow sm:rounded-lg">' + 
                '<div class="grid grid-cols-1 sm:grid-cols-6">' +
                    '<div class="sm:col-span-1">' +
                        '<a href="{{ route('ads.show', $ad) }}">' +
                            '<img src="https://goods4ukraine.kobalt/media/1/conversions/phpAEcApm-medium.jpg" class="object-cover w-full h-full rounded-t-md sm:rounded-l-lg" />' +
                            '</a>' +
                            '</div>' +
                            '<div class="p-5 sm:col-span-5">' +
                                '<div class="relative flex items-stretch justify-between">' +
                                    '<div>' +
                                        '<a href="{{ route('ads.show', $ad) }}">' +
                                            '<h3 class="pb-1 font-serif text-lg font-medium leading-6 md:text-2xl hover:text-black hover:underline text-blue">' +
                                                'Scan de volgende QR-code met de authenticatietoepassing van uw telefoon.' +
                                            '</h3>' +
                                        '</a>' +
                                    '<div class="text-sm font-bold">' +
                                        'alkmaar, Nederland' +
                                    '</div>' +
                                '</div>' +
                            '<div>' +
                                @if($ad->type == 'Wanted')
                                '<span class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-purple-600 uppercase bg-purple-200 rounded last:mr-0">' +
                                '{{ __($ad->type) }}' +
                                '</span>' +
                                @else
                                '<span class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-orange-600 uppercase bg-orange-200 rounded last:mr-0">' +
                                '{{ __($ad->type) }}' +
                                '</span>' +
                                @endif

                        '</div>' +
                    '</div>' +
                    '<div class="mt-1 text-sm text-black">' +
                        ' {{ \Illuminate\Support\Str::limit($ad->description_translated, 150) }}' +
                    '</div>' +
                    '<div class="flex justify-between">' +
                        '<div class="mt-4 text-sm text-accent">' +
                            ' {{ $ad->created_at->diffForHumans()}} {{ strtolower(__('Added.')) }}' +
                        '</div>' +
                        '<a href="{{ route('ads.show', $ad) }}" class="inline-flex items-center px-2 md:px-4 py-1 md:py-2 bg-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue hover:text-yellow active:bg-blue focus:outline-none focus:border-blue focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >' +
                            'Bekijk' +
                        '</a>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>'
        ],
        @endforeach
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });
    
}
</script>