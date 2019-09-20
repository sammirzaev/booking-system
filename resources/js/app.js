/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// require('template/jquery.min.js');
require('jquery');

// require('template/jquery.easing.1.3.js');
require('jquery.easing');

// require('template/bootstrap.min.js');
require('bootstrap');

// require('template/jquery.waypoints.min.js');
require('waypoints/src/waypoint');

// require('template/jquery.flexslider-min.js');
require('flexslider');

// require('template/owl.carousel.min.js');
require('owl.carousel');

// require('template/jquery.magnific-popup.min.js');
require('magnific-popup');

// require('template/magnific-popup-options.js');

// require('template/bootstrap-datepicker.js');
require('bootstrap-datepicker');

// require('template/jquery.stellar.min.js');
require('jquery.stellar/jquery.stellar');

// require('template/main.js');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
