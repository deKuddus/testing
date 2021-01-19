<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
?>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('name', 'Name', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::text('name',Request::old('name'),['id'=>'name','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter Name']); ?>

                <span class="error"><?php echo $errors->first('name'); ?></span>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('email', 'Email', array('class' => 'col-form-label')); ?>

                <?php echo Form::email('email',Request::old('email'),['id'=>'email','class' => 'form-control','placeholder'=>'Enter email' ]); ?>

                <span class="error"><?php echo $errors->first('email'); ?></span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('mobile', 'Mobile No', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::text('mobile',Request::old('mobile'),['id'=>'mobile','class' => 'form-control','required'=> 'required','placeholder'=>'Enter mobile' ,'onkeyup'=>"convert_to_username();"]); ?>

                <span class="error"><?php echo $errors->first('mobile'); ?></span>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('package_id', 'Select Package', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::Select('package_id',$package_list,Request::old('package_id'),['id'=>'package_id', 'class'=>'form-control selectheight']); ?>

                <span class="error"><?php echo $errors->first('package_id'); ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('billing_status', 'Payment Status', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::Select('billing_status',array('unpaid'=>'Un-Paid','paid'=>'Paid'),Request::old('billing_status'),['id'=>'billing_status', 'class'=>'form-control selectheight']); ?>

                <span class="error"><?php echo $errors->first('billing_status'); ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('billing_system', 'Billing System', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::Select('billing_system',$billing_system,Request::old('billing_system'),['id'=>'billing_system', 'class'=>'form-control selectheight']); ?>

                <span class="error"><?php echo $errors->first('billing_system'); ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('status', 'Status', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::Select('status',array('1'=>'Active','0'=>'Inactive'),Request::old('status'),['id'=>'status', 'class'=>'form-control selectheight']); ?>

                <span class="error"><?php echo $errors->first('status'); ?></span>
            </div>
        </div>
    </div>
   
        <div class="col-md-12">
         <h5 class="text-success mt-5"><strong>Log in Details</strong></h5>
         <hr>
     </div>

     <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('username', 'User Name', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::text('username',Request::old('username'),['id'=>'username','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter username']); ?>

                <span class="error"><?php echo $errors->first('username'); ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('password', 'Password', array('class' => 'col-form-label')); ?><span class="required"> *</span>
                <?php echo Form::text('password',Request::old('password'),['id'=>'password','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter password']); ?>

                <span class="error"><?php echo $errors->first('password'); ?></span>
            </div>
        </div>
    </div>
    
    <input type="hidden" name="reseller_id" value="">


    <div class="col-md-12">

        <div class="form-group">
            <div class="form-line">
                <?php echo Form::label('address', 'Address', array('class' => 'col-form-label')); ?>

               <?php echo Form::textarea('address',Request::old('address'),['id'=>'address','class' => 'form-control textarea', 'placeholder'=>'Enter address','rows'=>'5', 'cols'=>'30']); ?>

                <span class="error"><?php echo $errors->first('address'); ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        <?php echo Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']); ?>&nbsp;
    </div>

</div>

<script>

    function convert_to_username(){
        var str = document.getElementById("mobile").value;
        str = str.replace(/[^a-zA-Z0-123456789\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        document.getElementById("username").value = str; 
    }
</script><?php /**PATH D:\my-project\vpn\Modules/Customer\Resources/views/users/_form.blade.php ENDPATH**/ ?>