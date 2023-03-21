$(document).ready(function() {


    $('#loginuser').keyup(function(){
        var login = $('#loginuser').val();
        if(login.length > 0) {
            Disabled();
        }
    });

    $('#passworduser').keyup(function(){
        var password = $('#passworduser').val();
        if(password.length > 0) {
            Disabled();
        }
    });
});


function Disabled(){
    // ete bolor@ zbaxvats en
    if ($('#loginuser').val()==="" || $('#passworduser').val()==="")
    {
        $('#submituser').prop('disabled',true);
    }
    else {
        $('#submituser').prop('disabled',false);
    }
}