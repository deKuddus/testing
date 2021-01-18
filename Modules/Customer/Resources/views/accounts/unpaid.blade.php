@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-success text-white" style="cursor: pointer;">
        <h4>
        	<strong>Un Paid Users</strong>
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Users</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Reseller</th>
                    <th>Pacakge</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Billing System</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{isset($values->reseller_id)?$values->admin($values->reseller_id):auth()->user()->name}}</td>
                    <td>{{isset($values->package_id)?$values->package->title.'( '.$values->package->package_code.' )':''}}</td>
                    <td>{{isset($values->package_id)?number_format($values->package->price,2):''}}</td>
                    <td>
                        @if($values->billing_status=='unpaid')
                         <a href="#" class="btn btn-danger" title="unpaid">Un Paid</a>
                         @elseif($values->billing_status=='paid')
                         <a href="#" class="btn btn-success" title="paid">Paid</a>
                         @else
                         <a href="#" class="btn btn-warning" title="Not Assign">Not Assign</a>
                         @endif
                    </td>
                    <td>{{$values->name}}</td>
                    <td>{{$values->email}}</td>
                    <td>{{$values->mobile}}</td>
                    <td>{{$values->billing_system}}</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Users',
                            'object' => $values,
                            'link' => 'manage-pin/customers'
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