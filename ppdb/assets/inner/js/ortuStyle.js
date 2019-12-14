$(document).ready(function(){
    $('#formWafatAyah').hide();
    $('#statusayah').change(function(){
        if(this.value == "wafat"){
            $('#inputWafatAyah').prop('required', true);
            $('#formWafatAyah').show();
        }else{
            $('#inputWafatAyah').prop('required', false);
            $('#formWafatAyah').hide();
        }
    });

    var statusAyah = $( "#statusayah option:selected" ).text();
    if(statusAyah === "Wafat"){
        $('#inputWafatAyah').prop('required', true);
        $('#formWafatAyah').show();
    }
});