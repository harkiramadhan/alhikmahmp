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
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Lain Lain</a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="anak1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Nama Lengkap" name="nama" value="<?= $anak->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Panggilan <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Nama Panggilan" name="nama_panggil" value="<?= $anak->nama_panggil ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin <small class="text-warning">*</small></label>
                                    <select name="jenkel" class="form-control form-control-alternative form-control-sm" required>
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
                                    <label for="">Tempat Lahir <small class="text-warning">*</small></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" placeholder="Tempat Lahir" name="tl" value="<?= $anak->tl ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <small class="text-warning">*</small></label>
                                    <input type="date" class="form-control form-control-sm form-control-alternative" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= $anak->tgl_lahir ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Anak Ke - <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" min="1" name="anak_ke" placeholder="Anak Ke -" value="<?= $anak->anak_ke ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Kakak</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="kakak" placeholder="Jumlah Kakak" value="<?= $anak->kakak ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Adik</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="adik" placeholder="Jumlah Adik" value="<?= $anak->adik ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Saudara Tiri</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="tiri" placeholder="Jumlah Saudara Tiri" value="<?= $anak->tiri ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Saudara Angkat</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="angkat" placeholder="Jumlah Saudara Angkat" value="<?= $anak->angkat ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Hobi</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="hobi" placeholder="Hobi" value="<?= $anak->hobi ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Cita Cita</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="cita" placeholder="Cita Cita" value="<?= $anak->cita ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Bahasa Sehari Hari</label>
                                    <select name="bahasa" id="" class="form-control form-control-alternative form-control-sm">
                                        <?php if($anak->bahasa == NULL): ?>
                                            <option value="" selected disabled>- Pilih Bahasa Sehari Hari -</option>
                                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                            <option value="Bahasa Daerah">Bahasa Daerah</option>
                                            <option value="Bahasa Asing">Bahasa Asing</option>
                                        <?php else: ?>
                                            <option value="<?= $anak->bahasa ?>" selected><?= $anak->bahasa ?></option>
                                            <option value="" disabled></option>
                                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                            <option value="Bahasa Daerah">Bahasa Daerah</option>
                                            <option value="Bahasa Asing">Bahasa Asing</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kewarganegaraan <small class="text-warning">*</small></label>
                                    <select name="kwn" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" disabled>- Pilih Kewarganegaraan -</option>
                                        <?php foreach($kewarganegaraan as $kw){ ?>
                                            <option value="<?= $kw->id ?>" <?php if($kw->id == $anak->kwn){echo "selected";} ?>><?= $kw->short." - ".$kw->kwn ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="anak">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Berat Badan (Kg) <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" value="<?= $anak->bb ?>" name="bb" placeholder="Berat Badan (Kg)" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tinggi Badan (Cm) <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" value="<?= $anak->tb ?>" name="tb" placeholder="Tinggi Badan (Cm)" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Lingkar Kepala (Cm) <small class="text-warning">*</small></label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" value="<?= $anak->lk ?>" name="lk" placeholder="Lingkar Kepala (Cm)" required>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Golongan Darah</label>
                                    <select name="goldar" id="" class="form-control form-control-sm form-control-alternative">
                                        <?php if($anak->goldar == NULL): ?>
                                            <option value="" selected disabled>- Pilih Golongan Darah -</option>
                                            <option value="O">O</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                        <?php else: ?>
                                            <option value="<?= $anak->goldar ?>" selected><?= $anak->goldar ?></option>
                                            <option value="" disabled></option>
                                            <option value="O">O</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Penyakit Yang Pernah Di Derita</label>
                                    <textarea name="penyakit" id="" cols="30" rows="3" class="form-control form-control-alternative form-control-sm"><?= $anak->penyakit ?></textarea>
                                </div>
                            </div>            
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="anak3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat Rumah Saat Ini <small class="text-warning">*</small></label>
                                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control form-control-alternative form-control-sm" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">RT</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="rt" placeholder="RT">
                                </div>
                                <div class="form-group">
                                    <label for="">RW</label>
                                    <input type="number" class="form-control form-control-alternative form-control-sm" name="rw" placeholder="RW">
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Rumah</label>
                                    <input type="text" class="form-control form-control-alternative form-control-sm" name="no" placeholder="Nomor Rumah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Provinsi <small class="text-warning">*</small></label>
                                    <select name="provinsi" id="provinsi" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="">- Pilih Privinsi -</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kabupaten <small class="text-warning">*</small></label>
                                    <select name="kabupaten" id="kabupaten" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="">- Pilih Kabupaten -</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kecamatan <small class="text-warning">*</small></label>
                                    <select name="kecamatan" id="kecamatan" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="">- Pilih Kecamatan -</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelurahan <small class="text-warning">*</small></label>
                                    <select name="kelurahan" id="kelurahan" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="">- Pilih Kelurahan -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <form action="<?= site_url('biodata/simpan') ?>" method="post">
                        <input type="hidden" name="jenis" value="anak4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Status Dalam Keluarga <small class="text-danger">*</small></label>
                                    <select name="" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" selected disabled>- Pilih Status Dalam Keluarga -</option>
                                        <option value="Kandung">Kandung</option>
                                        <option value="Tiri">Tiri</option>
                                        <option value="Angkat">Angkat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Keberadaan Orang Tua <small class="text-danger">*</small></label>
                                    <select name="" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" selected disabled>- Pilih Keberadaan Orang Tua -</option>
                                        <option value="Lengkap">Lengkap</option>
                                        <option value="Yatim">Yatim</option>
                                        <option value="Piatu">Piatu</option>
                                        <option value="Yatim Piatu">Yatim Piatu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Yang Membiayai Sekolah <small class="text-danger">*</small></label>
                                    <select name="" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" selected disabled>- Pilih Yang Membiayai Sekolah -</option>
                                        <option value="Orang Tua Kandung">Orang Tua Kandung</option>
                                        <option value="Orang Tua Asuh">Orang Tua Asuh</option>
                                        <option value="Panti Asuhan">Panti Asuhan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kondisi Fisik <small class="text-danger">*</small></label>
                                    <select name="" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" selected disabled>- Pilih Kondisi Fisik -</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Berkelainan">Berkelainan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kondisi Mental <small class="text-danger">*</small></label>
                                    <select name="" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" selected disabled>- Pilih Kondisi Mental -</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Berkelainan">Berkelainan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </form>             
                    </div>
                </div>
            </div>
        </div>
    </div>