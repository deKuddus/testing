@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
	<div class="card-header bg-success text-white" style="cursor: pointer;">
		<h4>
			<strong>New Users</strong>
			<a class="btn btn-danger btn-sm" style="float: right" href="{{ url('manage-pin/customers') }}">Go Back</a>
		</h4>
	</div>
	<div class="card-body">

		{!! Form::open(['route' => 'customers.store',  'files'=> true, 'id'=>'create-form', 'class' => 'form-horizontal']) !!}

			@include('customer::users._form')

		{!! Form::close() !!}

	</div>
</div>

@endsection
