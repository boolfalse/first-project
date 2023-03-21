function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function isValidPassword(pass){
    var pattern = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/);
    return pattern.test(pass);
}
function isValidLogin(login){
    var pattern = new RegExp(/^[a-z0-9_-]{3,16}$/);
    return pattern.test(login);
}
function isValidPhone(phone){
    var pattern = new RegExp(/^[0-9]{6,13}$/);
    return pattern.test(phone);
}
function DisabledReset(){
    // ete bolor@ datark en
    // == sarqel === apahovutyan hamar
   if ($('#login').val()=="" && $('#password').val()=="" && $('#fn').val()=="" && $('#ln').val()=="" && $('#email').val()=="" && $('#city').val()=="" && $('#phone').val()=="" && $('#datepicker').val()=="" && $('#country :selected').val()=="Country" )
    {
        $('#reset').prop('disabled',true);
    }
    else{
        $('#reset').prop('disabled',false);
    }
    // ete bolor@ zbaxvats en
    // != sarqel !== apahovutyan hamar
    if ($('#login').val()!="" && $('#password').val()!="" && $('#fn').val()!="" && $('#ln').val()!="" && $('#email').val()!="" && $('#city').val()!="" && $('#phone').val()!=""  && $('#datepicker').val()!="" && $('#country :selected').val()!="Country")
    {
        $('#submit').prop('disabled',false);
    }
    else {
        $('#submit').prop('disabled',true);
    }
}



$(document).ready(function() {

    $('#fn, #ln').keyup(function(){
        DisabledReset();
    });
    $('#datepicker').change(function () {
        DisabledReset();
    });
//////////////////////////////////////////JSON
    $('#country').change(function(){
        DisabledReset();
        $("select[name='city']").empty();
        $.get("check.php", {country: $("select[name='country']").val()}, function(data){
                    data = JSON.parse(data);
                    for(var ident in data){
                        $("select[name='city']").append($("<option value='"+ident+"'>"+data[ident]+"</option>"));
                    }
        });
    });
    // $('#city').change(function(){
    //     DisabledReset();
    // }

    $('#phone').keyup(function(){
        DisabledReset();
        var phone = $('#phone').val();
        if(phone.length!=0)
        {
            if(isValidPhone(phone))
            {
                $('#nphone').css({
                    "display": "none"
                });
            }
            else {
                $('#nphone').css({
                    "display": "block"
                });
            }
        }
        else {
            $('#nphone').css({
                "display": "none"
            });
        }
    });

    $('#email').keyup(function(){
        DisabledReset();
        var email = $('#email').val();
        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $('#nemail').css({
                    "display": "none"
                });
            }
            else {
                $('#nemail').css({
                    "display": "block"
                });
            }
        }
        else {
            $('#nemail').css({
                "display": "none"
            });
        }
    });

    $('#password').keyup(function(){
        DisabledReset();
        var password = $('#password').val();
        if(password != 0)
        {
            if(isValidPassword(password))
            {
                $('#npassword').css({
                    "display": "none"
                });
            }
            else {
                $('#npassword').css({
                    "display": "block"
                });
            }
        }
        else {
            $('#npassword').css({
                "display": "none"
            });
        }
    });

//////////////////////////////////////AJAX
    $('#login').keyup(function(){
        DisabledReset();
        var login = $('#login').val();
        if(login !== "")// != 0
        {
            if(isValidLogin(login))
            {
                $("#nlogin").empty();
                $('#nlogin').css({
                    "display": "none"
                });
                $.ajax({
                    url: "checklogin.php",
                    type: "POST",
                    data: ({ name: login }),
                    dataType: "html",
                    success: function(data){
                        $('#nlogin').text(data).removeClass('notice').addClass('show');
                    }
                });
            }
            else {
                $("#nlogin").text("Incorrect!").css({
                    "color": "red",
                    "display": "block"
                });
            }
        }
        else {
            $('#nlogin').css({
                "display": "none"
            });
        }
    });

    $( "#datepicker" ).datepicker();


});

// function funcSuccess (data) {
//     $('#login').text(data).removeClass('notice').addClass('show');
// }
