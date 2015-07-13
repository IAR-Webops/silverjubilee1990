@extends('layout.main')

@section('content')

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-offset-2 col-md-8">
		          <h4 class="text-center">Search</h4>        	
		          <hr>		       
					All Search fields are Optional
		          <form action="{{ URL::route('search-post') }}" class="form-horizontal" role="form" method="post">

					<!-- Field - Department and Hostel and Degree Type -->
		          	<div class="form-group">
		          		<div class="col-sm-12 col-md-4">
		          			<label>Select Department :</label>
				            <select data-toggle="select" class="form-control select select-default" name="department" id="department">
				              <optgroup label="Department">
				              	@foreach ($static_departments as $static_department)
				                <option value="{{$static_department->deptartment_name}}">{{$static_department->deptartment_name}}</option>
								@endforeach		                
				              </optgroup>
				            </select>				           
				    	</div>
				    	<div class="col-sm-12 col-md-4">
		          			<label>Select Hostel :</label>				    	
				            <select data-toggle="select" class="form-control select select-default" name="hostel" id="hostel">
				              <optgroup label="Hostel">
				              	@foreach ($static_hostels as $static_hostel)
				                <option value="{{$static_hostel->hostel_name}}">{{$static_hostel->hostel_name}}</option>		                
								@endforeach		                
				              </optgroup>
				            </select>				                     
				    	</div>
				    	<div class="col-sm-12 col-md-4">
		          			<label>Select Degree Type :</label>
				            <select data-toggle="select" class="form-control select select-default" name="degreetype" id="degreetype">
				              <optgroup label="Hostel">
				                <option value="B. Tech">B. Tech</option>
				                <option value="Dual Degree">Dual Degree</option>		                
				                <option value="M. Tech">M. Tech</option>		                
				                <option value="MS">MS</option>		                
				                <option value="PhD">PhD</option>		                
				                <option value="MA (HS)">MA (HS)</option>		                
				                <option value="MBA">MBA</option>		                
				                <option value="M.Sc">M.Sc</option>		                
				              </optgroup>
				            </select>				                     
				    	</div>
				</div>
				
				<!-- Field - Name -->
	            <div class="form-group">
	              <div class="col-sm-12 col-md-4">
		          	<label>Select First Name :</label>
	                <input type="text" class="form-control" name="firstname" placeholder="First Name *" value="" >
	              </div>	             
	              <div class="col-sm-12 col-md-4">
		          	<label>Select Last Name :</label>
	                <input type="text" class="form-control" name="lastname" placeholder="Last Name *" value="" >
	              </div>
	              <div class="col-sm-12 col-md-4">
		          	<label>Select Address :</label>
	                <input type="text" class="form-control" name="currentaddress" placeholder="City, State or Country" value="">
	              </div>
	            </div>

	            <hr>
	          	<!-- Field - Submit -->
	          	<div class="form-group">
	          		<div class="col-sm-12 col-md-6">
	          			<input class="btn btn-block btn-lg btn-primary" type="submit" value="Search">
	          		</div>
	          		<div class="col-sm-12 col-md-6">
				        <a class="btn btn-block btn-lg btn-danger" href="{{ URL::route('home') }}">Cancel</a>          			
	          		</div>
	          		{{ Form::token() }}
	          	</div>

	          </form>

			</div>
			<div class="col-sm-12 col-md-offset-2 col-md-8">
		          <h4 class="text-center">Search Results</h4>        	
		          <hr>		       							
					@if(Session::has('basic_infos'))
					<table class="table">
						<thead>
					        <tr>
					          <th>#</th>
					          <th>First Name</th>
					          <th>Last Name</th>
					          <th>Department</th>
					          <th>Hostel</th>
					          <th>Degree</th>
					          <th>Current Address</th>
					    </thead>
						@foreach(Session::get('basic_infos') as $key => $basic_info)
						<tr>
				          <th scope="row">{{ $key + 1 }}</th>
				          <td>{{ $basic_info->firstname }}</td>
				          <td>{{ $basic_info->lastname }}</td>
				          <td>{{ $basic_info->department }}</td>
				          <td>{{ $basic_info->hostel }}</td>
				          <td>{{ $basic_info->optionsRadiosDegree }}</td>
				          <td>{{ $basic_info->current_city }}</td>
				        </tr>
			            @endforeach
					</table>
			        @else
			        	Please Click on the Search Button
		        	@endif
		    </div>
			
		</div>
	</div>

		


@stop
