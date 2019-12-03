<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--4">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card shadow card-stats mb-4 text-center">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-uppercase text-muted m-0">NIK Anak</h5> 
                        </div>
                        <div class="card-body"> 
                            <h3 class="text-uppercase m-0"><strong><?= $anak->nik ?></strong></h3>  
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card shadow card-stats mb-4 text-center">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-uppercase text-muted m-0">Nama Lengkap</h5> 
                        </div>
                        <div class="card-body"> 
                            <h3 class="text-uppercase m-0"><strong><?= $anak->nama." / ".$anak->jenkel ?></strong></h3>  
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card shadow card-stats mb-4 text-center">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-uppercase text-muted m-0">TTL</h5> 
                        </div>
                        <div class="card-body"> 
                            <h3 class="m-0"><strong><?= $anak->tl.", ".date('d-m-Y', strtotime($anak->tgl_lahir)) ?></strong></h3>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Metode Pembayaran</h5> 
                </div>
                <div class="card-body"> 
                    <form action="" method="post">
                        <div class="form-group">
                            <select name="" id="" class="form-control form-control-alternative form-control-sm">
                                <option value="" selected disabled>- Pilih Metode Pembayaran -</option>
                                <option value="">Transfer</option>
                                <option value="">Bayar Di Sekolah</option>
                            </select>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-sm btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow card-stats mb-4 text-center">
                <div class="card-header bg-secondary">
                    <h5 class="card-title text-uppercase text-muted m-0">Konfirmasi Pembayaran</h5> 
                </div>
                <div class="card-body"> 
                </div>
            </div>
        </div>
    </div>