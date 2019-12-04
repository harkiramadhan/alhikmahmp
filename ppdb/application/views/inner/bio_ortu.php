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
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Biodata Ayah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Biodata Ibu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Biodata Wali</a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="ayah">
                        <?php if($cekayah->num_rows() > 0): 
                            $ayah = $cekayah->row();
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Ayah" name="nama" value="<?= $ayah->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Induk Kependudukan <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" placeholder="Nomor Induk Kependudukan" name="nik" value="<?= $ayah->nik ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" value="<?= $ayah->tl ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" value="<?= $ayah->tgl_lahir ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat Tinggal <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idtempat" required>
                                        <option value="" selected disabled>- Pilih Tempat Tinggal -</option>
                                        <?php foreach($tempat_tinggal as $t){ ?>
                                            <option value="<?= $t->id ?>" <?php if($ayah->idtempat == $t->id){echo "selected";} ?>><?= $t->tempat ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>" <?php if($ayah->idpendidikan == $p->id){echo "selected";} ?>><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Pendidikan</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" value="<?= $ayah->gelar ?>" placeholder="Gelar Pendidikan">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>" <?php if($ayah->idpekerjaan == $pk->id){echo "selected";} ?>><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama & Alamat Pekerjaan</label>
                                    <textarea id="" cols="30" rows="5" class="form-control form-control-alternative form-control-sm" name="alamat_pekerjaan"><?= $ayah->alamat_pekerjaan ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-alternative form-control-sm" name="email" value="<?= $ayah->email ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Penghasilan Perbulan (Rp.) <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpenghasilan" required>
                                        <option value="" selected disabled>- Pilih Penghasilan Perbulan -</option>
                                        <?php foreach($penghasilan as $pg){ ?>
                                            <option value="<?= $pg->id ?>" <?php if($ayah->idpenghasilan == $pg->id){echo "selected";} ?>><?= $pg->penghasilan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning"><b>*) Tanpa Gelar</b></small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Nama Lengkap Ayah" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Induk Kependudukan <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" placeholder="Nomor Induk Kependudukan" name="nik" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" placeholder="Tempat Lahir" name="tl" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-alternative form-control-sm" name="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat Tinggal <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idtempat" required>
                                        <option value="" selected disabled>- Pilih Tempat Tinggal -</option>
                                        <?php foreach($tempat_tinggal as $t){ ?>
                                            <option value="<?= $t->id ?>"><?= $t->tempat ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pendidikan Terakhir <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpendidikan" required>
                                        <option value="" selected disabled>- Pilih Pendidikan Terakhir -</option>
                                        <?php foreach($pendidikan as $p){ ?>
                                            <option value="<?= $p->id ?>"><?= $p->short ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gelar Pendidikan</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="gelar" placeholder="Gelar Pendidikan">
                                </div>
                                <div class="form-group">
                                    <label for="">Pekerjaan <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpekerjaan" required>
                                        <option value="" selected disabled>- Pilih Pekerjaan -</option>
                                        <?php foreach($pekerjaan as $pk){ ?>
                                            <option value="<?= $pk->id ?>"><?= $pk->pekerjaan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama & Alamat Pekerjaan</label>
                                    <textarea id="" cols="30" rows="5" class="form-control form-control-alternative form-control-sm" name="alamat_pekerjaan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-alternative form-control-sm" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Penghasilan Perbulan (Rp.) <small class="text-warning">*</small></label>
                                    <select id="" class="form-control form-control-alternative form-control-sm" name="idpenghasilan" required>
                                        <option value="" selected disabled>- Pilih Penghasilan Perbulan -</option>
                                        <?php foreach($penghasilan as $pg){ ?>
                                            <option value="<?= $pg->id ?>"><?= $pg->penghasilan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php endif; ?>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                        <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                        <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>