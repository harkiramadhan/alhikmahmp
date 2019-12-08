<!-- Header -->
<div class="header bg-gradient-default pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--5">
    <div class="col-xl-12">
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Data Diri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Jasmani</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Alamat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Lain Lain</a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="anak">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NIK Anak</label>
                                    <input type="number" class="form-control form-control-sm form-control-alternative disabled" placeholder="NIK Anak" name="nik" value="<?= $anak->nik ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Nama Lengkap" name="nama" value="<?= $anak->nama ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Panggilan</label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Nama Panggilan" name="nama_panggil" value="<?= $anak->nama_panggil ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenkel" class="form-control form-control-alternative form-control-sm">
                                        <?php if($anak->jenkel == ""): ?>
                                            <option value=""  selected disabled>- Pilih Jenis Kelamin -</option>
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        <?php else: ?>
                                            <?php if($anak->jenkel == "L"): ?>
                                                <option value="" disabled>- Pilih Jenis Kelamin -</option>
                                                <option value="L" selected>Laki Laki</option>
                                                <option value="P">Perempuan</option>
                                            <?php else: ?>
                                                <option value="" disabled>- Pilih Jenis Kelamin -</option>
                                                <option value="L">Laki Laki</option>
                                                <option value="P" selected>Perempuan</option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Tempat Lahir" name="tl" value="<?= $anak->tl ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-sm form-control-alternative" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= $anak->tgl_lahir ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Hobi</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="hobi" value="<?= $anak->hobi ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Cita Cita</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="cita" value="<?= $anak->cita ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Kewarganegaraan</label>
                                    <select name="kwn" id="" class="form-control form-control-alternative form-control-sm">
                                        <option value="" disabled>- Pilih Kewarganegaraan -</option>
                                        <?php foreach($kewarganegaraan as $kw){ ?>
                                            <option value="<?= $kw->id ?>" <?php if($kw->id == $anak->kwn){echo "selected";} ?>><?= $kw->short." - ".$kw->kwn ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                    </div>
                </div>
            </div>
        </div>
    </div>