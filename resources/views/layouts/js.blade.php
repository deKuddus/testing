<script src="{{asset_path('lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset_path('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset_path('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset_path('lte/dist/js/adminlte.js')}}"></script>
<script src="{{asset_path('lte/dist/js/demo.js')}}"></script>
<script src="{{asset_path('lte/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset_path('lte/jquery-confirm/jquery-confirm.min.js')}}"></script>

<script src="{{asset_path('lte/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset_path('lte/wnoty/wnoty.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fc-3.3.1/fh-3.1.7/r-2.2.5/sc-2.0.2/datatables.min.js"></script>

<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

<script src="{{asset_path('lte/bootstrap-datetimepicker/moment.min.js')}}"></script>

<script src="{{asset_path('lte/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



@if(session()->has('success'))
<script type="text/javascript">
  $(document).ready(function() {
    notify('{{session()->get('success')}}','success');
    playTone('success');
});
</script>
@endif

@if(session()->has('danger'))
<script type="text/javascript">
  $(document).ready(function() {
    notify('{{session()->get('danger')}}','danger');
    playTone('danger');
});
</script>
@endif

@if($errors->any())
<script type="text/javascript">
  $(document).ready(function() {
    playTone('danger');
    var errors=<?php echo json_encode($errors->all()); ?>;
    $.each(errors, function(index, val) {
     notify(val,'danger');
 });
});
</script>
@endif

<script type="text/javascript">
    var base_url="{{ url('/') }}";

    $(document).ready(function() {
      $('input').attr('autocomplete','off');

      setTimeout(function(){
        $('.half-a-second').fadeIn();
    },500);

      var datatable_file_name = $('#datatable-export-file-name').text();
      $('.datatable').DataTable({
        lengthMenu: [
        [ 5,10, 25, 50, 100, -1 ],
        [ '5 rows', '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
        ],

        iDisplayLength: 100,
        sScrollX: "100%",
        sScrollXInner: "100%",
        scrollCollapse: true,

        dom: 'Bfrtip',
        buttons: [
        'pageLength',
        {
          extend: 'copy',
          title: datatable_file_name
      },
      {
          extend: 'print',
          title: datatable_file_name
      },
      {
          extend: 'csv',
          filename: datatable_file_name
      },
      {
          extend: 'excel',
          filename: datatable_file_name
      },
      {
          extend: 'pdf',
          filename: datatable_file_name
      },
      ]
  });

      $('.buttons-collection').addClass('btn-sm');
      $('.buttons-copy').removeClass('btn-secondary').addClass('btn-sm btn-warning').html('<i class="fas fa-copy"></i>');
      $('.buttons-csv').removeClass('btn-secondary').addClass('btn-sm btn-success').html('<i class="fas fa-file-csv"></i>');
      $('.buttons-excel').removeClass('btn-secondary').addClass('btn-sm btn-primary').html('<i class="far fa-file-excel"></i>');
      $('.buttons-pdf').removeClass('btn-secondary').addClass('btn-sm btn-info').html('<i class="fas fa-file-pdf"></i>');
      $('.buttons-print').removeClass('btn-secondary').addClass('btn-sm btn-dark').html('<i class="fas fa-print"></i>');

      $('.select2').select2();
      $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

      $('.select2-tags').select2({
        tags: true,
        width: '100%'
    });
      $('.select2bs4-tags').select2({
        theme: 'bootstrap4',
        tags: true,
        width: '100%'
    });

      $('.datetimepicker').datetimepicker();

      $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
    });

      $('.yearpicker').datetimepicker({
        format: 'YYYY',
    });

      $('.timepicker').datetimepicker({
        format: 'LT'
    });

      $('input[name="daterange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Clear',
          format: 'YYYY-MM-DD'
      }
  });

      $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
      });

      $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      $('.checkbox-parent').change(function() {
        if($(this).is(':checked')){
          $('.checkbox-child').prop('checked',true);
      }else{
          $('.checkbox-child').prop('checked',false);
      }
  });

  });

    function Show(title,link,style = '') {
        $('#modal').modal();
        $('#modal-title').html(title);
        $('#modal-body').html('<h1 class="text-center"><strong>Please wait...</strong></h1>');
        $('#modal-dialog').attr('style',style);
        $.ajax({
            url: link,
            type: 'GET',
            data: {},
        })
        .done(function(response) {
            $('#modal-body').html(response);
        });
    }


    function Popup(title,link) {
        $.dialog({
            title: title,
            content: 'url:'+link,
            animation: 'scale',
            columnClass: 'large',
            closeAnimation: 'scale',
            backgroundDismiss: true,
        });
    }

    function Delete(id,link) {
        $.confirm({
            title: 'Confirm!',
            content: '<hr><div class="alert alert-danger">Are you sure to delete ?</div><hr>',
            buttons: {
                yes: {
                    text: 'Yes',
                    btnClass: 'btn-danger',
                    action: function(){
                        $.ajax({
                            url: link+"/"+id,
                            type: 'DELETE',
                            data: {_token:"{{ csrf_token() }}"},
                        })
                        .done(function(response) {
                            if(response.success){
                                $('#tr-'+id).fadeOut();
                                notify('Data has been deleted','success');
                                playTone('success');
                            }else{
                                notify('Something went wrong!','danger');
                                playTone('danger');
                            }
                        })
                        .fail(function(response){
                          notify('Something went wrong!','danger');
                          playTone('danger');
                      });
                    }
                },
                no: {
                    text: 'No',
                    btnClass: 'btn-default',
                    action: function(){

                    }
                }
            }
        });
    }

    function notify(message,type) {
      $.wnoty({
          message: '<strong class="text-'+(type)+'">'+(message)+'</strong>',
          type: type,
          autohideDelay: 3000
      });
  }

  function playTone(which) {
      var sound = "{{auth()->user()->sound}}";
      if(sound == 1){
        var obj = document.createElement("audio");
        obj.src = "{{url('public/lte/tones')}}/"+(which)+".mp3";
        obj.play();
    }
}

function openLink(link,type='_parent'){
  window.open(link,type);
}
</script>
