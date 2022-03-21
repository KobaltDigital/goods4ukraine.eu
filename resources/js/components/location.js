export default () => ({
    location: '',
    latitude: '',
    longitude: '',
    autocompleteLocation (input) {

        // TODO: deze api url is nog niet de goeie denk ik, hier kunnen we die iig aanroepen
        // De geo cooords in de response moeten we denk ik in de hiddens fields: longitude / latitude laden
        // Deze vind je in home.blade.php, hier kunnen we vervolgens de afstand t.o.v. advertenties mee bepalen
        // De code voor het bepalen van de afstand staat in GetFilteredAds.php

        let url = `https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=geometry&input=${this.location}&inputtype=textquery&key=AIzaSyBR-4XYGeEEnH5A0L3qVMt1yjcY8Exd82k`;
        fetch(url).then(response => response.json()).then(json => {
            const result = json.results[0];
            console.log(result)
        });
    },
    success(data) {
        const key = 'AIzaSyBR-4XYGeEEnH5A0L3qVMt1yjcY8Exd82k';
        const { latitude, longitude } = data.coords;
        const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${key}`;
        fetch(url).then(response => response.json()).then(json => {
            const city = json.results[0].address_components.find(component => component.types.includes('locality'));
            this.location = city;
        });
    },
    error(data) {
        console.log(data);
    }
})

// for first time when lat and long is still empty
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var location = document.getElementById("location");

if(latitude && latitude.value == '' && longitude.value == '') {
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

    const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=`+position.coords.latitude+`,`+position.coords.longitude+`&key=AIzaSyBR-4XYGeEEnH5A0L3qVMt1yjcY8Exd82k`;
    console.log('Checking ' + url);

    fetch(url).then(response => response.json()).then(json => {

        console.log('Getting response', json.results[0].address_components);
        const city = json.results[0].address_components.find(component => component.types.includes('locality'));
        location.value = city.long_name;
    });

}