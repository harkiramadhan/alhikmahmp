<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap');

		@page {
			size: A4;
			margin: 100;
		}
		@media print {
			html, body {
				width: 210mm;
				height: 297mm;
			}
		}
		.noujian {
			font-size: 170%;
            margin-top: 9px;
            font-family: verdana;
		}
		.nama {
			font-size: 100%;
            font-family: verdana;
		}
		.asal-sekolah {
			font-size: 100%;
			margin-top: 2px;
            font-family: verdana;
		}
		.kartuujian {
			border: 1px solid white;
			height:14cm;
			padding:0 0 0 0;
			width:10cm;
			background-image:url('<?= base_url('') ?>assets/img/bg-kartu-ujian.png');
			background-size:100%;
            background-repeat: no-repeat;
			text-align: center;
		}
		.potong {
			position: relative;
			margin-left: 25%;
			border: 1px dashed black;
			height:14.07cm;
			width:10.07cm;
		}
		.cut {
			margin-left: 24%;
			margin-bottom: -2px;
		}
	</style>

</head>

<body>
	<div class="container">
	<h3><span style="color:red;">PRINT A4</span>, Gunting pada garis putus-putus dan laminating / gunakan name tag lalu bawa ketika akan melaksanakan ujian.</h3>
		<img src="<?= base_url('assets/img/cut.png') ?>" alt="" class="cut">
		<div class="potong">
			<div class="kartuujian">
				<div style="height: 4cm; width: 3cm; margin-left: 132.3px; overflow: hidden; position: relative;margin-top: 214.3px; border-radius: 5px;">
					<img style="position: absolute; left: -1090.8%; right: -1092%; top: -1000%; bottom: -1000%; margin: auto; height: 4cm; width: 3cm; border-radius: 5px;" src="<?= base_url('upload/img/'.$foto->img) ?>">
				</div>
				<div class="noujian"><b>20XXX</b></div>
				<div class="nama"><b><?= $siswa->nama." / ".$siswa->jenkel ?></b></div>
				<div class="asal-sekolah"><b><?= $siswa->asal_sekolah ?></b></div>
			</div>
		</div>

		<h3 style="color:red">Penting!</h3>
		<p><b>Kartu Ujian : </b> Ini adalah kartu ujian anda, kartu ujian yang diperuntukkan bagi anak. </p>
		<p><b>Registrasi Kedatangan : </b> Registrasi kedatangan dilakukan saat mengikuti ujian, siapkan kartu ujian dengan QR Code yang telah di print. </p>
		<p><b>Perlengkapan : </b> Bawalah alat tulis dan Papan jalan, 
		<p><b>Lokasi Ujian : </b> SDIT Al Hikmah
		<p><b>Waktu Ujian : </b> Ujian pukul 07.30 WIB s/d Selesai
	</div>
</body>
</html>