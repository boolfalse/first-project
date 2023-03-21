<?php
if (isset($_POST['reset']))
{
    header("Location: index.php");
    exit;
}
if (isset($_POST['submit']))
{
    $error_login = "";
    $error_password = "";
    $error_fn = "";
    $error_ln = "";
    $error_email = "";
    $error_address = "";
    $error_streetname = "";
    $error_streetnumber = "";
    $error_state = "";
    $error_zipcode = "";
    $error_city = "";
    $error_country = "";
    $error_phone = "";
    $error_birthday = "";
    $error = false;

    $login = trim(htmlspecialchars(stripcslashes($_POST['login'])));
    $password = trim(htmlspecialchars(stripcslashes($_POST['password'])));
    $fn = trim(htmlspecialchars(stripcslashes($_POST['fn'])));
    $ln = trim(htmlspecialchars(stripcslashes($_POST['ln'])));
    $email = trim(htmlspecialchars(stripcslashes($_POST['email'])));
    $address = trim(htmlspecialchars(stripcslashes($_POST['address'])));
    $streetname = trim(htmlspecialchars(stripcslashes($_POST['streetname'])));
    $streetnumber = trim(htmlspecialchars(stripcslashes($_POST['streetnumber'])));
    $state = trim(htmlspecialchars(stripcslashes($_POST['state'])));
    $zipcode = trim(htmlspecialchars(stripcslashes($_POST['zipcode'])));
    $city = trim(htmlspecialchars(stripcslashes($_POST['city'])));
    $country = trim(htmlspecialchars(stripcslashes($_POST['country'])));
    $phone = trim(htmlspecialchars(stripcslashes($_POST['phone'])));
    $birthday = trim(htmlspecialchars(stripcslashes($_POST['birthday'])));

    // if-eri mej kavelacnenq naev hamapatasxan RegExp-ner@
    if ($login == "" || !preg_match("/^[a-z0-9_-]{3,16}$/", $login)){
        $error_login = "Mutqagreq korrekt Email !!!";
        $error = true;
    }
    if ($password == "" || !preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/", $password)){
        $error_password = "Mutqagreq korrekt password !!!";
        $error = true;
    }
    if ($fn == ""){
        $error_fn = "Mutqagreq korrekt anun !!!";
        $error = true;
    }
    if ($ln == ""){
        $error_ln = "Mutqagreq korrekt azganun !!!";
        $error = true;
    }
    if ($email == "" || !preg_match("/^((\"[\w-\s]+\")|([\w-]+(?:\.[\w-]+)*)|(\"[\w-\s]+\")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i", $email)){
        $error_email = "Mutqagreq korrekt mail !!!";
        $error = true;
    }
    if ($city == ""){
        $error_city = "Mutqagreq korrekt city !!!";
        $error = true;
    }
    if ($phone == "" || !preg_match("/^[0-9]{6,13}$/", $phone)){
        $error_phone = "Mutqagreq korrekt hamar !!!";
        $error = true;
    }
    if ($country == ""){
        $error_country = "Mutqagreq korrekt Country !!!";
        $error = true;
    }
    if ($birthday == ""){
        $error_birthday = "Mutqagreq korrekt Birthday !!!";
        $error = true;
    }


    if (!$error){
        createUser($login, $password, $fn, $ln, $email, $city, $phone, $country, $birthday);
        header("Location: index.php");
        //echo "<hr />"."ADDED USER... Login: ".$login." Password: ".$password;
        exit;
    }
    else{
        echo "<p>Sxal ka => User chi avelacvel DB !!!</p><br />";
        exit;
    }
    
}

function connect_db(){
    $mysqli = new mysqli("localhost", "root", "", "mybase");
    $mysqli -> query("SET NAMES 'utf8' "); // kareli er chgrel
    return $mysqli;
}
function createUser( $l, $p, $fn, $ln, $e, $a, $sname, $snum, $s, $z, $c, $coun, $ph, $b){
    $mysqli = connect_db();
    $hash = md5($p);
    //$rd = time();
    $mysqli -> query("INSERT INTO `users` ( `login`, `password`) VALUES ('$l', '$hash' )");

    //var_dump(gettype($insert_id));exit;
    //$ans =
    $mysqli -> query("INSERT INTO `user_details` (`user_id`, `fn`, `ln`, `email`, `address`, `streetname`, `streetnumber`, `state`, `zipcode`, `city`, `country`, `phone`, `birthday`)
                                     VALUES ('$mysqli->insert_id', '$fn', '$ln', '$e', '$a', '$sname', '$snum', '$s', '$z', '$c', '$coun', '$ph', '$b') ");
    //var_dump($ans);exit;
    //return $ans;

}

?>