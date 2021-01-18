{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['customers.update', $data->id],"class"=>"", 'id' => '']) !!}

@include('customer::users._form')

{!! Form::close() !!}

