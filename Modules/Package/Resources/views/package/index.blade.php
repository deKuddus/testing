@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-success text-white" style="cursor: pointer;">
        <h4>
        	<strong>Package</strong>

            @if(isOptionPermitted('package/packages','create'))
        	   <a class="btn btn-danger btn-mini" style="float: right" href="{{ url('package/packages/create') }}"><i class=" fa fa-plus"></i>&nbsp;New Package</a>
            @endif
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Package</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Price</th>
                    <th>Validate Dayes</th>
                    <th>Pacakge Code</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{$values->title}}</td>
                    <td>{{$values->from_date}}</td>
                    <td>{{$values->to_date}}</td>
                    <td>{{$values->price}}</td>
                    <td>{{$values->validate_dayes}}</td>
                    <td>{{$values->package_code}}</td>
                    <td>@if($values->status=='1') Active @else InActive @endif</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Package',
                            'object' => $values,
                            'link' => 'package/packages'
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