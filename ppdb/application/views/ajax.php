<?php if($this->uri->segment(1) == "biodata" && $this->uri->segment(2) == "anak"): ?>
<script>
   $(document).ready(function(){
      $("#kabupaten").prop("disabled", true);
      $('#kecamatan').prop("disabled", true);
      $('#kelurahan').prop("disabled", true);

      $('#provinsi').on('change',function(){
         var idprop = $(this).val();
         $.ajax({
            url: '<?= site_url('biodata/kabupaten') ?>',
            type: 'post',
            data: {idprop : idprop},
            success:function(response){
               $("#kabupaten").prop("disabled", false);
               $("#kabupaten").html(response);
            }
         });
      });

      $('#kabupaten').on('change',function(){
         var idkab = $(this).val();
         $.ajax({
            url: '<?= site_url('biodata/kecamatan') ?>',
            type: 'post',
            data: {idkab : idkab},
            success:function(response){
               $("#kecamatan").prop("disabled", false);
               $("#kecamatan").html(response);
            }
         });
      });

      $('#kecamatan').on('change',function(){
         var idkec = $(this).val();
         $.ajax({
            url: '<?= site_url('biodata/kelurahan') ?>',
            type: 'post',
            data: {idkec : idkec},
            success:function(response){
               $("#kelurahan").prop("disabled", false);
               $("#kelurahan").html(response);
            }
         });
      });

      $('#pindahan').hide();
      $('#jenis_siswa').on('change', function(){
         if(this.value === "pindahan"){
            $('#kelas').prop('required',true);
            $('#tanggal_pindah').prop('required',true);
            $('#pindahan').show();
         }else{
            $('#kelas').prop('required',false);
            $('#tanggal_pindah').prop('required',false);
            $('#pindahan').hide();
         }
      });
   });
</script>
<?php endif; ?>