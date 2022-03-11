require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

import Location from './components/location';

Alpine.data('location', Location)

Alpine.start();
