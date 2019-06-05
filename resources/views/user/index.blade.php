@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
			</tr>				
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
				</tr>
			@endforeach
		</table>
		
		{{ $users->links() }}
	 </div>
</div>
@endsection