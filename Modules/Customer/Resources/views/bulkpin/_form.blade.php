
<form action="{{ route('bulk.pin.batch.store') }}" method="POST">
    @csrf @method('POST')
    <table class="table table-responsive table-bordered table-striped table-hover">

        <thead>
            <tr>
                <th>SL No</th>
                <th>Name</th>
                {{-- <th>Email</th> --}}
                <th>Mobile</th>
                {{-- <th>From Date</th>
                <th>To Date</th> --}}
                <th>User Name</th>
                <th>Password</th>
                {{-- <th>Package</th>
                <th>Payment Status</th>
                <th>Billing System</th> --}}
           </tr>
       </thead>

       <tbody>
        <?php $new = $customers + 1;?>
        @for($i=0;$i<$row;$i++)

        <tr>
            <td>
                {{$i+1}}
            </td>
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="name[]"
                placeholder="Enter Full Name" required="" value="{{$username}}-{{$new++}}">
                <input type="hidden" name="num_row" value="{{$row}}">
            </td>
            {{-- <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="email[]"
                placeholder="Enter Email" required="">
            </td> --}}
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="mobile[]"
                placeholder="" required="">
            </td>

           {{--  <td>
                <input style="width: 200px;" type="date" class="form-control capitalize datepicker" name="from_date[]"
                placeholder="Enter From Date" required="" value="{{date('01-m-Y')}}">
            </td>

             <td>
                <input style="width: 200px;" type="date" class="form-control capitalize datepicker" name="to_date[]"
                placeholder="Enter To Date" required="" value="{{date('t-m-Y')}}">
            </td> --}}
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="username[]"
                placeholder="Enter Username" required="" value="{{$username}}-{{$new++}}">
            </td>
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="password[]"
                placeholder="Enter Username" value="123456">
            </td>

            {{-- <td>
                <select class="form-control" name="package_id[]">
                    @if(count($package_list)>0)
                    @foreach($package_list as $package)
                    <option value="{{$package->id}}" selected>{{$package->title}}</option>
                    @endforeach
                    @endif
                </select>
            </td>

            <td>
                <select class="form-control" name="billing_status[]">
                    <option value="unpaid" selected>Un Paid</option>
                    <option value="paid" >Paid</option>
                    
                </select>
            </td>

            <td>
                <select class="form-control" name="billing_system[]">
                    <option value="30" selected>1 Month</option>
                    <option value="60">2 Month</option>
                    <option value="90">6 Month</option>
                    <option value="unlimied">Unlimied</option>
                </select>
            </td> --}}
    </tr>

    @endfor
</tbody>

<tfoot>
    <tr>
        <td colspan="5">
            <button type="submit" class="btn btn-success btn-mini" style="float:right;" name="submit">
                <i class="fa fa-plus" area-hidden="true"></i> Save All
            </button>
        </td>
    </tr>
</tfoot>
</table>

</form>
