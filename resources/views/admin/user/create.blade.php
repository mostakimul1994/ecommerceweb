@extends('layouts.admin.master')
@section('title','Create New Admin')
@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="page-header-title">
			<h4 class="pull-left page-title">Create New Admin </h4>
			<ol class="breadcrumb pull-right">
				<li><a href="{{ route ('admin.dashboard') }}">Dasdboard</a></li>
				<li class="active">Create</li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- Create Admin Form  -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title">Admin Form</h3></div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" action="{{ route ('user.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="col-md-2 control-label" for="admin-name">Admin Name</label>
						<div class="col-md-10">
							<input type="text" name="name" value="{{old('name')}}" class="form-control" id="admin-name" placeholder="Enter your Name" >
							@error('name')
							<div class="text-danger">
								{{ $message}}
							</div>
						@enderror
						</div>
						
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="example-email">Email</label>
						<div class="col-md-10">
							<input type="email" id="example-email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email" >
								@error('email')
							<div class="text-danger">
								{{ $message}}
							</div>
						@enderror
						</div>
					
					</div>


					<div class="form-group">
						<label class="col-md-2 control-label" for="password">Password</label>
						<div class="col-md-10">
							<input type="password" name="password" class="form-control" id="password" placeholder="password" >
								@error('password')
							<div class="text-danger">
								{{ $message}}
							</div>
						@enderror
						</div>
					
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="c-password">Confirm Password</label>
						<div class="col-md-10">
							<input type="password" name="password_confirmation"  class="form-control" id="c-password" placeholder="password">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="image">Upload Image</label>
						<div class="col-sm-10">
							<input type="file" name="image" class="form-control" id="image" placeholder="Upload Image">
							@error('image')
							<div class="text-danger">
								{{ $message}}
							</div>
						@enderror
						</div>
					</div>

					<button type="submit" class="btn btn-success waves-effect pull-right waves-light m-1-8">Create</button>
				</form>
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->
</div> <!-- End row -->

<!-- End admin form  -->
@endsection