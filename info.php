<?php
include "database.php";
$que = mysqli_query($db_conn, "SELECT * FROM un_konfigurasi");
$hsl = mysqli_fetch_array($que);
$timestamp = strtotime($hsl['tgl_pengumuman']);
// menghapus tags html (mencegah serangan jso pada halaman index)
$sekolah = strip_tags($hsl['sekolah']);
$tahun = strip_tags($hsl['tahun']);
$tgl_pengumuman = strip_tags($hsl['tgl_pengumuman']);
//echo $timestamp;

?>
<!DOCTYPE html>
<html>
<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 
    
    <title>CEK PPDB - SMAN 1 PARUNG</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="css/kelulusan.css" rel="stylesheet">
</head>

<body>
    
    
    <div class="container">
    	<div class="card-columns">
    		<center><a href="./"><button class="btn btn-primary">KEMBALI</button></a></center>
  <div class="card bg-primary">
    <div class="card-body text-center">

      <h2 class="card-text"> INFORMASI DAFTAR ULANG</h2>
    </div>
  </div>
       
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Informasi</th>
					
				</tr>
				</thead>
				<tbody>
					
					<td>Proses Pengisian Daftar Ulang PPDB dilakukan secara online, dan berkas yang telah di input Harus di Print Lalu diserahkan ke SMAN 1 PARUNG berdasakan sesi yang Ditentukan<br><br>
						<center><a href="#"><button class="btn btn-primary">KLIK DAFTAR ULANG</button></a></center>


						<br>
						<b>Terimakasih.</b>
  
</td>

<table class="table table-bordered">
				<tr><td>HARI/TANGGAL :</td><td>ISIKAN HARI DAN TANGGAL</td></tr>
				<tr><td>SESI 1 :</td><td>JAM BERAPA</td></tr>
				<tr><td>SESI 2 :</td><td>JAM BERAPA</td></tr>
				<tr><td>SESI 3 :</td><td>JAM BERAPA</td></tr>
				<tr><td>SESI 4 :</td><td>JAM BERAPA</td></tr>
				
			</table>


		
		</div>
    </div><!-- /.container -->
	
	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy; <?= $tahun; ?> &middot;  <?= $sekolah; ?></p>
		</div>
	</footer>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript">
	var skrg = Date.now();
	$('#clock').countdown("<?= $tgl_pengumuman; ?>", {elapse: true})
	.on('update.countdown', function(event) {
	var $this = $(this);
	if (event.elapsed) {
		$( "#xpengumuman" ).show();
		$( "#clock" ).hide();
	} else {
		$this.html(event.strftime('Pengumuman dapat dilihat: <span>%H Jam %M Menit %S Detik</span> lagi'));
		$( "#xpengumuman" ).hide();
	}
	});

	</script>
</body>
</html>
