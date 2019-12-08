<?php if($this->uri->segment(1) == "biodata" && $this->uri->segment(2) == "anak"): ?>
<script>
   $(document).ready(function(){
    $("#kabupaten").prop("disabled", true);
    $('#kecamatan').prop("disabled", true);
    $('#kelurahan').prop("disabled", true);
    $('#provinsi').click(function(){
        
    });
   });
</script>
<?php endif; ?>