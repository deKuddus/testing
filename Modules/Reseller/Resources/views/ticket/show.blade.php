@extends('layouts.index')

@section('content')
<div class="col-md-12" >
	<div class="card" style="margin-bottom: 25px;">
		<div class="card-header bg-success text-white" style="cursor: pointer;">
			<h4>
				<strong>View Tickets</strong>
				<a class="btn btn-danger btn-sm" style="float: right" href="{{ url('manage-ticket/tickets') }}">Go Back</a>
			</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">  
                   
                <table id="" class="table table-bordered  table-striped">
                    <tr>
                        <th></th>
                        <td>
                            @if(isset($data->reseller_id))
                                {{$data->reseller->name}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Ticket Option</th>
                        <td>{{ isset($data->ticket_option)?ucfirst($data->ticket_option):''}}</td>
                    </tr>
                    
                    <tr>
                        <th>Name</th>
                        <td>{{ isset($data->name)?ucfirst($data->name):''}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ isset($data->email)?ucfirst($data->email):''}}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ isset($data->subject)?ucfirst($data->subject):''}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ isset($data->description)?ucfirst($data->description):''}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            @if(!empty($data->image))
                            
                                <img src="{{showImage($data,'ticket')}}">            
                           
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>@if($data->status=='1') Solved @else Pending @endif</td>
                    </tr>
                </table>
            </div>
		</div>
	</div>
</div>
@endsection