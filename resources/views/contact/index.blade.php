@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h2>Data Contact</h2>
		</div>
	</div>
	<a href="{{ url('/contacts/create')}}" class="btn btn-danger mb-1">Add New</a>

	@if(session()->get('success'))
	<div class="alert alert-success" role="alert">
		<strong>{{session()->get('success')}}</strong> Berhasil Dong.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th text-align="center" colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contacts as $con)
					<tr>
						<td>{{$con->id}}</td>
						<td>{{$con->name}}</td>
						<td>{{$con->email}}</td>
						<td>{{$con->phone}}</td>
						<td>{{$con->address}}</td>
						<td><a href="{{url("contacts/{$con->id}/edit")}}" class="btn btn-warning">Edit</a></td>
						<td>
							<form action="{{url("contacts/{$con->id}")}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection