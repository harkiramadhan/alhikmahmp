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
        $('#inputTextBiaya').attr('name', 'biaya_anak');
        $('#inputTextBiaya').prop('required', true);
        $('#inputBiaya').show();
    }else{
        $('#biaya').prop('required', true);
        $('#formBiaya').show();
        $('#inputTextBiaya').attr('name', '');
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

    $('#internet_dimana').hide();
    $('input:radio[name="internet"]').change(function(){
        if ($(this).is(':checked') && $(this).val() == 'Ya') {
            $('#internet_anak').prop('required', true);
            $('#internet_dimana').show();
        }else{
            $('#internet_anak').prop('required', false);
            $('#internet_dimana').hide();
        }
    });

    $('#form_kakak').hide();
    $('input:radio[name="kakak_sdit"]').change(function(){
        if ($(this).is(':checked') && $(this).val() == 'Ya') {
            $('#nama_kakak').prop('required', true);
            $('#form_kakak').show();
        }else{
            $('#nama_kakak').prop('required', false);
            $('#form_kakak').hide();
        }
    });
});

$(document).ready(function(){
    var kakak = $("input[type=radio][name='kakak_sdit']:checked").val();
    if (kakak == 'Ya') {
        $('#nama_kakak').prop('required', true);
        $('#form_kakak').show();
    }else{
        $('#nama_kakak').prop('required', false);
        $('#form_kakak').hide();
    }

    var internet = $("input[type=radio][name='internet']:checked").val();
    if (internet == 'Ya') {
        $('#internet_anak').prop('required', true);
        $('#internet_dimana').show();
    }else{
        $('#internet_anak').prop('required', false);
        $('#internet_dimana').hide();
    }

    var biaya = $( "#biaya option:selected" ).text();
    if(biaya === "Lainnya"){
        $('#biaya').prop('required', false);
        $('#formBiaya').hide();
        $('#inputTextBiaya').attr('name', 'biaya_anak');
        $('#inputTextBiaya').prop('required', true);
        $('#inputBiaya').show();
    }else{
        $('#biaya').prop('required', true);
        $('#formBiaya').show();
        $('#inputTextBiaya').attr('name', '');
        $('#inputTextBiaya').prop('required', false);
        $('#inputBiaya').hide();
    }
});
