<!-- End Contact -->
<!--========== END PAGE LAYOUT ==========-->
<!--========== FOOTER ==========-->
<footer class="footer w3-red">
  <div class="content container">
      <div class="row">
          <div class="col-xs-6">
              <img class="footer-logo" src="<?= base_url('images/bg03.png')?>" alt="Lion Air Group">
          </div>
          <div class="col-xs-6 text-right sm-text-left">
              <p class="margin-b-0"><a class="fweight-700">Lion System</a> &nbsp; Powered by: AllTimProject2018</p>
          </div>
      </div>
      <!--// end row -->
  </div>
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- CORE PLUGINS -->
<script src="<?= base_url().'assets/jquery/jquery.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/jquery/jquery-migrate.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/bootstrap/js/bootstrap.min.js' ?>  " type="text/javascript"></script>

<!-- PAGE LEVEL PLUGINS -->
<script src="<?= base_url().'assets/jquery/jquery.easing.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/jquery/jquery.back-to-top.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/jquery/jquery.smooth-scroll.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/jquery/jquery.wow.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/jquery/jquery.parallax.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/jquery/jquery.appear.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/masonry/jquery.masonry.pkgd.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/masonry/imagesloaded.pkgd.min.js' ?> " type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?= base_url().'assets/js/layout.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/js/components/progress-bar.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/js/components/masonry.min.js' ?> " type="text/javascript"></script>
<script src="<?= base_url().'assets/js/components/wow.min.js' ?> " type="text/javascript"></script>
<script type="text/javascript">
//  Menu
function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-red";
    }
    document.getElementById("myLink").click();
</script>
</body>
<!-- END BODY -->
</html>
