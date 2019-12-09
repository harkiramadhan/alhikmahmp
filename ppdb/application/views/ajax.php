<?php if($this->uri->segment(1) == "biodata" && $this->uri->segment(2) == "anak"): ?>
<script>
   $(document).ready(function(){
    $("#kabupaten").prop("disabled", true);
    $('#kecamatan').prop("disabled", true);
    $('#kelurahan').prop("disabled", true);
    $('#provinsi').click(function(){
        
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