

var vm = new Vue({

	el: '#app',

	data: { 
		link: '',
		band: ''
	},

	methods: {
		checkLink: function() { 
			getPageData(vm.link);
		}
	}
})


 function getPageData(url) {
	var facebook = 'https://www.facebook.com/';

	if(url.search(facebook) == -1) {
		vm.link = '';
		alert('Sorry, unos je pogrešan. Pokušajte ponovno.');
		return;
	}

	var page = url.substring(25);

	// Get Facebook Page data
	FB.login(function(response) {
		if (response.status === 'connected') {
			FB.api('/' + page, {fields: [ 'name', 'genre', 'picture.width(300).height(300)' ]}, function(response) {
				if(!response || response.error) {
					$('#next').prop('disabled', true);
					alert("Greška ! sorry.");
					location.reload();
				}
					vm.band = response;
			});
		}
	});
}