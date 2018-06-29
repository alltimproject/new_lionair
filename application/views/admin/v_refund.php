<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
<<<<<<< HEAD
          <div class="col-sm-6">
=======
          <div class="col-sm-6 animated fadeInUp">
>>>>>>> a98b0010e8a80ec42b0bf151cadf50584754880e
            <h1 class="m-0 text-dark">Data Refund</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Refund</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->

<<<<<<< HEAD

    








=======
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-right">Tanggal Hari ini</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9 animated fadeInUp">
                    <p class="text-center">
                      <strong id="title-refund" ></strong>
                    </p>
                  <a href="javascript:;" id="tampilsemua" class="btn btn-info">Tampilkan Semua</a>
                  <table class="table table-hover table-bordered" id="data" >
                    <thead>
                    <tr class="bg-danger">
                      <th style="font-size:80%">No. Refund</th>
                      <th style="font-size:80%">Tanggal Refund</th>
                      <th style="font-size:80%">Total Refund</th>
                      <th style="font-size:80%">Kode Booking</th>
                      <th style="font-size:80%">Email</th>
                      <th style="font-size:80%">Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody id="show_data_refund"></tbody>
                  </table>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-3 animated bounceInDown">
                    <p class="text-center">
                      <strong>Proses</strong>
                    </p>

                    <div class="info-box">
                      <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-check"></i></span>
                      <div class="info-box-content">
                        <div class="row">
                          <div class="col-md-6">
                              <span class="info-box-text">Refund Success</span>
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="javascript:;" class="btn btn-danger" id="Verify">Check</a>
                          </div>
                        </div>
                        <span class="info-box-number">

                        </span>
                      </div>
                    </div>

                    <div class="info-box">
                      <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-exclamation-triangle"></i></span>
                      <div class="info-box-content">
                        <div class="row">
                          <div class="col-md-6">
                              <span class="info-box-text">Refund Prosess</span>
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="javascript:;" class="btn btn-danger" id="onproses">Check</a>
                          </div>
                        </div>
                        <span class="info-box-number">

                        </span>
                      </div>
                    </div>

                    <div class="info-box">
                      <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-exclamation-triangle"></i></span>
                      <div class="info-box-content">
                        <div class="row">
                          <div class="col-md-6">
                              <span class="info-box-text">Refund Cancel</span>
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="javascript:;" class="btn btn-danger" id="notverify">Check</a>
                          </div>
                        </div>
                        <span class="info-box-number">

                        </span>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
              </div>
            </div>
          </div>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="<?= base_url().'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('#title-refund').text('Semua Data Refund').addClass('animated bounceInLeft');
          loadAllRefund();

          //tampil semua hide
          $('#tampilsemua').hide();
          $('#tampilsemua').on('click', function(){
            $('#tampilsemua').hide( function(){
              $('#title-refund').text('Semua Data Refund').addClass('animated bounceInLeft');
              loadAllRefund();
            });
          });


          function loadAllRefund()
          {
            $.ajax({
              type: 'ajax',
              url: '<?=  base_url() ?>adm/refund/getAllrefund',
              async: false,
              dataType: 'json',
              success:function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                  html += '<tr>'+
                          '<td style="font-size:80%">'+data[i].no_refund+'</td>'+
                          '<td style="font-size:80%">'+data[i].tgl_refund+'</td>'+
                          '<td style="font-size:80%">'+data[i].total_refund+'</td>'+
                          '<td style="font-size:80%">'+data[i].kd_booking+'</td>'+
                          '<td style="font-size:80%">'+data[i].refund_email+'</td>';

                          if(data[i].refund_status == 'On Proses'){
                              html+='<td style="font-size:100%; " class="text-warning text-center">'+data[i].refund_status+'</td>';
                          }else if(data[i].refund_status == 'Verify'){
                              html+='<td style="font-size:100%;" class="text-success text-center">'+data[i].refund_status+'</td>';
                          }else{
                            html+='<td style="font-size:100%;" class="text-danget text-center">'+data[i].refund_status+'</td>';
                          }

                          html+='<td style="text-align:right">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item-penumpang" data="'+data[i].kd_booking+'">Lihat Penumpang</a>'+
                                '</tr>';
                }
                $('#show_data_refund').html(html);
              }
            });
          }



            $('#Verify').on('click', function(){
              id = $(this).attr('id');
              console.log(id);
              $.ajax({
                type: 'ajax',
                url: '<?= base_url() ?>adm/refund/getlRefundstatus/'+id,
                async: false,
                dataType: 'json',
                success:function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                    html =+ '<tr>'+
                            '<td style="font-size:80%">'+data[i].no_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].tgl_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].total_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].kd_booking+'</td>'+
                            '<td style="font-size:80%">'+data[i].refund_email+'</td>';

                            if(data[i].refund_status == 'On Proses'){
                                html+='<td style="font-size:100%; " class="text-warning text-center">'+data[i].refund_status+'</td>';
                            }else if(data[i].refund_status == 'Verify'){
                                html+='<td style="font-size:100%;" class="text-success text-center">'+data[i].refund_status+'</td>';
                            }else{
                              html+='<td style="font-size:100%;" class="text-danget text-center">'+data[i].refund_status+'</td>';
                            }

                            html+='<td style="text-align:right">'+
                                  '<a href="javascript:;" class="btn btn-info btn-xs item-penumpang" data="'+data[i].kd_booking+'">Lihat Penumpang</a>'+
                                  '</tr>';
                  }
                  $('#show_data_refund').html(html).addClass('animated bounceInLeft');
                  $('#tampilsemua').addClass('animated fadeInUp').show();
                  $('#title-refund').text('Data Refund Success');

                }
              });
            });


            $('#onproses').on('click', function(){
              var id = $(this).attr('id');
              console.log(id);
              $.ajax({
                type: 'ajax',
                url: '<?= base_url() ?>adm/refund/getlRefundstatus/'+id,
                async: false,
                dataType: 'json',
                success:function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                    html =+ '<tr>'+
                            '<td style="font-size:80%">'+data[i].no_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].tgl_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].total_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].kd_booking+'</td>'+
                            '<td style="font-size:80%">'+data[i].refund_email+'</td>';

                            if(data[i].refund_status == 'On Proses'){
                                html+='<td style="font-size:100%; " class="text-warning text-center">'+data[i].refund_status+'</td>';
                            }else if(data[i].refund_status == 'Verify'){
                                html+='<td style="font-size:100%;" class="text-success text-center">'+data[i].refund_status+'</td>';
                            }else{
                              html+='<td style="font-size:100%;" class="text-danget text-center">'+data[i].refund_status+'</td>';
                            }

                            html+='<td style="text-align:right">'+
                                  '<a href="javascript:;" class="btn btn-info btn-xs item-penumpang" data="'+data[i].kd_booking+'">Lihat Penumpang</a>'+
                                  '</tr>';
                  }
                  $('#show_data_refund').html(html).addClass('animated bounceInLeft');
                  $('#tampilsemua').addClass('animated fadeInUp').show();
                  $('#title-refund').text('Data Refund On Proses');

                }
              });
            });

            $('#notverify').on('click', function(){
              var id = $(this).attr('id');
              console.log(id);
              $.ajax({
                type: 'ajax',
                url: '<?= base_url() ?>adm/refund/getlRefundstatus/'+id,
                async: false,
                dataType: 'json',
                success:function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                    html =+ '<tr>'+
                            '<td style="font-size:80%">'+data[i].no_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].tgl_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].total_refund+'</td>'+
                            '<td style="font-size:80%">'+data[i].kd_booking+'</td>'+
                            '<td style="font-size:80%">'+data[i].refund_email+'</td>';

                            if(data[i].refund_status == 'On Proses'){
                                html+='<td style="font-size:100%; " class="text-warning text-center">'+data[i].refund_status+'</td>';
                            }else if(data[i].refund_status == 'Verify'){
                                html+='<td style="font-size:100%;" class="text-success text-center">'+data[i].refund_status+'</td>';
                            }else{
                              html+='<td style="font-size:100%;" class="text-danget text-center">'+data[i].refund_status+'</td>';
                            }

                            html+='<td style="text-align:right">'+
                                  '<a href="javascript:;" class="btn btn-info btn-xs item-penumpang" data="'+data[i].kd_booking+'">Lihat Penumpang</a>'+
                                  '</tr>';
                  }
                  $('#show_data_refund').html(html).addClass('animated bounceInLeft');
                  $('#tampilsemua').addClass('animated fadeInUp').show();
                  $('#title-refund').text('Data Refund Not Verify');

                }
              });
            });
>>>>>>> a98b0010e8a80ec42b0bf151cadf50584754880e










<<<<<<< HEAD
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
=======
      });
    </script>
>>>>>>> a98b0010e8a80ec42b0bf151cadf50584754880e
