<!-- Header -->
<div class="header bg-gradient-warning pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--5">
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
                  <table class="table align-items-center table-flush">
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
                            <td></td>
                        </tr>
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </div>
        </div>
    </div>