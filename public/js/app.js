(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var vm = new Vue({
	el: '#app',

	data: {
		link: '',
		band: ''
	},

	methods: {
		checkLink: function checkLink() {
			getPageData(vm.link);
		}
	}
});

function getPageData(url) {
	var facebook = 'https://www.facebook.com/';

	if (url.search(facebook) == -1) {
		vm.link = '';
		alert('Sorry, unos je pogrešan. Pokušajte ponovno.');
		return;
	}

	var page = url.substring(25);

	// Get Facebook Page data
	FB.login(function (response) {
		if (response.status === 'connected') {
			FB.api('/' + page, { fields: ['name', 'genre', 'picture.width(300).height(300)'] }, function (response) {
				if (!response || response.error) {
					$('#next').prop('disabled', true);
					alert("Greška ! sorry.");
					location.reload();
				}
				vm.band = response;
			});
		}
	});
}

},{}]},{},[1]);
