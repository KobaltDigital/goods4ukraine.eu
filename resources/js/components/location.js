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
window.googleAutocomplete.autocompleteField("location");

// for first time when lat and long is still empty
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var location = document.getElementById("location");

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
    const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=` + position.coords.latitude + `,` + position.coords.longitude + `&key=AIzaSyCxzPwEB7A9i6Fwvi41SrVbApygce3Sq9c`;
    console.log('Checking ' + url);

    fetch(url).then(response => response.json()).then(json => {
        console.log('Getting response', json.results[0].address_components);
        const city = json.results[0].address_components.find(component => component.types.includes('locality'));
        console.log('Checking if  location.value: (' + location.value + ') is empty');
        if (location.value == "") {
            location.value = city.long_name;
        }
    });
}
