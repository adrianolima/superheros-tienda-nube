/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('[data-deteleherophoto]').on('click', function (e) {
    e.preventDefault();
    var t = this;
    $.ajax({
        context: this,
        method: "POST",
        url: "/superheroes/deletephoto",
        data: {id: t.dataset.deteleherophoto},
        dataType: "json",
        success: function (msg) {
            alert(msg.info);
            if(!msg.error) {
                $(this).hide(400);
            }
        }
    })

});