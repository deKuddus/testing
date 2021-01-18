<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
?>
<div class="row">

    @if(auth()->user()->role_id=='2')
        <input type="hidden" name="reseller_id" value="{{auth()->user()->reseller_id}}" placeholder="">
    @else
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::label('reseller_id', 'Select Reseller', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                    {!! Form::Select('reseller_id', $reseller_list ,Request::old('reseller_id'),['id'=>'reseller_id', 'class'=>'form-control selectheighttype select2bs4']) !!}
                    <span class="error">{!! $errors->first('reseller_id') !!}</span>
                </div>
            </div>
        </div>
    @endif
    
    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('ticket_option', 'Server Name', array('class' => 'col-form-label')) !!}
                {!! Form::Select('ticket_option',array('Server Issue'=>'Server Issue','Paymet Problem'=>'Paymet Problem','Support'=>'All kind Of Support'),Request::old('ticket_option'),['id'=>'ticket_option', 'class'=>'form-control selectheight select2bs4']) !!}
                <span class="error">{!! $errors->first('ticket_option') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('name', 'Name', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('name',Request::old('name'),['id'=>'name','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter name']) !!}
                <span class="error">{!! $errors->first('name') !!}</span>
            </div>
        </div>
    </div>
     <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('email', 'Eamil', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::email('email',Request::old('email'),['id'=>'email','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter email']) !!}
                <span class="error">{!! $errors->first('email') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('subject', 'Subject', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('subject',Request::old('subject'),['id'=>'subject','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter subject']) !!}
                <span class="error">{!! $errors->first('subject') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('description', 'Describe your problem', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                 {!! Form::textarea('description',Request::old('description'),['id'=>'description','class' => 'form-control', 'placeholder'=>'Enter short description', 'rows'=>'5', 'cols'=>'50']) !!}
                <span class="error">{!! $errors->first('description') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
    <div class="form-group">

        <div class="form-line">
            {!! Form::label('image', 'Attact File', array('class' => 'col-form-label')) !!}
            (<span class="error">Supported format :: jpeg,png,jpg,gif & file size max :: 1MB</span>)


            <div style="position:relative;">
                <a class='btn btn-danger btn-sm font-10' href='javascript:;'>
                    Choose File...
                    <input name="image" type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                </a>
                &nbsp;
                <span class='label label-info' id="upload-file-info"></span>


            </div>

            @if(isset($data['image'] ) && !empty($data['image']) )
            <a target="_blank" href="{{URL::to('')}}/public/ticket/{{$data->image}}" style="margin-top: 5px;" class="btn btn-danger btn-sm font-10"><img src="{{URL::to('')}}/public/ticket/{{$data->image}}" height="50px" alt="{{$data['image']}}" ></img>
            </a>
            @endif
        </div>
    </div> 
</div>

    @if(auth()->user()->role_id=='2')
        <input type="hidden" name="status" value="0" placeholder="">
    @else
        <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('status', 'Status', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::Select('status',array('0'=>'Pending','1'=>'Solved'),Request::old('status'),['id'=>'status', 'class'=>'form-control selectheight select2bs4']) !!}
                <span class="error">{!! $errors->first('status') !!}</span>
            </div>
        </div>
    </div>
    @endif

<div class="col-md-12">

    {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}&nbsp;
</div>

</div>

