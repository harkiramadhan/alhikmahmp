<?php
    $uri1 = $this->uri->segment(1);
    $uri2 = $this->uri->segment(2);
    $uri3 = $this->uri->segment(3);

    if($uri1 == ""):
?>

<script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= site_url('home/get_berita') ?>',
            beforeSend: function(){

            },
            success: function(html){
                $('#listBerita').html(html);
            }
        });
    });
</script>

<?php endif; ?>