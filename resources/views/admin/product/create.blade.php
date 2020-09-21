@extends('layouts.admin.master')
@section('title','Create New Product')
@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="page-header-title">
			<h4 class="pull-left page-title">Create New Product </h4>
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
			<div class="panel-heading"><h3 class="panel-title">Product Form</h3></div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" action="{{ route ('product.store') }}" method="post" enctype="multipart/form-data">
					@csrf
						@include('admin.product._form')

					<button type="submit" class="btn btn-success waves-effect pull-right waves-light m-1-8">Create</button>
				</form>
			</div> <!-- panel-body -->
		</div> <!-- panel -->
	</div> <!-- col -->
</div> <!-- End row -->

<!-- End admin form  -->
@endsection