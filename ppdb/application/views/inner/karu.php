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
		.nama {
			font-size: 70%;
            /* width: 188px; */
            margin-left: 110px;
            margin-top: -69px;
            font-family: verdana;
            position: absolute;
		}
		.kartuujian {
			border: 1px solid gray;
			height:5.5cm;
			padding:0 0 0 0;
			/* position:relative; */
			width:8.9cm;
			background-image:url('<?= base_url('') ?>assets/img/bg-kartu-ujian.png');
			background-size:100%;
            background-repeat: no-repeat;
		}
		.qrcode {
            margin-left: 283.8px;
            margin-top: 16.6px;
		}
	</style>

</head>

<body>
	<div class="container">
	<h3><span style="color:red;">PRINT A4</span>, Gunting dan laminating / gunakan name tag lalu bawa ketika akan melaksanakan ujian.</h3>
		<div class="kartuujian">
            <div style="height: 3cm; width: 2cm; margin-left: 15.2px; overflow: hidden; position: fixed; margin-top: 25.3px; border-radius: 5px;">
                <img style="position: absolute; left: -1000%; right: -1000%; top: -1000%; bottom: -1000%; margin: auto; height: 3cm; width: 2cm; border-radius: 5px;" src="<?= base_url('upload/img/'.$foto->img) ?>">
            </div>
            <div class="nama"><b><?= $siswa->nama." / ".$siswa->jenkel ?></b>
                <br><?= $siswa->asal_sekolah ?>
                <br>No Peserta : <b>20xxx</b>    
            </div>
            <div class="qrcode"> <barcode code="<?= site_url('ppdb/status/'.$idcsiswa) ?>" type="QR" error="Q" size="0.4" border="0" disableborder="1" /></div>
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