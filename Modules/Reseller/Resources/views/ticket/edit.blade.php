{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['tickets.update', $data->id],"class"=>"", 'id' => '']) !!}

@include('reseller::ticket._form')

{!! Form::close() !!}

