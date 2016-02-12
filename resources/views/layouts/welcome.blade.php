<div id="headerwrap">
	<div class="container" id="app">
		<div v-show="!band" >
			<div class="row">
				<h1>Treba ti jednostavni <a href="https://en.wikipedia.org/wiki/Press_kit" target="_blank">EPK</a> ?</h1><br/>
				<h2>Daj nam link na Facebook profil tvog benda:</h2>								
			</div>		
			<div class="row center-block">
				<form class="form col-md-10" role="form" method="POST">
					<div class="form-group">
						<input v-model="link" type="text" class="form-control" id="link" placeholder="https://www.facebook.com/MojBend">
					</div>
					<button v-show="link" v-on:click="checkLink" id="next" type="button" class="btn btn-success btn-lg center-block">Dalje</button>
				</form>
			</div>
		</div>

		<div v-show="band">
			<div class="row text-center">
				<img v-bind:src="band.picture.data.url" class="img img-responsive img-circle center-block">
				<h2>@{{ band.name }}</h2>
				<h3>@{{ band.genre }}</h3>
			</div>
			<hr>
			<form method="POST">
				<input type="hidden" name="id" value="@{{ band.id }}">
				{!! csrf_field() !!}
				<button id="generate" type="submit" class="btn btn-success btn-lg center-block">Generiraj EPK</button>
			</form>
		</div>

	</div><!-- /container -->
</div><!-- /headerwrap -->