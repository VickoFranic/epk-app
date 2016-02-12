<!-- Full Width Image Header -->
<header class="container">
	<div class="row">
	<div id="header-image">
		<img class="img img-responsive img-circle center-block" src="{{ $band['picture']['data']['url'] }}">
	</div>	
		<div class="headline text-center">
			<h1>{{ $band['name'] }}</h1>
			<h2>{{ $band['genre'] }}</h2>
		</div>
	</div>
</header>

	<hr class="featurette-divider">
	<!-- First Featurette -->
	<div class="featurette" id="about">
		<img class="featurette-image img-rounded img-responsive pull-right" src="{{ $band['albums']['data'][1]['photos']['data'][0]['images'][0]['source'] }}">
		<h2 class="featurette-heading">Ukratko
			<span class="text-muted">o nama</span>
		</h2>
		<p class="lead">{{ $band['about'] }}</p>
	</div>

	<hr class="featurette-divider">

	<!-- Second Featurette -->
	<div class="featurette" id="services">
		<img class="featurette-image img-rounded img-responsive pull-left" src="{{ $band['albums']['data'][2]['photos']['data'][0]['images'][0]['source'] }}">
		<h2 class="featurette-heading">Naša
			<span class="text-muted">biografija</span>
		</h2>
		<p class="lead">{{ $band['bio'] }}</p>
	</div>

	<hr class="featurette-divider">

	<!-- Third Featurette -->
	<div class="featurette" id="contact">
		<img class="featurette-image img-rounded img-responsive pull-right" src="{{ $band['albums']['data'][3]['photos']['data'][0]['images'][0]['source'] }}">
		<h2 class="featurette-heading">Članovi
			<span class="text-muted">benda</span>
		</h2>
		<p class="lead">{{ $band['band_members'] }}</p>
	</div>