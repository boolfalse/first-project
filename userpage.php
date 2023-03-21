<?php
require "functions.php";
get_header();
///////////////////////////////////////////////////////////////////////////////////////////////////
//echo $_SERVER['SCRIPT_NAME'];/////////////////////////////////////////////////////////////////


//var_dump($_SESSION['id']); exit;

    if(!isset($_SESSION['id'])){
        echo "<h2>User is log out!</h2>";
        echo "<p>Don't try this, becouse you can't to be in your profile without order!</p>";
        get_footer();
        exit;
    }
    if (!isset($_SESSION['isUserLogin'])) {
        $_SESSION['isUserLogin'] = true;
        $userid = $_SESSION['id'];
        
        $userlogin = $_SESSION['loginuser'];
        $userpassword = $_SESSION['passworduser'];
        $_SESSION['userfname'] = get_userfname($userid);
        $_SESSION['userlname'] = get_userlname($userid);
        $_SESSION['useremail'] = get_useremail($userid);
        $_SESSION['usercity'] = get_usercity($userid);
        $_SESSION['usercountry'] = get_usercountry($userid);
        $_SESSION['userphone'] = get_userphone($userid);
        $_SESSION['userbirthday'] = get_userbirthday($userid);
        $_SESSION['userregdate'] = get_userregdate($userid);
    }
if ($_SESSION['isUserLogin'])
{
    echo '
        <div id="page" class="container">
            <h2 class="horizontal-center">Some Text here...</h2>
            <p class="horizontal-center">You are my sunshine, my only sunshine. You make me happy when sky are grey.</p>
            <p class="horizontal-center">You never know dear how much i love you. Please don\'t say my dear don\'t cry!</p>
            <h2 class="horizontal-center">YOUR LOGGED IN !!!</h2>
            <br />
            <b>'.$_SESSION["userfname"].' '.$_SESSION["userlname"].'</b>
            <p>Your E-mail: '.$_SESSION["useremail"].'</p>
            <p>Your city: '.$_SESSION["usercity"].'</p>
            <p>Your country: '.$_SESSION["usercountry"].'</p>
            <p>Your phone number: '.$_SESSION["userphone"].'</p>
            <p>Your birthday: '.$_SESSION["userbirthday"].'</p>
            <p>Your registration date: '.$_SESSION["userregdate"].'</p>
        </div>
    ';
}

function connect_db(){
    $mysqli = new mysqli("localhost", "root", "", "mybase");
    $mysqli -> query("SET NAMES 'utf8' "); // kareli er chgrel
    return $mysqli;
}
function get_userfname($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`fn` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['fn'];
            //return true;
        }
    }
    return false;
}
function get_userlname($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`ln` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['ln'];
            //return true;
        }
    }
    return false;
}
function get_useremail($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`email` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['email'];
            //return true;
        }
    }
    return false;
}
function get_usercity($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`city` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['city'];
            //return true;
        }
    }
    return false;
}
function get_usercountry($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`country` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['country'];
            //return true;
        }
    }
    return false;
}
function get_userphone($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`phone` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['phone'];
            //return true;
        }
    }
    return false;
}
function get_userbirthday($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`birthday` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['birthday'];
            //return true;
        }
    }
    return false;
}
function get_userregdate($user_id){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT `user_id`,`regdate` FROM `user_details`");
    while($row = $result->fetch_assoc()){
        if($user_id == $row['user_id']){
            return $row['regdate'];
            //return true;
        }
    }
    return false;
}

get_footer();
?>