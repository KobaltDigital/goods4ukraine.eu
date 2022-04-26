require('./bootstrap');

import Alpine from 'alpinejs';

require('./components/map');

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {

	/* This is basic - uses default settings */

	$("a#single_image").fancybox();

	/* Using custom settings */

	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	/* Apply fancybox to multiple items */

	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600,
		'speedOut'		:	200,
		'overlayShow'	:	false
	});

});

window.googleAutocomplete = {
    autocompleteField: function (fieldId) {
        var autocomplete = new google.maps.places.Autocomplete(
            document.getElementById(fieldId)
        );
        google.maps.event.addListener(autocomplete, "place_changed", function () {
            // Segment results into usable parts.
            var place = autocomplete.getPlace();

            document.getElementById("latitude").value = place.geometry.location.lat();
            document.getElementById("longitude").value = place.geometry.location.lng();
        });
    }
};

// Attach listener to address input field.
window.googleAutocomplete.autocompleteField("location_field");

// for first time when lat and long is still empty
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var location_field = document.getElementById("location_field");

if (latitude && latitude.value == '' && longitude.value == '') {
    console.log('latitude is empty, asking for geolocation');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log('Geolocation is not supported by this browser.');
    }
}

function showPosition(position) {
    console.log('new lat and long will be set.');

    latitude.value = position.coords.latitude;
    longitude.value = position.coords.longitude;

    // using other key because this is an open key, not restricted.
    const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=` + position.coords.latitude + `,` + position.coords.longitude + `&key=AIzaSyBR-4XYGeEEnH5A0L3qVMt1yjcY8Exd82k`;
    console.log('Checking ' + url);

    fetch(url).then(response => response.json()).then(json => {
        console.log('Getting response', json.results[0].address_components);
        const city = json.results[0].address_components.find(component => component.types.includes('locality'));
        console.log('Checking if  location.value: (' + location_field.value + ') is empty');
        if (location_field.value == "") {
            location_field.value = city.long_name;
        }
    });
}
