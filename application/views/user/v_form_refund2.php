
    <ul class="nav nav-pills nav-pills-danger nav-pills-icons" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#tiket-1" role="tab" data-toggle="tab" id="tab-tiket">
            <i>1</i> Pilih Tiket
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#penerbangan-1" role="tab" data-toggle="tab" id="tab-penerbangan">
            <i>2</i> Pilih Rute
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#payment-1" role="tab" data-toggle="tab" id="tab-payment">
            <i>3</i> Cancel Fee
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#form-1" role="tab" data-toggle="tab" id="tab-refund">
            <i>4</i> Form Refund
          </a>
        </li>
      </ul>

              <form class="form-refund">
                <div class="tab-content tab-space">
                  <div class="tab-pane active" id="tiket-1">
                    <div class="form-group">
                      <input type="hidden" name="kd_booking" id="kd_booking" value="<?= $booking ?>">

                      <div id="pilih_tiket"></div>
                      <i style="color: red;">* pilih tiket yang akan direfund </i>

                      <div class="float-right">
                        <button type="button" id="batal" class="btn btn-md btn-danger">Cancel</button>
                        <button type="button" id="next-tiket" target="" class="btn btn-md btn-info">Next</button>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="penerbangan-1">
                    <div id="pilih_penerbangan"></div>
                    <i style="color: red;">* pilih rute yang akan direfund </i>

                    <div class="float-right">
                      <button type="button" id="back-penerbangan" class="btn btn-md btn-danger">Back</button>
                      <button type="button" id="next-penerbangan" class="btn btn-md btn-info">Next</button>
                    </div>
                  </div>
                  <div class="tab-pane" id="payment-1">
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

                    <div class="float-right">
                      <button type="button" id="back-payment" class="btn btn-md btn-danger">Back</button>
                      <button type="button" id="next-payment" target="" class="btn btn-md btn-info">Next</button>
                    </div>
                  </div>
                  <div class="tab-pane" id="form-1">
                        <input type="hidden" name="total_refund" id="total_refund">
                        <div class="row">
                          <div class="col-md-6">

                            <h4 class="title">Identitas Refund</h4>
                            <div class="form-group">
                              <select class="form-control" name="refund_gelar" id="refund_gelar">
                                <option value="">--Pilih Gelar--</option>
                                <option value="Mr. ">Mr. </option>
                                <option value="Mrs. ">Mrs. </option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" name="refund_first" id="refund_first" class="form-control" placeholder="Nama Depan">
                            </div>
                            <div class="form-group">
                              <input type="text" name="refund_last" id="refund_last" class="form-control" placeholder="Nama Belakang">
                            </div>
                            <div class="form-group">
                              <textarea name="refund_alamat" id="refund_alamat" rows="8" cols="80" class="form-control" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                              <input type="text" name="refund_telepon" id="refund_telepon" class="form-control" placeholder="Telepon">
                            </div>
                            <div class="form-group">
                              <input type="email" name="refund_email" id="refund_email" class="form-control" placeholder="Email">
                            </div>
                          </div>

                          <div class="col-md-6">

                            <h4 class="title">Informasi Bank</h4>
                            <div class="form-group">
                              <select class="form-control" name="nama_bank" id="nama_bank">
                                <option value="">--Pilih Bank--</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" name="cabang" id="cabang" class="form-control" placeholder="Cabang">
                            </div>
                            <div class="form-group">
                              <input type="number" name="no_rekening" id="no_rekeing" class="form-control" placeholder="No Rekening">
                            </div>
                            <div class="form-group">
                              <input type="text" name="nama_rekening" id="nama_rekening" class="form-control" placeholder="Atas Nama">
                            </div><br/>

                            <h4 class="title">Kode Verifikasi</h4>

                            <p>
                              Kode verifikasi akan dikirim ke email <b id="email_pic"></b>. Klik <button type="button" class="btn btn-sm btn-primary" id="kirim_kode">Kirim Kode</button> untuk mengirimkan Kode Verifikasi.
                            </p>

                            <div class="form-group">
                              <input type="text" name="kode_verifikasi" id="kode_verifikasi" class="form-control" placeholder="6 Digit Kode Verifikasi" maxlength="6">
                            </div>

                            <div class="float-right">
                              <button type="button" id="back-form" class="btn btn-md btn-danger">Back</button>
                              <button type="submit" class="btn btn-md btn-info">Submit</button>
                            </div>

                          </div>
                        </div>
                  </div>
                </div>
              </form>

              <script type="text/javascript">
                $(document).ready(function(){

                  var kd_booking = $('#kd_booking').val();
                  var html_tiket = '';
                  var html_rute = '';
                  var email_pic;
                  var verifikasi;

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

                            html_tiket += '<table class="table table-hover" style="width: 100%;">';
                            html_tiket += '<thead><tr style="background-color: red; color: white;"><th></th><th>Pessenger Type</th><th>Pessenger Name</th><th>Ticket Number</th></tr></thead>';
                            html_tiket += '<tbody>';
                            $.each(data.pessenger, function(k, v){
                              html_tiket += '<tr>';
                              html_tiket += '<td><input type="checkbox" class="check-tiket" name="no_tiket[]" value="'+v.no_tiket+'"></td>';
                              html_tiket += '<td>'+v.tipe_pessenger+'</td>';
                              html_tiket += '<td>'+v.nama_pessenger+'</td>';
                              html_tiket += '<td>'+v.no_tiket+'</td>';
                              html_tiket += '</tr>';
                              email_pic = v.email;
                            });
                            html_tiket += '</tbody></table>';

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

                              html_rute += '<div class="col-md-6">';
                                html_rute += '<div class="card card-nav-tabs text-white flight">';
                                  html_rute += '<div class="card-header card-header-default" style="color: black;">';
                                    html_rute += '<b>Flight '+v1.no_penerbangan+' - '+v1.class+'</b>';
                                    html_rute += '<div class="pull-right">';
                                      html_rute += '<input type="checkbox" class="check-penerbangan" name="no_penerbangan[]" value="'+v1.no_penerbangan+'" data-harga="'+v1.harga_tiket+'" data-tgl="'+v1.tgl_keberangkatan+'" data-denda="'+denda+'">';
                                    html_rute += '</div>';

                                  html_rute += '</div>';
                                  html_rute += '<div class="row">';
                                    html_rute += '<div class="col-md-4 col-5">';
                                      html_rute += '<div class="text-center">';
                                        html_rute += '<h5>'+v1.kota_asal+'<br/>'+v1.tgl_keberangkatan+'</h5>';
                                      html_rute += '</div>';

                                    html_rute += '</div>';
                                    html_rute += '<div class="col-md-4 col-2">';
                                      html_rute += '<div class="text-center">';
                                        html_rute += '<h5>';
                                        html_rute += '<span class="fa fa-plane fa-2x"></span>';
                                        html_rute += '<div class="route"></div>';
                                        html_rute += '</h5>';
                                      html_rute += '</div>';
                                    html_rute += '</div>';

                                    html_rute += '<div class="col-md-4 col-5">';
                                      html_rute += '<div class="text-center">';
                                        html_rute += '<h5>'+v1.kota_tujuan+'<br/>'+v1.tgl_tiba+'</h5>';
                                      html_rute += '</div>';
                                    html_rute += '</div>';
                                  html_rute += '</div>';
                                html_rute += '</div>';
                              html_rute += '</div>';
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



                    $('.form-refund').submit(function(){

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
                      var kd_verifikasi = $('#kode_verifikasi').val();


                      if(refund_gelar == '' || refund_first == '' || refund_last == '' || refund_alamat == '' || refund_telepon == '' || refund_email == '' || refund_bank == '' || refund_cabang == '' || refund_rekening == '' || refund_pemilik == '' || kd_verifikasi == ''){
                        alert('Data tidak boleh kosong');
                      } else if(kd_verifikasi != verifikasi){
                        alert('Kode Verifikasi salah. Silahkan masukkan kembali');
                      } else {

                        $.ajax({
                          url: '<?= base_url('home/proses_refund') ?>',
                          type: 'POST',
                          data: $('.form-refund').serialize(),
                          success: function(data){
                            if(data == 'berhasil')
                            {
                              $('#data').load('<?= base_url('home/term_condition') ?>');
                            } else {
                              $('#data').load('<?= base_url('home/term_condition') ?>');
                            }
                          },
                          error: function(){
                            alert('Gagal Akses');
                          }
                        });
                      }
                      return false;
                    });

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
                    });

                    $('#next-tiket').on('click', function(){
                      if($('.check-tiket').is(':checked'))
                      {
                        $('#tab-penerbangan').removeClass('disabled').click();
                        $('#tab-tiket').addClass('disabled');
                      } else {
                        alert('Anda harus memilih Tiket yang akan direfund terlebih dahulu.');
                      }
                    });

                    $('#next-penerbangan').on('click', function(){
                      if($('.check-penerbangan').is(':checked'))
                      {
                        $('#tab-payment').removeClass('disabled').click();
                        $('#tab-penerbangan').addClass('disabled');
                      } else {
                        alert('Anda harus memilih Rute Penerbangan yang akan direfund terlebih dahulu.');
                      }
                    });

                    $('#next-payment').on('click', function(){
                      $('#tab-refund').removeClass('disabled').click();
                      $('#tab-payment').addClass('disabled');
                    });

                    $('#back-penerbangan').on('click', function(){
                      $('#tab-tiket').removeClass('disabled').click();
                      $('#tab-penerbangan').addClass('disabled');
                    });

                    $('#back-payment').on('click', function(){
                      $('#tab-penerbangan').removeClass('disabled').click();
                      $('#tab-payment').addClass('disabled');
                    });

                    $('#back-form').on('click', function(){
                      $('#tab-payment').removeClass('disabled').click();
                      $('#tab-refund').addClass('disabled');
                    });

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
