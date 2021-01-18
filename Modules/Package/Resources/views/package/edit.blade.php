{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['packages.update', $data->id],"class"=>"", 'id' => '']) !!}

@include('package::package._form')

{!! Form::close() !!}

