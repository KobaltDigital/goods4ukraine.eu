import { MarkerClusterer } from '@googlemaps/markerclusterer';

const map = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 7,
});

const infoWindow = new google.maps.InfoWindow({
    content: '',
    disableAutoPan: true,
});

const bounds = new google.maps.LatLngBounds();

const svgMarker = {
    // path:'M14.5501 0.329175C13.5889 0.326807 12.6469 0.598108 11.8342 1.11136C11.0215 1.6246 10.3718 2.35859 9.96087 3.22749C9.47624 2.17418 8.64472 1.31914 7.6053 0.805299C6.56589 0.291461 5.38159 0.149972 4.25038 0.404485C3.11916 0.658997 2.1096 1.29409 1.39045 2.20358C0.671303 3.11308 0.286159 4.24186 0.299403 5.40123C0.299403 10.7148 9.96087 17.7191 9.96087 17.7191C9.96087 17.7191 19.6223 10.7148 19.6223 5.40123C19.6223 4.05604 19.0879 2.76594 18.1367 1.81475C17.1855 0.86355 15.8953 0.329175 14.5501 0.329175Z',
    path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z',
    fillColor: "blue",
    fillOpacity: 0.6,
    strokeWeight: 0,
  };

const markers = ads.map((data) => {
    bounds.extend(data.position);

    const marker = new google.maps.Marker({
        position: data.position,
        title: data.title,
        // icon:svgMarker,
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
