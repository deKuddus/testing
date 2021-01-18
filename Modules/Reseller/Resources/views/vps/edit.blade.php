{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['vps.update', $data->id],"class"=>"", 'id' => '']) !!}

@include('reseller::vps._form')

{!! Form::close() !!}

