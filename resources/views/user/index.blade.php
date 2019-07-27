@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Id</th>				
				@php 
				$nameOrder = 'asc';
				if (request()->has('sortBy') && request()->query('sortBy') == 'name' && request()->has('orderBy') && request()->query('orderBy') == 'asc') {
					$nameOrder = 'desc';
				}
				@endphp
				<th><a href="{{ url()->current().'?sortBy=name&orderBy=' . $nameOrder }}">Name</a></th>

				@php 
				$emailOrder = 'asc';
				if (request()->has('sortBy') && request()->query('sortBy') == 'email' && request()->has('orderBy') && request()->query('orderBy') == 'asc') {
					$emailOrder = 'desc';
				}
				@endphp
				<th><a href="{{ url()->current().'?sortBy=email&orderBy=' . $emailOrder }}">Email</a></th>
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