<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Tiket Refund </title>
  <link rel="stylesheet" href="<?= base_url('assets/css/mytiket.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<style media="screen">
		#page-wrap{
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}
	</style>
</head>
<body>
	<div id="page-wrap">
		<div id="header">INVOICE</div>
		<div id="identity">
            <div id="address"><b>Jalan Gajah Mada No.7, RT.1/RW.2, Petojo Utara, Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10130</b></div>
            <div id="logo">
              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
              </div>
              <img id="image" src="https://upload.wikimedia.org/wikipedia/id/5/59/Lion_Air.svg" alt="logo" width="150" />
            </div>
		</div>
		<div style="clear:both"></div>
		<div id="customer">
            <div id="customer-title">Phone: (021) 63798000</div>
            <table id="meta">
                <tr>
                    <td class="meta-head">No. Refund #</td>
                    <td><textarea><?= $no_refund ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Tanggal</td>
                    <td><textarea id="date"><?= $tgl_refund ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Total</td>
                    <td><div class="due"><?= number_format($total_refund) ?></div></td>
                </tr>
            </table>
		</div>

    <br>
    <table class="table table-striped table-hover table-bordered">
      <tr>
        <th>No. Tiket</th>
        <th>Penumpang</th>
        <th>Tanggal Lahir</th>
        <th>Tipe Penumpang</th>
      </tr>
      <?php
      foreach($checkdataid as $key ): ?>
      <tr>
        <td style="font-size:90%"><?= $key->no_tiket ?></td>
        <td style="font-size:90%"><?= $key->nama_pessenger ?></td>
        <td style="font-size:90%"><?= $key->tgl_lahir ?></td>
        <td style="font-size:90%"><?= $key->tipe_pessenger ?></td>
      </tr>
    <?php endforeach ?>
    </table>

    <table class="table table-striped table-hover table-bordered">
      <tr>
        <th>No Penerbangan</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Berangkat</th>
        <th>Tiba</th>
        <th>Class</th>
        <th>Harga Tiket</th>
      </tr>
    <?php
    foreach ($getpenerbanganRefund->result() as $key):?>
    <tr>
      <td><?= $key->no_penerbangan ?></td>
      <td><?= $key->kota_asal ?></td>
      <td><?= $key->kota_tujuan ?></td>
      <td><?= $key->tgl_keberangkatan ?></td>
      <td><?= $key->tgl_tiba ?></td>
      <td><?= $key->class ?></td>
      <td><?= $key->harga_tiket ?></td>

    </tr>

   <?php endforeach; ?>

    </table>




    <div class="row">
      <div class="col-md-12">
      <button class="btn btn-info" onclick="window.print()">PRINT</button>
      </div>
    </div>



		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
		function print()
		{
			window.print();
		}
</script>
