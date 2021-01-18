
<form action="{{ route('bulk.reseller.batch.store') }}" method="POST">
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
                <th>User Limit</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Billing System</th>
           </tr>
       </thead>

       <tbody>
        <?php $new = $resellers + 1;?>
        @for($i=0;$i<$row;$i++)

        <tr>
            <td>
                {{$i+1}}
            </td>
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="name[]"
                placeholder="Enter Full Name" value="{{$username}}-{{$new++}}" required="">
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
                <input style="width: 200px;" type="date" class="form-control capitalize" name="from_date[]"
                placeholder="Enter From Date" required="" value="{{date('01-m-Y')}}">
            </td>

             <td>
                <input style="width: 200px;" type="date" class="form-control capitalize" name="to_date[]"
                placeholder="Enter To Date" required="" value="{{date('t-m-Y')}}">
            </td> --}}
            <td>
                <input style="width: 200px;" type="number" class="form-control capitalize" name="user_limit[]"
                placeholder="Enter User Limit" required="" value="10">
            </td>
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="username[]"
                placeholder="Enter Username" required="" value="{{$username}}-{{$new++}}">
            </td>
            <td>
                <input style="width: 200px;" type="text" class="form-control capitalize" name="password[]"
                placeholder="Enter Username" value="123456">
            </td>

            <td>
                <select class="form-control" name="billing_system[]">
                    @if(count($billing_system)>0)
                    @foreach($billing_system as $key=> $data)
                    <option value="{{$key}}">{{$data}}</option>
                    @endforeach
                    @endif
                </select>
            </td>
    </tr>

    @endfor
</tbody>

<tfoot>
    <tr>
        <td colspan="7">
            <button type="submit" class="btn btn-success btn-mini " style="float: right" name="submit">
                <i class="fa fa-plus" area-hidden="true"></i> Save All
            </button>
        </td>
    </tr>
</tfoot>
</table>

</form>
