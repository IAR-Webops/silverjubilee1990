@extends('layout.main')

@section('content')
	@if(Auth::check())

		<div class="container-fluid">
			<div class="row">
				<!-- START - Navigation Left -->
				<!-- END - Navigation Left -->

				<!-- START - Main Body -->
			  		<div class="col-sm-12 col-md-offset-2 col-md-8">
						@yield('mainbodycontent')
			  		</div>
				<!-- END - Main Body -->

			</div>  
		</div>
		
	@else
		
		Sorry, not signed in.


	@endif
@stop

@section('jscontent')
	
@stop