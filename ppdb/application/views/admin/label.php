<!-- Header -->
<div class="header bg-gradient-warning pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--3">
    <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="col card-header d-md-inline-block bg-transparent border-0">
                  <div class="row align-items-center">
                    <div class="col-10">
                      <h3 class="mb-0">Daftar Label </h3> 
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">Tambah Label</button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-sm">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="10">No</th>
                        <th scope="col">Badge</th>
                        <th scope="col" class="col-12">Label</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="myTable">
                        <?php
                        $no = 1;
                        foreach($label as $row){ ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td> <span class="badge <?= $row->badge ?> mr-1"><?= $row->badge ?></span></td>
                            <td><?= $row->label ?></td>
                            <td class="btn-group">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_<?= $row->id ?>">Edit</button>
                                <button class="btn btn-sm btn-warning ml-1" data-toggle="modal" data-target="#delete_<?= $row->id ?>">Hapus</button>
                            </td>
                        </tr>
                        
                        <!-- Modal Edit Label-->
                        <div class="modal fade" id="edit_<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Label <?= $row->label ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= site_url('backend/label/simpan') ?>" method="POST">
                                    <input type="hidden" name="jenis" value="edit">
                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                    <div class="modal-body bg-secondary">
                                        <div class="col-xl-12 text-center">
                                            <span class="badge badge-pill badge-default">Default</span>
                                            <span class="badge badge-pill badge-primary">Primary</span>
                                            <span class="badge badge-pill badge-secondary">Secondary</span>
                                            <span class="badge badge-pill badge-info">Info</span>
                                            <span class="badge badge-pill badge-success">Success</span>
                                            <span class="badge badge-pill badge-danger">Danger</span>
                                            <span class="badge badge-pill badge-warning">Warning</span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="">Badge</label>
                                            <select name="badge" id="" class="form-control form-control-sm form-control-alternative">
                                                <option value="">- Pilih Badge -</option>
                                                <option value="badge-default" <?php if($row->badge == "badge-default"){echo "selected";} ?>>Default</option>
                                                <option value="badge-primary" <?php if($row->badge == "badge-primary"){echo "selected";} ?>>Primary</option>
                                                <option value="badge-secondary" <?php if($row->badge == "badge-secondary"){echo "selected";} ?>>Secondary</option>
                                                <option value="badge-info" <?php if($row->badge == "badge-info"){echo "selected";} ?>>Info</option>
                                                <option value="badge-success" <?php if($row->badge == "badge-success"){echo "selected";} ?>>Success</option>
                                                <option value="badge-danger" <?php if($row->badge == "badge-danger"){echo "selected";} ?>>Danger</option>
                                                <option value="badge-warning" <?php if($row->badge == "badge-warning"){echo "selected";} ?>>Warning</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Label</label>
                                            <input type="text" name="label" id="" class="form-control form-control-alternative form-control-sm" placeholder="Label" value="<?= $row->label ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>

    <!-- Modal Tambah Label-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Label</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('backend/label/simpan') ?>" method="POST">
                <input type="hidden" name="jenis" value="tambah">
                <div class="modal-body bg-secondary">
                    <div class="col-xl-12 text-center">
                        <span class="badge badge-pill badge-default">Default</span>
                        <span class="badge badge-pill badge-primary">Primary</span>
                        <span class="badge badge-pill badge-secondary">Secondary</span>
                        <span class="badge badge-pill badge-info">Info</span>
                        <span class="badge badge-pill badge-success">Success</span>
                        <span class="badge badge-pill badge-danger">Danger</span>
                        <span class="badge badge-pill badge-warning">Warning</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Badge</label>
                        <select name="badge" id="" class="form-control form-control-sm form-control-alternative">
                            <option value="">- Pilih Badge -</option>
                            <option value="badge-default">Default</option>
                            <option value="badge-primary">Primary</option>
                            <option value="badge-secondary">Secondary</option>
                            <option value="badge-info">Info</option>
                            <option value="badge-success">Success</option>
                            <option value="badge-danger">Danger</option>
                            <option value="badge-warning">Warning</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Label</label>
                        <input type="text" name="label" id="" class="form-control form-control-alternative form-control-sm" placeholder="Label">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>