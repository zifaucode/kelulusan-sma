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

<style>
body {
  background-color: #21211f;
}
</style>

<body>
    
    
    <div class="container">
    	<div class="card-columns">
  <div class="card bg-primary">
    <div class="card-body text-center">
      <h2 class="card-text"> Pengumuman PPDB TAHAP-1 <br>SMAN 1 PARUNG <?= $tahun; ?></h2>
    </div>

  </div>

  <center> <img src="img/logo.png" width="180px" height="190px"></center><br>
       
		<!-- countdown -->
		
		<div id="clock" class="lead"></div>
		
		<div id="xpengumuman">
		<?php
		if(isset($_POST['submit'])){
			//tampilkan hasil queri jika ada
			$no_ujian = stripslashes($_POST['nomor']);
			
			$hasil = mysqli_query($db_conn,"SELECT * FROM un_siswa WHERE no_ujian='$no_ujian'");
			if(mysqli_num_rows($hasil) > 0){
				$data = mysqli_fetch_array($hasil);
				
		?>
			<table class="table table-bordered bg-primary" >
				
				<tr><td>Nama Peserta Didik</td><td><?= htmlspecialchars($data['nama']); ?></td></tr>
				<tr><td>NO.PENDAFTARAN</td><td><?= htmlspecialchars($data['no_ujian']); ?></td></tr>
				
				<tr><td>ASAL SEKOLAH</td><td><?= htmlspecialchars($data['n_bin']); ?></td></tr>
				
			</table>
			
			<table class="table table-bordered bg-primary">
				<thead>
					
				<tr>
					<th>Informasi</th>
					
				</tr>
				</thead>
				<tbody>
					
					<td>berdasarkan rapat pleno Panitia dan Dewan Guru  untuk menentukan Hasil Seleksi PPDB SMA Negeri 1 Parung TAHAP-1<br><br>KEPUTUSAN KEPALA SEKOLAH dan PANITIA PPDB SMA NEGERI 1 PARUNG TAHUN 2020/2021 <br>MENYATAKAN :<br>
  
</td>
</font>
					
				</tbody>
			</table>

			<div class="card-columns">
  <div class="card bg-primary">
    <div class="card-body text-center">
      <h3 class="card-text">Dengan Ini ( <?= htmlspecialchars($data['nama']); ?> )</h3>
    </div>
  </div>
			
			<?php
			if( $data['status'] == 1 ){
				echo '<div class="alert alert-success" role="alert"><strong>SELAMAT !</strong> Anda <b>DITERIMA</b> Di SMAN 1 PARUNG. <br>
				Jangan Lupa daftar Ulang. <br><center><a href="./info.php"><button class="btn btn-warning">DAFTAR ULANG</button></a></center>

				</div><center><br><a href="index.php"><button class="btn btn-primary">KEMBALI KE HALAMAN AWAL</button></a><br></center>';
			} else {
				echo '<div class="alert alert-danger" role="alert"><strong>MAAF !</strong> Anda <b>BELUM DITERIMA</b> Di SMAN 1 PARUNG Silahkan Cek Pilihan Kedua Secara Mandiri untuk mendapatkan Info Selanjutnya</div> <center><br><a href="index.php"><button class="btn btn-primary">KEMBALI KE HALAMAN AWAL</button></a><br></center';
			}	
			?>
			
		<?php
			} else {
				echo ' <font color="white"> NISN ANDA TIDAK DITEMUKAN.</font><br><a href="index.php"><button class="btn btn-primary">CARI LAGI</button></a>';
				//tampilkan pop-up dan kembali tampilkan form
			}
		} else {
			//tampilkan form input nomor ujian
		?>


        <font color="white"><p>Masukan NO.PENDAFTARAN untuk Melihat Hasil<br>CONTOH : 20200000-5-00000</p></font>
        
        <form method="post">
            <div class="input-group">
                <input type="text" name="nomor" class="form-control" placeholder="NOMOR PENDAFTARAN" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="submit">LIHAT</button>
                </span>
            </div>
        </form>
		<?php
		}
		?>
		</div>
    </div><!-- /.container -->
	
	
    
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
		$this.html(event.strftime('<div class="card bg-warning"><font color="white">Pengumuman dapat dilihat: <span>%H Jam %M Menit %S Detik</span> lagi</font></div>'));
		$( "#xpengumuman" ).hide();
	}
	});

	</script>
</body>
</html>
