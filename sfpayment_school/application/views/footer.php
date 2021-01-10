<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2020</strong> All rights
  reserved.
</footer>
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="annex/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Notifications -->
<script>
  $(document).ready(function(){

  function load_unseen_notification(view = '')
  {

  }

  $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
  });

  setInterval(function(){
    $.ajax({
     url:"notifications/viewStatus",
     method:"GET",
     dataType:"json",
     success:function(data)
     {
      $('.menu').html(data.notification);
      if(data.unseen_notification > 0)
      {
       $('.count').html(data.unseen_notification);
      }
     }
    });
  refresh();
  },1000);

  });
</script>

<!-- Send Selected Bank to the Controller -->
<script>
$(document).ready(function(){
  $('#select_bank').change(function(){
    var bank = $(this).val();
    $.ajax({
      url:"schoolfees/get_transaction?bank="+bank,
      method:"get",
      success:function(data){
        setInterval(function(){
          $('#transaction_lists').html(data);
          refresh();
        },1000);

      }
    });
  });
  load();
});
</script>

<!-- jQuery UI 1.11.4 -->
<script src="annex/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="annex/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="annex/bower_components/raphael/raphael.min.js"></script>
<script src="annex/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="annex/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="annex/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="annex/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="annex/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="annex/bower_components/moment/min/moment.min.js"></script>
<script src="annex/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="annex/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="annex/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="annex/dist/js/pages/dashboard.js"></script>
<script src="annex/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="annex/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="annex/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="annex/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="annex/dist/js/adminlte.min.js"></script>
<script src="annex/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="annex/plugins/input-mask/jquery.inputmask.js"></script>
<script src="annex/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="annex/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<!-- bootstrap color picker -->
<script src="annex/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="annex/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<!-- iCheck 1.0.1 -->
<script src="annex/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="annex/bower_components/fastclick/lib/fastclick.js"></script>

<script src="annex/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<!-- PENDING PAYMENT -->
</body>
</html>
