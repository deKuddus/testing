<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
?>


    

<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('server_ip', 'Server Ip', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('server_ip',Request::old('server_ip'),['id'=>'server_ip','class' => 'form-control','required'=> 'required',  'placeholder'=>'ex: 192.168.1.0']) !!}
                <span class="error">{!! $errors->first('server_ip') !!}</span>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('server_name', 'Server Name', array('class' => 'col-form-label')) !!}
                {!! Form::text('server_name',Request::old('server_name'),['id'=>'server_name','class' => 'form-control','placeholder'=>'Enter server name' ]) !!}
                <span class="error">{!! $errors->first('server_name') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('username', 'User Name', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('username',Request::old('username'),['id'=>'username','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter username']) !!}
                <span class="error">{!! $errors->first('username') !!}</span>
            </div>
        </div>
    </div>

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
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('operating_system', 'Operating System', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::Select('operating_system',array('Linux'=>'Linux','Windows'=>'Windows','Mac Os'=>'Mac Os','CentOs 7'=>'CentOs 7','Ubuntu 18'=>'Ubuntu 18','Debain 9'=>'Debain 9'),Request::old('operating_system'),['id'=>'operating_system', 'class'=>'form-control selectheight select2bs4']) !!}
                <span class="error">{!! $errors->first('operating_system') !!}</span>
            </div>
        </div>
    </div>

     <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('vpn_type', 'Vpn Type', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::Select('vpn_type',array('OpenConnect'=>'OpenConnect','OpenVpn'=>'OpenVpn','SSH Tunnel'=>'SSH Tunnel','SSL Tunnel'=>'SSL Tunnel','S Tunnel'=>'S Tunnel','Proxy Squid'=>'Proxy Squid','VpnConnect'=>'VpnConnect','PPTR Protocol'=>'PPTR Protocol','VPS to VPN'=>'VPS to VPN'),Request::old('vpn_type'),['id'=>'vpn_type', 'class'=>'form-control selectheight select2bs4']) !!}
                <span class="error">{!! $errors->first('vpn_type') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('vpn_connection', 'Vpn Connection', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('vpn_connection',Request::old('vpn_connection'),['id'=>'vpn_connection','class' => 'form-control','required'=> 'required','placeholder'=>'Enter vpn_connection' ]) !!}
                <span class="error">{!! $errors->first('vpn_connection') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('port', 'Open Connect Port', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('port',Request::old('port'),['id'=>'port','class' => 'form-control','required'=> 'required','placeholder'=>'Enter Open Connect Port' ]) !!}
                <span class="error">{!! $errors->first('port') !!}</span>
            </div>
        </div>
    </div>

   
    <div class="col-md-12">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('status', 'Status', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::Select('status',array('1'=>'Active','0'=>'Inactive'),Request::old('status'),['id'=>'status', 'class'=>'form-control selectheight select2bs4']) !!}
                <span class="error">{!! $errors->first('status') !!}</span>
            </div>
        </div>
    </div>
   
    <div class="col-md-12">

        {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}&nbsp;
    </div>

</div>

