<form class="form-reschedule">
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
          <p>Reschedule Calc</p>
      </div>
      <div class="form-wizard">
          <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
          <p>Form Reschedule</p>
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
      <div id="pilih_penerbangan"></div>
      <div class="wizard-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="button" class="btn btn-next" target="reschedule-calc">Next</button>
      </div>
    </fieldset>
    <fieldset>

      <div class="wizard-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="button" class="btn btn-next" target="form-reschedule">Next</button>
      </div>
    </fieldset>
    <fieldset>

      <div class="wizard-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="button" class="btn btn-next" target="verifikasi">Next</button>
      </div>
    </fieldset>
    <fieldset>

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

  $(document).ready(function(){
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
              html_rute += '<div class="col-md-6">';
              html_rute += '<h4 class="title">Rute Lama</h4>';
              $.each(data.penerbangan, function(k1, v1){
                html_rute += '<div class="card">';
                  html_rute += '<div class="card-body">';
                    html_rute += '<h6 class="card-subtitle mb-2 text-muted">'+v1.no_penerbangan+' - '+v1.class;
                    html_rute += '</h6>';
                    html_rute += '<p class="card-text">'+v1.kota_asal+'<br/>'+v1.tgl_keberangkatan+'</p>';
                    html_rute += '<div class="line-home"></div>';
                    html_rute += '<p class="card-text">'+v1.kota_tujuan+'<br/>'+v1.tgl_tiba+'</p>';
                  html_rute += '</div>';
                html_rute += '</div>';
              });
              html_rute += '</div>';


              html_rute += '<div class="col-md-6">';
              html_rute += '<h4 class="title">Rute Baru</h4>';
              $.each(data.penerbangan, function(k1, v1){
                html_rute += '<div class="card">';
                  html_rute += '<div class="card-body">';
                    html_rute += '<h6 class="card-subtitle mb-2 text-muted">'+v1.no_penerbangan+' - '+v1.class;
                    html_rute += '</h6>';
                    html_rute += '<p class="card-text">'+v1.kota_asal+'<br/>'+v1.tgl_keberangkatan+'</p>';
                    html_rute += '<div class="line-home"></div>';
                    html_rute += '<p class="card-text">'+v1.kota_tujuan+'<br/>'+v1.tgl_tiba+'</p>';
                  html_rute += '</div>';
                html_rute += '</div>';
              });
              html_rute += '</div>';
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

      $('#batal').on('click', function(){
        $('.form-reschedule')[0].reset();
        $('#data').load('<?= base_url('home/term_condition') ?>');

        $("html, body").animate({
          scrollTop: $('body').offset().top
        });
      });

      // Pilih Tiket Muncul pada awal Form
      $('form fieldset:first').fadeIn('slow');
      $('.alert').hide();

      $('form .btn-previous').on('click', function() {
        var current_active_step = $(this).parents('form').find('.form-wizard.active');
        var progress_line = $(this).parents('form').find('.progress-line');

        $(this).parents('fieldset').fadeOut(400, function() {
          current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
          bar_progress(progress_line, 'left');
          $(this).prev().fadeIn();
        });
      });

      $('form .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        var current_active_step = $(this).parents('form').find('.form-wizard.active');
        var progress_line = $(this).parents('form').find('.progress-line');
        var target = $(this).attr('target');

        $("html, body").animate({
          scrollTop: $('.main').offset().top
        });

        switch (target) {
          case 'pilih-rute':
            if($('.check-tiket').is(':checked')) {
              next_step = true;
            } else {
              next_step = false;
              $('.alert').html('<i class="fa fa-warning"></i> Silahkan pilih tiket yang akan direschedule').fadeIn('slow').delay(2500).fadeOut('slow');
            }
          break;
          default:

        }

        if( next_step ) {
          parent_fieldset.fadeOut(400, function() {
            current_active_step.removeClass('active').addClass('activated').next().addClass('active');
            bar_progress(progress_line, 'right');
            $(this).next().fadeIn();
          });
        }
      });
  });


  // var now = new Date();
  // var jam = 60*60*1000;
  // var denda = 0;
  // var ID = v1.harga_tiket*0.10;
  //
  // var selisih = Math.abs(Math.abs(now - new Date(v1.tgl_keberangkatan))/jam);
  // if(selisih > 72){
  //   denda += 0.25*v1.harga_tiket;
  // } else if (selisih <= 72 && selisih > 4) {
  //   denda += 0.50*v1.harga_tiket;
  // } else if (selisih <= 4) {
  //   denda += parseInt((0.90*v1.harga_tiket)+50000+5000+ID);
  // }

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


</script>
