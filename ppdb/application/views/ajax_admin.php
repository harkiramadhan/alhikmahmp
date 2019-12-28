<?php if($this->uri->segment(1) == "dashboard" && $this->uri->segment(2) == ""): ?>
<script>
    $('#csiswa').dataTable({
        bPaginate:      false,
        ajax:           '<?= site_url('dashboard/list/') ?>',
        scrollY:        250,
        deferRender:    true,
        scroller:       true,
        searching:      true,
        info:           false,
    });
    $(".dataTables_filter").addClass("d-none");

    var table = $('#csiswa').DataTable();
    
    $('#search').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );
</script>
<?php endif; ?>