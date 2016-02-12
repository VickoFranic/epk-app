@extends('layouts.master')
	@section('content')

		@if(isset($band))
			@include('layouts.epk')
		@else
			@include('layouts.welcome')
		@endif
	@endsection