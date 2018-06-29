<footer class="main-footer">
  <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.0-alpha
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url().'assets/jquery/jquery.min.js' ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

<script src="<?= base_url().'assets/js/morris.min.js' ?>"></script>

<script src="<?= base_url().'assets/js/wow.min.js' ?>"></script>

<script src="<?= base_url().'assets/dataTables/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url().'assets/dataTables/dataTables.bootstrap4.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'assets/js/adminlte.js' ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url().'assets/js/demo.js' ?>"></script>
<script type="text/javascript">
$(function() {
  new WOW().init();
});
  $('#note').slideDown('slow').delay(4000).slideUp('slow');
</script>
<script type="text/javascript">
  $(document).ready(function(){
    loaddataToday();

    setInterval(function(){
        loaddataToday();
    },10000);

      function loaddataToday()
      {
        $.ajax({
          type: 'ajax',
          url: '<?= base_url() ?>adm/dashboard/get_refund_today',
          dataType: 'json',
          success:function(data){
            var htmljumlah = '';
            htmljumlah = data.jumlahdata_today;
            $('#notif_jumlahrefund').html(htmljumlah);
          }
        });
      }


      $('#tampiltoday').on('click', function(){
        $('#ModaldataToday').modal('show');
      });



  });


</script>

</body>
</html>
