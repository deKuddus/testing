<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
?>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('title', 'Title', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter title','onkeyup'=>"convert_to_username();"]) !!}
                <span class="error">{!! $errors->first('title') !!}</span>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('slug', 'Slug', array('class' => 'col-form-label')) !!}
                {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','placeholder'=>'Enter slug' ]) !!}
                <span class="error">{!! $errors->first('slug') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('package_code', 'Package Code', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('package_code',Request::old('package_code'),['id'=>'package_code','class' => 'form-control','required'=> 'required','placeholder'=>'Enter Package Code' ]) !!}
                <span class="error">{!! $errors->first('package_code') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('price', 'Package Price', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::number('price',Request::old('price'),['id'=>'price','class' => 'form-control','required'=> 'required','placeholder'=>'Enter price' ]) !!}
                <span class="error">{!! $errors->first('price') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('validate_dayes', 'Package Validate Date', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::number('validate_dayes',Request::old('validate_dayes'),['id'=>'validate_dayes','class' => 'form-control','required'=> 'required','placeholder'=>'Enter validate dayes' ]) !!}
                <span class="error">{!! $errors->first('validate_dayes') !!}</span>
            </div>
        </div>
    </div>


  

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('from_date', 'From Date', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('from_date',Request::old('from_date'),['id'=>'from_date','class' => 'form-control datepicker','required'=> 'required','placeholder'=>'Enter From Date' ]) !!}
                <span class="error">{!! $errors->first('from_date') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('price', 'To Date', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('to_date',Request::old('to_date'),['id'=>'to_date','class' => 'form-control datepicker','required'=> 'required','placeholder'=>'Enter From Date' ]) !!}
                <span class="error">{!! $errors->first('to_date') !!}</span>
            </div>
        </div>
    </div>

    

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('status', 'Status', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::Select('status',array('1'=>'Active','0'=>'Inactive'),Request::old('status'),['id'=>'status', 'class'=>'form-control selectheight']) !!}
                <span class="error">{!! $errors->first('status') !!}</span>
            </div>
        </div>
    </div>
   


    <div class="col-md-12">

        {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}&nbsp;
    </div>

</div>

<script>

    function convert_to_username(){
        var str = document.getElementById("title").value;
        str = str.replace(/[^a-zA-Z0-123456789\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        document.getElementById("slug").value = str; 
    }
</script>