@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-success text-white" style="cursor: pointer;">
        <h4>
        	<strong>Online Users</strong>
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Users</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Reseller</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Change Password</th>
                    <th>Reset Pin</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{isset($values->reseller_id)?$values->admin($values->reseller_id):auth()->user()->name}}</td>
                    <td>{{$values->name}}</td>
                    <td>{{$values->email}}</td>
                    <td>{{$values->username}}</td>
                    <td>{{$values->password}}</td>
                    <td>
                    	<a class="btn btn-sm btn-danger" style="color: white" onclick="Show('Change Password','{{ url('changePassword'.'/'.$values->id) }}')"><i class="fa fa-lock text-white"></i> Change Password</a>
                   </td>
                    <td></td>

                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection