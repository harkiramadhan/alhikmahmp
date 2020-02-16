<?php
    $uri1 = $this->uri->segment(1);
    $uri2 = $this->uri->segment(2);
    $uri3 = $this->uri->segment(3);
    $loader = base_url('assets/home/loader.gif');
?>

<?php if($uri1 == "backend" && $uri2 == "berita" && $uri3 == NULL): ?>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: '<?= site_url('backend/berita/table_list_berita') ?>',
                beforeSend: function(){
                    $('#list_berita').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                },
                success: function(html){
                    $('#list_berita').html(html);
                }
            });
        });    
    </script>

<?php endif; ?>