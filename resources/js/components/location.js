export default () => ({
    location: '',
    latitude: '',
    longitude: '',
    autocompleteLocation (input) {

        // TODO: deze api url is nog niet de goeie denk ik, hier kunnen we die iig aanroepen
        // De geo cooords in de response moeten we denk ik in de hiddens fields: longitude / latitude laden
        // Deze vind je in home.blade.php, hier kunnen we vervolgens de afstand t.o.v. advertenties mee bepalen
        // De code voor het bepalen van de afstand staat in GetFilteredAds.php

        let url = `https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=geometry&input=${this.location}&inputtype=textquery&key=AIzaSyAE1Te60yDiGRPGsoyaMJHiYa6KBtIMwsA`;
        fetch(url).then(response => response.json()).then(json => {
            const result = json.results[0];
            console.log(result)
        });
    },
    success(data) {
        const key = 'AIzaSyCRnpA6eY0L-jWIH65qRLmEs4M_u2f7kzY';
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
