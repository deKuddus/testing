@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
	<div class="card-header bg-success text-white" style="cursor: pointer;">
		<h4>
			<strong>New Package</strong>
			<a class="btn btn-danger btn-sm" style="float: right" href="{{ url('package/packages') }}">Go Back</a>
		</h4>
	</div>
	<div class="card-body">

		{!! Form::open(['route' => 'packages.store',  'files'=> true, 'id'=>'create-form', 'class' => 'form-horizontal']) !!}

			@include('package::package._form')

		{!! Form::close() !!}

	</div>
</div>

@endsection
