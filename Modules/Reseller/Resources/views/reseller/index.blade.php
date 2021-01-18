@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-success text-white" style="cursor: pointer;">
        <h4>
        	<strong style="float: right">Resellers</strong>

            @if(isOptionPermitted('reseller/resellers','create'))
        	   <a class="btn btn-danger" style="float: left" href="{{ url('reseller/resellers/create') }}"><i class=" fa fa-plus"></i>&nbsp;New Reseller</a>
            @endif
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Resellers</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    {{-- <th>From Date</th>
                    <th>To Date</th> --}}
                    <th>User Limit</th>
                    <th>Billing System</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{$values->name}}</td>
                    <td>{{$values->username}}</td>
                    <td>{{$values->password}}</td>
                    <td>{{$values->email}}</td>
                    <td>{{$values->mobile}}</td>
                    <td>{{$values->address}}</td>
                 {{--    <td>{{$values->from_date}}</td>
                    <td>{{$values->to_date}}</td> --}}
                    <td>{{$values->user_limit}}</td>
                    <td>{{$values->billing_system}} Month</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Reseller',
                            'object' => $values,
                            'link' => 'reseller/resellers'
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