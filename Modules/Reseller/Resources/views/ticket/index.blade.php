@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
            @if(isOptionPermitted('manage-ticket/tickets','create'))
               <a class="btn btn-danger" style="float: right" href="{{ url('manage-ticket/tickets/create') }}"><i class=" fa fa-plus"></i>&nbsp;Create Tickets</a>
            @endif

        	<strong >{{$pageTitle}}</strong>

        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">{{$pageTitle}}</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Reseller Name</th>
                    <th>Ticket Option</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Image</th>
                    <th>Ticket Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
            @foreach($data as $key => $values)
                <tr id="tr-{{ $values->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td><a href="#">{{$values->reseller->name}}</a></td>
                    <td>{{$values->ticket_option}}</td>
                    <td>{{$values->name}}</td>
                    <td>{{$values->email}}</td>
                    <td>{{$values->subject}}</td>
                   <td class="text-center">
                        <img src="{{showImage($values,'ticket')}}" style="height: 50px">
                    </td>
                    
                    <td>@if($values->status=='1') <a class="btn btn-success btn-sm">Solved</a> @else <a class="btn btn-warning btn-sm">Pending</a> @endif</td>
                    <td class="text-center" style="width: 15%">
                        <a class="btn btn-sm btn-info" title="Show Full Message" href="{{ route('tickets.show',$values->id) }}"><i class="fa fa-eye text-white"></i></a>
                        @include('layouts.crudButtons',[
                            'text' => 'Tickets',
                            'object' => $values,
                            'link' => 'manage-ticket/tickets'
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