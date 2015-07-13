@extends('page.home')

@section('mainbodycontent')

	<p>Hello {{ $basic_info->firstname }},</p>	
	<p>Welcome to <strong>Silver Jubilee Portal</strong></p>
	<p>Kindly Update your information by going to the links below:<br>
	<strong><a href="{{ URL::route('basic-info') }}">Basic Information</a></strong><br>
	<strong><a href="{{ URL::route('home-info') }}">Home Information</a></strong><br>	
	You can update your details later by choosing the forms from the menu on the top right
	 under your roll number.</p> 
	<p>We would really appriciate if you spread a word about this to your friends too.</p>
	<p>With warm regards,<br>
	I&AR Team</p>

	<p><strong>PS:</strong> If you face any issues, visit the About Us section to get more details on how to report an Issue.</p>

@stop