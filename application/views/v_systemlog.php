<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOGIN SYSTEM | LION AIR</title>
    <link href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= base_url().'assets/css/styleloginadmin.css'?>">
    <script src="<?= base_url().'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= base_url().'assets/jquery/jquery.min.js' ?>"></script>
  </head>
  <body>

    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?= base_url().'images/bg03.png' ?>" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="<?= base_url().'admin/checklogin'?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Enter Your ID" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

                <select class="form-control" name="level">
                  <option value="">-- Hak Akses --</option>
                  <option value="admin">ADMIN</option>
                  <option value="accounting">ACCOUNTING</option>
                </select>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
  </body>
</html>
