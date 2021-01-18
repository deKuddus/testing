@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
	<div class="card-header bg-success text-white" style="cursor: pointer;">
		<h4>
			<strong>New Reseller</strong>
			<a class="btn btn-danger btn-sm" style="float: right" href="{{ url('reseller/resellers') }}">Go Back</a>
		</h4>
	</div>
	<div class="card-body">

		{!! Form::open(['route' => 'resellers.store',  'files'=> true, 'id'=>'create-form', 'class' => 'form-horizontal']) !!}

			@include('reseller::reseller._form')

		{!! Form::close() !!}

	</div>
</div>

@endsection
