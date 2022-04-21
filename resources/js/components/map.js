import { MarkerClusterer } from '@googlemaps/markerclusterer';

if (document.getElementById('map_canvas')) {
    const map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 7,
    });

    const infoWindow = new google.maps.InfoWindow({
        content: '',
        disableAutoPan: true,
    });

    const bounds = new google.maps.LatLngBounds();

    const markers = ads.map((data) => {
        bounds.extend(data.position);

        const marker = new google.maps.Marker({
            position: data.position,
            title: data.title,
            label: data.adsCount > 1 ? data.adsCount : ''
        });

        marker.addListener('click', () => {
            infoWindow.setContent(data.infoWindow);
            infoWindow.open(map, marker);
            map.setCenter(marker.getPosition());
        });

        return marker;
    });

    map.fitBounds(bounds);

    new MarkerClusterer({
        markers,
        map
    });
}
