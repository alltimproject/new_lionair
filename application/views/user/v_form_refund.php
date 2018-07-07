
<form class="form-refund">
    <div class="wizards">
        <div class="progressbar">
            <div class="progress-line" data-now-value="19.66" data-number-of-steps="5" style="width: 19.66%;"></div> <!-- 19.66% -->
        </div>
        <div class="form-wizard active">
            <div class="wizard-icon"><i class="fa fa-user"></i></div>
            <p>Pilih Tiket</p>
        </div>
        <div class="form-wizard">
            <div class="wizard-icon"><i class="fa fa-plane"></i></div>
            <p>Pilih Rute</p>
        </div>
        <div class="form-wizard">
            <div class="wizard-icon"><i class="fa fa-money"></i></div>
            <p>Refund Calc</p>
        </div>
        <div class="form-wizard">
            <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
            <p>Form Refund</p>
        </div>
        <div class="form-wizard">
            <div class="wizard-icon"><i class="fa fa-lock"></i></div>
            <p>Verifikasi</p>
        </div>
    </div>

    <div class="alert alert-warning"><i class="fa fa-warning"></i></div>

  <fieldset>
      <input type="hidden" name="kd_booking" id="kd_booking" value="<?= $booking ?>">

      <div id="pilih_tiket"></div>
      <div class="wizard-buttons">
          <button type="button" class="btn btn-danger" id="batal">Cancel</button>
          <button type="button" class="btn btn-next" target="pilih-rute">Next</button>
      </div>
  </fieldset>
  <fieldset>
    <div class="container">
      <div id="pilih_penerbangan"></div>
    </div>

      <div class="wizard-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="button" class="btn btn-next" target="refund-calc">Next</button>
      </div>
  </fieldset>
  <fieldset>
      <h3 class="title">Fare Calc</h3>
      <table class="table table-bordered table-hover">
        <tr>
          <th>Basic Fare</th>
          <td align="right" id="basic_fare">0</td>
        </tr>
        <tr>
          <th>ID</th>
          <td align="right" id="ID">0</td>
        </tr>
        <tr>
          <th>Airport Tax</th>
          <td align="right" id="D5">0</td>
        </tr>
        <tr>
          <th>IWJR</th>
          <td align="right" id="IWJR">0</td>
        </tr>
        <tr>
          <th class="active">Grand Total</th>
          <td align="right" id="total">0</td>
        </tr>
      </table>

      <h3 class="title">Detail Payment</h3>
      <table class="table table-bordered table-hover">
        <tr>
          <th class="active">Denda</th>
          <td align="right" id="denda">0</td>
        </tr>
        <tr>
          <th class="active">Payment Back</th>
          <td align="right" id="grand_total">0</td>
        </tr>
      </table>

      <iframe src="license.txt"></iframe>
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" id="agreement" type="checkbox"> I agree
          <span class="form-check-sign">
            <span class="check"></span>
          </span>
        </label>
      </div>

      <div class="wizard-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="button" class="btn btn-next" target="form-refund">Next</button>
      </div>
  </fieldset>
  <fieldset>
    <input type="hidden" name="total_refund" id="total_refund">

        <h4 class="title"><i class="fa fa-user"></i> Identitas Refund</h4>
        <div class="form-group">
          <label>Gelar</label>
          <select class="form-control" name="refund_gelar" id="refund_gelar">
            <option value="">--Pilih Gelar--</option>
            <option value="Mr. ">Mr. </option>
            <option value="Mrs. ">Mrs. </option>
          </select>
        </div>
        <div class="form-group">
          <label>Nama Depan</label>
          <input type="text" name="refund_first" id="refund_first" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text" name="refund_last" id="refund_last" class="form-control">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="refund_alamat" id="refund_alamat" rows="8" cols="80" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Telepon</label>
          <input type="text" name="refund_telepon" id="refund_telepon" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="refund_email" id="refund_email" class="form-control">
        </div>

        <h4 class="title"><i class="fa fa-bank"></i> Informasi Bank</h4>
        <div class="form-group">
          <label>Bank</label>
          <select class="form-control" name="nama_bank" id="nama_bank">
            <option value="">--Pilih Bank--</option>
            <option value="BCA">BCA</option>
            <option value="Mandiri">Mandiri</option>
            <option value="BNI">BNI</option>
            <option value="BRI">BRI</option>
          </select>
        </div>
        <div class="form-group">
          <label>Cabang</label>
          <input type="text" name="cabang" id="cabang" class="form-control">
        </div>
        <div class="form-group">
          <label>No Rekening</label>
          <input type="number" name="no_rekening" id="no_rekeing" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama Pemilik Rekening</label>
          <input type="text" name="nama_rekening" id="nama_rekening" class="form-control">
        </div><br/>
    <div class="wizard-buttons">
        <button type="button" class="btn btn-previous">Previous</button>
        <button type="button" class="btn btn-next" target="verifikasi">Next</button>
    </div>
  </fieldset>
  <fieldset>
    <h4 class="title">Kode Verifikasi</h4>

    <p>
      Kode verifikasi akan dikirim ke email <b id="email_pic"></b>. Klik <button type="button" class="btn btn-sm btn-primary" id="kirim_kode">Kirim Kode</button> untuk mengirimkan Kode Verifikasi.
    </p>

    <div class="form-group">
      <input type="text" name="kode_verifikasi" id="kode_verifikasi" class="form-control" placeholder="6 Digit Kode Verifikasi" maxlength="6">
    </div>
      <div class="wizard-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
      </div>
  </fieldset>
</form>

<script type="text/javascript">
    function bar_progress(progress_line_object, direction) {
      var number_of_steps = progress_line_object.data('number-of-steps');
      var now_value = progress_line_object.data('now-value');
      var new_value = 0;
      if(direction == 'right') {
        new_value = now_value + ( 100 / number_of_steps );
      }
      else if(direction == 'left') {
        new_value = now_value - ( 100 / number_of_steps );
      }
      progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
    }

    // Playground
    $(document).ready(function(){

      // Global Variabel
      var kd_booking = $('#kd_booking').val();
      var html_tiket = '';
      var html_rute = '';
      var email_pic;
      var verifikasi;

      // AJAX mengambil Data Booking
        $.ajax({
          url: '<?= base_url('home/cari_booking/') ?>'+kd_booking,
          type: 'GET',
          dataType: 'JSON',
          success: function(data){
            if(data.pessenger == '')
            {
              alert('Data tidak ditemukan');
            } else {
                verifikasi = data.verifikasi;
                $.each(data.pessenger, function(k, v){
                  html_tiket += '<div class="card">';
                    html_tiket += '<div class="card-body">';
                      // html_tiket += '<h4 class="card-title">E-Ticket '+v.no_tiket+' <div class="pull-right"><input type="checkbox" class="check check-tiket" name="no_tiket[]" value="'+v.no_tiket+'"></div></h4>';
                      html_tiket += '<h4 class="card-title">E-Ticket '+v.no_tiket;
                      html_tiket += '<div class="pull-right">';
                        html_tiket += '<label class="checkbox">';
                          html_tiket += '<span class="switch">';
                          html_tiket += '<input type="checkbox" class="checkbox check-tiket" name="no_tiket[]" value="'+v.no_tiket+'">';
                            html_tiket += '<span class="switch-container">';
                              html_tiket += '<span class="off"><i class="fa fa-close"></i></span>';
                              html_tiket += '<span class="mid"></span>';
                              html_tiket += '<span class="on"><i class="fa fa-check"></i></span>';
                            html_tiket += '</span>';
                          html_tiket += '</span>';
                        html_tiket += '</label>';
                      html_tiket += '</div>';
                      html_tiket += '</h4>';
                      html_tiket += '<p class="card-text"><i class="fa fa-user"></i> '+v.nama_pessenger+' - '+v.tipe_pessenger+'</p>';
                    html_tiket += '</div>';
                  html_tiket += '</div>';



                  email_pic = v.email;
                });

                html_rute += '<div class="row">';
                $.each(data.penerbangan, function(k1, v1){
                  var now = new Date();
                  var jam = 60*60*1000;
                  var denda = 0;
                  var ID = v1.harga_tiket*0.10;

                  var selisih = Math.abs(Math.abs(now - new Date(v1.tgl_keberangkatan))/jam);
                  if(selisih > 72){
                    denda += 0.25*v1.harga_tiket;
                  } else if (selisih <= 72 && selisih > 4) {
                    denda += 0.50*v1.harga_tiket;
                  } else if (selisih <= 4) {
                    denda += parseInt((0.90*v1.harga_tiket)+50000+5000+ID);
                  }

                  html_rute += '<div class="card">';
                    html_rute += '<div class="card-body">';
                      html_rute += '<h6 class="card-subtitle mb-2 text-muted">'+v1.no_penerbangan+' - '+v1.class;
                        html_rute += '<div class="pull-right">';
                        html_rute += '<label class="checkbox">';
                          html_rute += '<span class="switch">';
                          html_rute += '<input type="checkbox" class="check check-penerbangan" name="no_penerbangan[]" value="'+v1.no_penerbangan+'" data-harga="'+v1.harga_tiket+'" data-tgl="'+v1.tgl_keberangkatan+'" data-denda="'+denda+'">';
                            html_rute += '<span class="switch-container">';
                              html_rute += '<span class="off"><i class="fa fa-close"></i></span>';
                              html_rute += '<span class="mid"></span>';
                              html_rute += '<span class="on"><i class="fa fa-check"></i></span>';
                            html_rute += '</span>';
                          html_rute += '</span>';
                        html_rute += '</label>';
                        html_rute += '</div>';
                      html_rute += '</h6>';
                      html_rute += '<p class="card-text">'+v1.kota_asal+'<br/>'+v1.tgl_keberangkatan+'</p>';
                      html_rute += '<div class="line-home"></div>';
                      html_rute += '<p class="card-text">'+v1.kota_tujuan+'<br/>'+v1.tgl_tiba+'</p>';
                    html_rute += '</div>';
                  html_rute += '</div>';


                  // html_rute += '<div class="col-md-6">';
                  //   html_rute += '<div class="card card-nav-tabs text-white flight">';
                  //     html_rute += '<div class="card-header card-header-default" style="color: black;">';
                  //       html_rute += '<b>Flight '+v1.no_penerbangan+' - '+v1.class+'</b>';
                  //       html_rute += '<div class="pull-right">';
                  //         html_rute += '<input type="checkbox" class="check-penerbangan" name="no_penerbangan[]" value="'+v1.no_penerbangan+'" data-harga="'+v1.harga_tiket+'" data-tgl="'+v1.tgl_keberangkatan+'" data-denda="'+denda+'">';
                  //       html_rute += '</div>';
                  //
                  //     html_rute += '</div>';
                  //     html_rute += '<div class="row">';
                  //       html_rute += '<div class="col-md-4 col-5">';
                  //         html_rute += '<div class="text-center">';
                  //           html_rute += '<h5>'+v1.kota_asal+'<br/>'+v1.tgl_keberangkatan+'</h5>';
                  //         html_rute += '</div>';
                  //
                  //       html_rute += '</div>';
                  //       html_rute += '<div class="col-md-4 col-2">';
                  //         html_rute += '<div class="text-center">';
                  //           html_rute += '<h5>';
                  //           html_rute += '<span class="fa fa-plane fa-2x"></span>';
                  //           html_rute += '<div class="route"></div>';
                  //           html_rute += '</h5>';
                  //         html_rute += '</div>';
                  //       html_rute += '</div>';
                  //
                  //       html_rute += '<div class="col-md-4 col-5">';
                  //         html_rute += '<div class="text-center">';
                  //           html_rute += '<h5>'+v1.kota_tujuan+'<br/>'+v1.tgl_tiba+'</h5>';
                  //         html_rute += '</div>';
                  //       html_rute += '</div>';
                  //     html_rute += '</div>';
                  //   html_rute += '</div>';
                  // html_rute += '</div>';
                });
                html_rute += '</div>';

              $('#pilih_tiket').html(html_tiket);
              $('#pilih_penerbangan').html(html_rute);

              // var coba = email_pic.substring(1, 5);
              var coba = email_pic.substr(1, 5);
              $('#email_pic').text(email_pic.replace(coba, "*****"));
            }
          }, error: function(){
            alert('Data tidak ditemukan');
          }
        });

        // Submit Form Refund & Validasi Kode Verifikasi
        $('.form-refund').submit(function(){
          var kd_verifikasi = $('#kode_verifikasi').val();

          if(kd_verifikasi == ''){
            $('.alert').html('<i class="fa fa-warning"></i> Silahkan masukkan Kode Verifikasi').fadeIn('slow').delay(2500).fadeOut('slow');
          } else if(kd_verifikasi != verifikasi){
            $('.alert').html('<i class="fa fa-warning"></i> Kode Verifikasi tidak dikenali').fadeIn('slow').delay(2500).fadeOut('slow');
          } else {
            $.ajax({
              url: '<?= base_url('home/proses_refund') ?>',
              type: 'POST',
              data: $('.form-refund').serialize(),
              success: function(data){
                if(data == 'berhasil')
                {
                  alert('Berhasil melakukan Refund. Silahkan menunggu Email Konfirmasi dari Admin kami');
                  $('#data').load('<?= base_url('home/term_condition') ?>');
                } else {
                  alert('Gagal melakukan Refund');
                  $('#data').load('<?= base_url('home/term_condition') ?>');
                }
              },
              error: function(){
                alert('Gagal mengakses halaman');
              }
            });
          }
          return false;
        });

        // Perhitungan Refund Fee pada bagian Refund Calc
        $(document).on('change', '.check-penerbangan, .check-tiket', function(){
          var jumlah_tiket = $('.check-tiket:checked').length;
          var jumlah_penerbangan = $('.check-penerbangan:checked').length;
          var BF = 0;
          var ID = 0;
          var IWJR = 0;
          var D5 = 0;
          var total = 0;

          var denda = 0;
          var grand_total = 0;

          $('.check-penerbangan:checked').each(function(){
            BF += parseInt($(this).attr('data-harga'));
            denda += parseInt($(this).attr('data-denda'));
            ID = BF*0.10;
            IWJR += 5000;
            D5 += 50000;
            total = parseInt(BF+ID+IWJR+D5);

            grand_total = total - denda;
          });


            $('#basic_fare').text('Rp. '+jumlah_tiket*BF);
            $('#ID').text('Rp. '+jumlah_tiket*ID);
            $('#IWJR').text('Rp. '+jumlah_tiket*IWJR);
            $('#D5').text('Rp. '+jumlah_tiket*D5);
            $('#total').text('Rp. '+jumlah_tiket*total);
            $('#denda').text('Rp. '+jumlah_tiket*denda);
            $('#grand_total').text('Rp. '+jumlah_tiket*grand_total);

            $('#total_refund').val(jumlah_tiket*grand_total);
        });

        $('#batal').on('click', function(){
          $('.form-refund')[0].reset();
          $('#data').load('<?= base_url('home/term_condition') ?>');

          $("html, body").animate({
            scrollTop: $('body').offset().top
          });
        });

      // Pilih Tiket Muncul pada awal Form
      $('form fieldset:first').fadeIn('slow');
      $('.alert').hide();

      // Tombol Next
      $('form .btn-next').on('click', function() {
      	var parent_fieldset = $(this).parents('fieldset');
      	var next_step = true;
      	var current_active_step = $(this).parents('form').find('.form-wizard.active');
      	var progress_line = $(this).parents('form').find('.progress-line');
        var target = $(this).attr('target');

        switch (target) {
          case 'pilih-rute':
            if($('.check-tiket').is(':checked')) {
              next_step = true;
            } else {
              next_step = false;
              $('.alert').html('<i class="fa fa-warning"></i> Silahkan pilih tiket yang akan direfund').fadeIn('slow').delay(2500).fadeOut('slow');
            }
          break;

          case 'refund-calc':
            if($('.check-penerbangan').is(':checked')) {
              next_step = true;
            } else {
              next_step = false;
                $('.alert').html('<i class="fa fa-warning"></i> Silahkan pilih rute yang akan direfund').fadeIn('slow').delay(2500).fadeOut('slow');
            }
          break;

          case 'form-refund':
            if( $('#agreement').prop("checked") == false ) {
              next_step = false;
                $('.alert').html('<i class="fa fa-warning"></i> Silahkan ceklist apabila anda menyetujui persyaratan.').fadeIn('slow').delay(2500).fadeOut('slow');
            } else {
              next_step = true;
            }
          break;

          case 'verifikasi':
            var refund_gelar = $('#refund_gelar').val();
            var refund_first = $('#refund_first').val();
            var refund_last = $('#refund_last').val();
            var refund_alamat = $('#refund_alamat').val();
            var refund_telepon = $('#refund_alamat').val();
            var refund_email = $('#refund_email').val();
            var refund_bank = $('#nama_bank').val();
            var refund_cabang = $('#cabang').val();
            var refund_rekening = $('#no_rekening').val();
            var refund_pemilik = $('#nama_rekening').val();

            if(refund_gelar == '' || refund_first == '' || refund_last == '' || refund_alamat == '' || refund_telepon == '' || refund_email == '' || refund_bank == '' || refund_cabang == '' || refund_rekening == '' || refund_pemilik == '') {
              next_step = false;
              $('.alert').html('<i class="fa fa-warning"></i> Mohon lengkapi data pada Form Refund').fadeIn('slow').delay(2500).fadeOut('slow');
            } else {
              next_step = true;
            }
          break;

          default:
        }

        $("html, body").animate({
          scrollTop: $('.main').offset().top
        });

      	if( next_step ) {
      		parent_fieldset.fadeOut(400, function() {
      			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
      			bar_progress(progress_line, 'right');
  	    		$(this).next().fadeIn();
  	    	});
      	}
      });

      // Tombol Kembali
      $('form .btn-previous').on('click', function() {
      	var current_active_step = $(this).parents('form').find('.form-wizard.active');
      	var progress_line = $(this).parents('form').find('.progress-line');

      	$(this).parents('fieldset').fadeOut(400, function() {
      		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
      		bar_progress(progress_line, 'left');
      		$(this).prev().fadeIn();
      	});
      });

      // Kirim Kode Verifikasi ke Email PIC
      $('#kirim_kode').on('click', function(){
        $.ajax({
          url: '<?= base_url().'home/mailKode' ?>',
          type: 'POST',
          data: {'email_pic': email_pic},
          success: function(data){
            if(data == 'gagal')
            {
              alert('Gagal mengirim verification code');
            } else {
              verifikasi = data;
            }
            // alert('Success');
          },
          error: function(){
            alert('Tidak Dapat Mengakses Halaman...');
          }
        });
      });

    });
</script>
