@extends('layouts.main')
@section('content')
<div class="row">
		<div class="col-md-8 offset-sm-2 mb-2">
			<h2 class="display-6">Add New</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			<form action="{{ url('/contacts') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">FUll Name:</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="phone">Phone:</label>
					<input type="number" name="phone" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea name="address" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Add</button>
				</div>
			</form>
		</div>
	</div>
@endsection