$(document).ready(function(){
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

    $('#inputBiaya').hide();
    $('#biaya').on('change', function(){
    if(this.value === "lain"){
        $('#biaya').prop('required', false);
        $('#formBiaya').hide();
        $('#inputTextBiaya').prop('required', true);
        $('#inputBiaya').show();
    }else{
        $('#biaya').prop('required', true);
        $('#biaya').prop('selectedIndex',0);
        $('#formBiaya').show();
        $('#inputTextBiaya').prop('required', false);
        $('#inputBiaya').hide();
    }
    });

    $('#batalBiaya').on('click', function(){
    $('#biaya').prop('required', true);
    $('#biaya').prop('selectedIndex',0);
    $('#formBiaya').show();
    $('#inputTextBiaya').prop('required', false);
    $('#inputBiaya').hide();
    });

    $('#formKondisiFisikText').hide();
    $('#selectFisik').on('change', function(){
    if(this.value === "Berkelainan"){
        $('#selectFisik').prop('required', false);
        $('#formKondisiFisikSelect').hide();
        $('#inputFisik').prop('required', true);
        $('#formKondisiFisikText').show();
    }else{
        $('#selectFisik').prop('required', true);
        $('#selectFisik').prop('selectedIndex',0);
        $('#formKondisiFisikSelect').show();
        $('#inputFisik').prop('required', false);
        $('#formKondisiFisikText').hide();
    }
    });

    $('#batalFisik').on('click', function(){
    $('#selectFisik').prop('required', true);
    $('#selectFisik').prop('selectedIndex',0);
    $('#formKondisiFisikSelect').show();
    $('#inputFisik').prop('required', false);
    $('#formKondisiFisikText').hide();
    });

    $('#formKondisiMentalText').hide();
    $('#selectMental').on('change', function(){
    if(this.value === "Berkelainan"){
        $('#selectMental').prop('required', false);
        $('#formKondisiMentalSelect').hide();
        $('#inputMental').prop('required', true);
        $('#formKondisiMentalText').show();
    }else{
        $('#selectMental').prop('required', true);
        $('#selectMental').prop('selectedIndex',0);
        $('#formKondisiMentalSelect').show();
        $('#inputMental').prop('required', false);
        $('#formKondisiMentalText').hide();
    }
    });

    $('#batalMental').on('click', function(){
    $('#selectMental').prop('required', true);
    $('#selectMental').prop('selectedIndex',0);
    $('#formKondisiMentalSelect').show();
    $('#inputMental').prop('required', false);
    $('#formKondisiMentalText').hide();
    });
});