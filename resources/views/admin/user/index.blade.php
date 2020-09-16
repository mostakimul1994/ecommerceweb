@extends('layouts.admin.master')
@section('title','Create New Admin')
@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="page-header-title">
			<h4 class="pull-left page-title">Admin Lists</h4>
			<ol class="breadcrumb pull-right">
				<li><a href="{{ route ('admin.dashboard') }}">Dasdboard</a></li>
				<li class="active">Admin List</li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- Create Admin List  -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Admin Lists</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead> 
								<tbody>
									@foreach($users as $id=>$user)
									<tr>
										<td>{{ ($users->currentpage()-1) * $users->perpage() + $id + 1 }}</td>
										<td>{{ $user->name }}</td>
										<td>{{$user->email}}</td>
										<td><img src="{{ asset($user->image)}}" alt="photo" width="10%"></td>

										<td>
											<button class="btn btn-info"><a  href="{{ route('user.edit',$user->id) }}">Edit</a></button>
											<form action="{{ route ('user.destroy',$user->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('delete')
												<button class="btn btn-danger" onclick="return confirm('Are You Sure to Delete ?')" >Delete</button>

											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{!! $users->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End row -->
<!-- End admin list  -->
@endsection