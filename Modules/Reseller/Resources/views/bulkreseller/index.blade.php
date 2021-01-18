@extends('layouts.index')

@section('content')

<div class="card" style="margin-bottom: 25px;">
	<div class="card-header bg-success text-white" style="cursor: pointer;">
		<h4>
			<strong>Bulk Reseller</strong>
			
		</h4>
	</div>
	<div class="card-body">

		<div class="row">
			
			<div class="col-md-4">
				<div class="form-group">
					<div class="form-line">
						{!! Form::label('numberofrow', 'Number Of Reseller', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
						 <input  type="number" min="1" id="numberofrow" value="3" required="required"
                        class="form-control">
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<div class="form-line">
						{!! Form::label('username', 'Reseller Name Prefix', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
						 <input  type="text" id="username" required="required"
                        class="form-control">
						
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<div class="form-group">
					<div class="form-line">
						<br>
						<br>
						
						<button class="btn btn-primary pull-right btn-sm font-10 m-t-15" id="submitButton"><i class="fa fa-plus"
                            aria-hidden="true"></i>
                            Create
                        </button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">

		<div id="view_data">

		</div>

	</div>
</div>

<script>
	var tableReference = $('#view_data');

    $("#submitButton").click(function () {

    	var rowNum = parseInt($("#numberofrow").val(), 10);
    	var username = convertToSlug($("#username").val());


        $.ajax({
            url: "{{url('reseller/bulk-reselller-create')}}/"+rowNum + "/" + username,
            type: 'GET',
            data: {},
        })
        .done(function (data) {
                    //console.log(data);
                    tableReference.html(data);
                })
        .fail(function () {
            tableReference.html('');
        });
        return false;
    });

    function convertToSlug(Text)
    {
    	return Text
    	.toLowerCase()
    	.replace(/ /g,'-')
    	.replace(/[^\w-]+/g,'')
    	;
    }


</script>
@endsection