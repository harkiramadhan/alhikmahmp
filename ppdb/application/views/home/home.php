<?php if($slider->num_rows() > 0): ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <?php 
       $total = $slider->num_rows() - 1;
       $range = range(0, $total);
       foreach($range as $r){ ?>
       <li data-target="#carouselExampleIndicators" data-slide-to="<?= $r ?>" class="<?php if($r==0){echo "active";} ?>"></li>
       <?php } ?>
     </ol>
     <div class="carousel-inner">
        <?php 
        $no = 1;  
        foreach($slider->result() as $row){ ?>
        <div class="carousel-item <?php if($no == 1){echo "active";} ?>">
            <div class="page-header header-filter clear-filter info-filter" data-parallax="true" style="background-image: url('<?= base_url('/assets/home/img/slide/'.$row->img) ?>');">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h1 class="title"><?= $nama ?></h1>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php $no++; ?>
        <?php } ?>
     </div>
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
  <?php endif; ?>
 
   <div class="main main-raised mt-5">
    <?php if($bg->num_rows() > 0):
      $bgg = $bg->row();  
    ?>
     <div class="section text-center rounded" style="background-image: url('<?= base_url('/assets/home/img/bg/'.$bgg->img) ?>')">
        <div class="features">
        </div>
      </div>
    <?php endif; ?>
    <div class="container">
       <div class="section">
           <h2 class="title text-center">Berita</h2>
           <br>
           <div class="row">
             <div class="col-md-4">
               <div class="card card-plain card-blog">
                 <div class="card-header card-header-image">
                   <a href="#pablo">
                     <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/2.JPG">
                   </a>
                 <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/2.JPG&quot;); opacity: 1;"></div></div>
                 <div class="card-body">
                   <h6 class="card-category text-info"></h6>
                   <h4 class="card-title">
                     <a href="#pablo">Tarhib Ramadhan</a>
                   </h4>
                   <p class="card-description">
                    Tarhib Ramadhan.<a href="#pablo"> Read More </a>
                   </p>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-plain card-blog">
                 <div class="card-header card-header-image">
                   <a href="#pablo">
                     <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/1.JPG">
                   </a>
                 <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/1.JPG&quot;); opacity: 1;"></div></div>
                 <div class="card-body">
                   <h6 class="card-category text-success">
 
                   </h6>
                   <h4 class="card-title">
                     <a href="#pablo">Gema Muharram 1441 H</a>
                   </h4>
                   <p class="card-description">
                    Gema Muharram 1441 H.<a href="#pablo"> Read More </a>
                   </p>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-plain card-blog">
                 <div class="card-header card-header-image">
                   <a href="#pablo">
                     <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/10.JPG">
                   </a>
                 <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/10.JPG&quot;); opacity: 1;"></div></div>
                 <div class="card-body">
                   <h6 class="card-category text-danger">
                     <!-- <i class="material-icons">trending_up</i> Enterprise -->
                   </h6>
                   <h4 class="card-title">
                     <a href="#pablo">MOSB , Mengenal Lingkungan Sekolah dan Tata Tertib Sekola</a>
                   </h4>
                   <p class="card-description">
                      Masa Orientasi Siswa Baru, Mengenal Lingkungan Sekolah dan Tata Tertib Sekolah.<a href="#pablo"> Read More </a>
                   </p>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
                 <div class="card card-plain card-blog">
                   <div class="card-header card-header-image">
                     <a href="#pablo">
                       <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/2.JPG">
                     </a>
                   <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/2.JPG&quot;); opacity: 1;"></div></div>
                   <div class="card-body">
                     <h6 class="card-category text-info"></h6>
                     <h4 class="card-title">
                       <a href="#pablo">Tarhib Ramadhan</a>
                     </h4>
                     <p class="card-description">
                      Tarhib Ramadhan.<a href="#pablo"> Read More </a>
                     </p>
                   </div>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="card card-plain card-blog">
                   <div class="card-header card-header-image">
                     <a href="#pablo">
                       <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/1.JPG">
                     </a>
                   <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/1.JPG&quot;); opacity: 1;"></div></div>
                   <div class="card-body">
                     <h6 class="card-category text-success">
 
                     </h6>
                     <h4 class="card-title">
                       <a href="#pablo">Gema Muharram 1441 H</a>
                     </h4>
                     <p class="card-description">
                      Gema Muharram 1441 H.<a href="#pablo"> Read More </a>
                     </p>
                   </div>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="card card-plain card-blog">
                   <div class="card-header card-header-image">
                     <a href="#pablo">
                       <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/10.JPG">
                     </a>
                   <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/10.JPG&quot;); opacity: 1;"></div></div>
                   <div class="card-body">
                     <h6 class="card-category text-danger">
                       <!-- <i class="material-icons">trending_up</i> Enterprise -->
                     </h6>
                     <h4 class="card-title">
                       <a href="#pablo">MOSB , Mengenal Lingkungan Sekolah dan Tata Tertib Sekolah</a>
                     </h4>
                     <p class="card-description">
                      Masa Orientasi Siswa Baru, Mengenal Lingkungan Sekolah dan Tata Tertib Sekolah.<a href="#pablo"> Read More </a>
                     </p>
                   </div>
                 </div>
               </div>
           </div>
           <div class="col-md-12 text-right">
               <a href="#pablo"> Selengkapnya </a>
           </div>
       </div>
       <div class="section">
           <div class="container">
             <div class="row">
               <div class="col-md-12">
                 <h2 class="title text-center">Gallery</h2>
                 <br>
                 <div class="row">
                   <div class="col-md-4">
                     <div class="card card-blog">
                       <div class="card-header card-header-image">
                         <a href="#pablo">
                           <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/2.JPG">
                         </a>
                       <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/2.JPG&quot;); opacity: 1;"></div></div>
                       <div class="card-body">
                         <h6 class="category text-info">Tarhib Ramadhan</h6>
                       </div>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="card card-blog">
                       <div class="card-header card-header-image">
                         <a href="#pablo">
                           <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/1.JPG">
                         </a>
                       <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/1.JPG&quot;); opacity: 1;"></div></div>
                       <div class="card-body">
                         <h6 class="category text-info">
                           Gema Muharram 1441 H
                         </h6>
                       </div>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="card card-blog">
                       <div class="card-header card-header-image">
                         <a href="#pablo">
                           <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/10.JPG">
                         </a>
                       <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/10.JPG&quot;); opacity: 1;"></div></div>
                       <div class="card-body">
                         <h6 class="category text-info">
                           MOSB , Mengenal Lingkungan Sekolah dan Tata Tertib Sekolah
                         </h6>
                       </div>
                     </div>
                   </div>
                   <div class="col-md-12 text-right">
                       <a href="#pablo"> Selengkapnya </a>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
    </div>
   </div>