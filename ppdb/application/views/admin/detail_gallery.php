<!-- Header -->
<div class="header bg-gradient-warning pb-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 mt-5 mb-xl-0 mb-4 order-xl-2">
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <img id="image-preview" alt="image preview" src="<?= base_url('./assets/home/img/content/' . $gallery->img) ?>">
                    </div>
                </div>
            </div>
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col">
                        <div class="mt-5">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1 mt-5">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0"><?= $gallery->judul ?></h3>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tambah">Tambah Foto</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
            </div>
        </div>   