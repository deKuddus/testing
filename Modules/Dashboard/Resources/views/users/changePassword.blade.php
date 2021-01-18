{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['password.update', $data->id],"class"=>"", 'id' => '']) !!}

<div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('password', 'Password', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('password',Request::old('password'),['id'=>'password','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter password']) !!}
                <span class="error">{!! $errors->first('password') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}&nbsp;
    </div>


{!! Form::close() !!}