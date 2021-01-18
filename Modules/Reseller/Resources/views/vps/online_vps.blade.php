@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
            <strong>Online VPS LIST</strong>

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
                   
                    <th>Operating System</th>
                    <th>VPN Type</th>
                    <th>VPN Connection</th>
                    <th>Port</th>
                    
                    
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td><a href="#">{{$values->server_ip}}</a></td>
                    <td>{{$values->server_name}}</td>
                    
                    <td>{{$values->operating_system}}</td>
                    <td>{{$values->vpn_type}}</td>
                    <td>{{$values->vpn_connection}}</td>
                    <td>{{$values->port}}</td>
                    
                   
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection