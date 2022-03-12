
export default () => ({
    location: '',
    init() {
        console.log(this);
        if (window.navigator.geolocation) {
            window.navigator.geolocation.getCurrentPosition((data) => {
                const key = 'AIzaSyCRnpA6eY0L-jWIH65qRLmEs4M_u2f7kzY';
                console.log(this);
                const { latitude, longitude } = data.coords;
                const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${key}`;
                fetch(url).then(response => response.json()).then(json => {
                    const city = json.results[0].address_components.find(component => component.types.includes('locality'));
                    this.location = city;
                });
            }, this.error);
        }
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
