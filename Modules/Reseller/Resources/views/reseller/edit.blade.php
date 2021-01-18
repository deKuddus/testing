{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['resellers.update', $data->id],"class"=>"", 'id' => '']) !!}

@include('reseller::reseller._form')

{!! Form::close() !!}

