@extends('layouts.admin.master')
@section('title','Edit Admin')
@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="page-header-title">
			<h4 class="pull-left page-title">Update Admin </h4>
			<ol class="breadcrumb pull-right">
				<li><a href="{{ route ('user.index') }}">User List</a></li>
				<li class="active">Edit</li>
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
				  <form action="{{ route('user.update',$user->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('admin.user._form')
					<button type="submit" class="btn btn-success waves-effect pull-right waves-light m-1-8">Update</button>
				</form>
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->
</div> <!-- End row -->

<!-- End admin form  -->
@endsection