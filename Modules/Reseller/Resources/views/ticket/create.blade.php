@extends('layouts.index')

@section('content')
<div class="col-md-6" >
<div class="card" style="margin-bottom: 25px;">
	<div class="card-header bg-success text-white" style="cursor: pointer;">
		<h4>
			<strong>New Tickets</strong>
			<a class="btn btn-danger btn-sm" style="float: right" href="{{ url('manage-ticket/tickets') }}">Go Back</a>
		</h4>
	</div>
	<div class="card-body">

		{!! Form::open(['route' => 'tickets.store',  'files'=> true, 'id'=>'create-form', 'class' => 'form-horizontal']) !!}

			@include('reseller::ticket._form')

		{!! Form::close() !!}

	</div>
</div>
</div>
@endsection
