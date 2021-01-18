@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
            @if(isOptionPermitted('manage-vps/vps','create'))
               <a class="btn btn-danger" style="float: left" href="{{ url('manage-vps/vps/create') }}"><i class=" fa fa-plus"></i>&nbsp;Add VPS</a>
            @endif

        	<strong style="float: right">VPS LIST</strong>

        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">VPS LIST</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Server IP</th>
                    <th>Server Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Operating System</th>
                    <th>VPN Type</th>
                    <th>VPN Connection</th>
                    <th>Port</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td><a href="#">{{$values->server_ip}}</a></td>
                    <td>{{$values->server_name}}</td>
                    <td>{{$values->username}}</td>
                    <td>{{$values->password}}</td>
                    <td>{{$values->operating_system}}</td>
                    <td>{{$values->vpn_type}}</td>
                    <td>{{$values->vpn_connection}}</td>
                    <td>{{$values->port}}</td>
                    <td>@if($values->status=='1') Active @else InActive @endif</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Vps',
                            'object' => $values,
                            'link' => 'manage-vps/vps'
                        ])
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection