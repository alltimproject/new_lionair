<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url().'assets_user/img/apple-icon.png' ?>">
  <link rel="icon" type="image/png" href="<?= base_url().'assets_user/img/favicon.png' ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Lion System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/css/material-kit.css' ?>"  />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/demo/demo.css' ?>"/>

  <script src="<?= base_url().'assets/jquery/jquery.min.js' ?>" type="text/javascript"></script>
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
          Lion System </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Components
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="./index.html" class="dropdown-item">
                <i class="material-icons">layers</i> All Components
              </a>
              <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                <i class="material-icons">content_paste</i> Documentation
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">cloud_download</i> Download
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url('images/bg01.jpg') ?>')">
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1><img src="<?= base_url().'images/bg03.png' ?>" width="250px" alt=""> </h1>
            <h3>Refund and Reschedul System</h3>
            <br>
            <form class="form-search">
              <div class="input-group has-white">
              <input type="text" name="search-booking" id="search-booking" class="form-control" placeholder="Cari Kode Booking... " style="height: 50px; font-size: 30px;">
              <div class="input-group-append">
                <button type="submit" class="btn btn-white btn-raised btn-lg btn-fab btn-round">
                    <i class="material-icons">search</i>
                  </button>
              </div>
            </div>
            </form>
          </div>
        </div>
    </div>
  </div>

  <div class="main main-raised">
    <div class="section section-signup">
      <div class="container">
        <div id="data"></div>
      </div>
    </div>
  </div>

  <footer class="footer" data-background-color="black">
    <div class="container">
      <div class="copyright float-left">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">AllTimProject</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="<?= base_url().'assets_user/js/core/popper.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets_user/js/core/bootstrap-material-design.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets_user/js/plugins/moment.min.js' ?>"></script>
  <script src="<?= base_url().'assets_user/js/material-kit.js' ?>" type="text/javascript"></script>
  <script>

    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }

    $(document).ready(function(){
      $('#data').load('<?= base_url('home/term_condition') ?>');

      $('.form-search').submit(function(){
        var search = $('#search-booking').val();
        var html = '';

        if(search == '') {
          alert('Harap masukkan Kode Booking');
        } else {
          $("html, body").animate({
            scrollTop: $('#data').offset().top
          }, 1000);

          $.ajax({
            url: '<?= base_url('home/cari_booking/') ?>'+search,
            type: 'GET',
            dataType: 'JSON',
            success: function(data){
              if(data.data == '')
              {
                alert('Data tidak ditemukan');
              } else {


                  html += '<h3>Kode Booking : '+data.booking+'</h3>';
                  html += '<h4 class="title"> Pessenger Detail </h4>';
                  html += '<table class="table table-responsive table-hover">';
                  html += '<thead><tr style="background-color: aqua"><th>Pessenger Type</th><th>Pessenger Name</th><th>Ticket Number</th></tr></thead>';
                  html += '<tbody>';
                  $.each(data.pessenger, function(k, v){
                    html += '<tr>';
                    html += '<td>'+v.tipe_pessenger+'</td>';
                    html += '<td>'+v.nama_pessenger+'</td>';
                    html += '<td>'+v.no_tiket+'</td>';
                    html += '</tr>';
                  });
                  html += '</tbody></table>';


                html += '<h4 class="title"> Penerbangan Detail </h4>';
                html += '<table class="table table-responsive table-hover">';
                html += '<thead><tr style="background-color: aqua"><th>Flight</th><th>Departure</th><th>Arrival</th><th>Class</th><th>Status</th></tr></thead>';
                html += '<tbody>';

                $.each(data.penerbangan, function(key1, value1){
                  html += '<tr>';
                  html += '<td>'+value1.no_penerbangan+'</td>';
                  html += '<td>'+value1.kota_asal+'<br/>'+value1.tgl_keberangkatan+'</td>';
                  html += '<td>'+value1.kota_tujuan+'<br/>'+value1.tgl_tiba+'</td>';
                  html += '<td>'+value1.class+'</td>';
                  html += '<td>'+value1.status+'</td>';
                  html += '</tr>';
                });

                html += '</tbody></table>';

                html += '<div class="float-right">';
                html += '<a href="<?= base_url('home/form_refund/') ?>'+data.booking+'" id="refund" class="btn btn-md btn-danger"><strong>Refund</strong></a> ';
                html += '<button type="button" class="btn btn-md btn-success"><strong>Reschedul<strong></button>';
                html += '</div>';

                $('.form-search')[0].reset();
                $('#data').html(html);
              }
            }, error: function(){
              alert('Data tidak ditemukan');
            }
          });
        }
        return false;
      });

      $(document).on('click', '#refund', function(){
        var href = $(this).attr('href');
        $.get(href, function(data){
          $('#data').html(data);

          $("html, body").animate({
            scrollTop: $('#data').offset().top
          }, 1000);
        });
        return false;
      });
    });
  </script>
</body>

</html>
