@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Admins</strong>
            
            @if(isOptionPermitted('setups/admins','create'))
        	   <a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Admin','{{ url('setups/admins/create') }}')"><i class=" fa fa-plus"></i>&nbsp;New Admin</a>
            @endif
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 offset-md-5">
                <select class="form-control select2bs4" name="role_id" id="role_id" onchange="openLink('{{ url('setups/admins') }}/'+$('#role_id').val())">
                        <option value="0">All User Roles</option>
                        @if(isset($roles[0]))
                        @foreach ($roles as $key => $role)
                            <option value="{{$role->id}}" {{$role_id==$role->id ? 'selected' : ''}}>{{$role->name}}</option>
                        </optgroup>
                        @endforeach
                        @endif
                    </select>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Admins</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($admins[0]))
            @foreach($admins as $key => $admin)
                <tr id="tr-{{ $admin->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->role ? $admin->role->name : ''}}</td>
                    <td>{{genders()[$admin->gender]}}</td>
                    <td class="text-center">
                        <img src="{{adminImage($admin)}}" style="height: 50px">
                    </td>
                    <td class="text-center" style="width: 15%">
                        <div class="btn-group">
                            @if($admin->status=="1")
                                <a class="btn btn-sm btn-success"><i class="fa fa-check text-white"></i></a>
                            @else
                                <a class="btn btn-sm btn-danger"><i class="fa fa-ban text-white"></i></a>
                            @endif

                            @if($admin->id != auth()->user()->id)
                                @if(isOptionPermitted('setups/admins','edit'))
                                    <a class="btn btn-sm btn-info" onclick="Show('Edit Admin','{{ url('setups/admins/'.$admin->id.'/edit') }}')"><i class="fa fa-edit text-white"></i></a>
                                @endif

                                @if(isOptionPermitted('setups/admins','delete'))
                                    <a class="btn btn-sm btn-danger" onclick="Delete('{{ $admin->id }}','{{ url('setups/admins') }}')"><i class="fa fa-trash text-white"></i></a>
                                @endif
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection