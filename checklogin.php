<?php

$currentLogin = $_POST['name'];
if (checkLogin($currentLogin)){
    echo "Free username!"; // true - azat e
}
else{
    echo "Have a user!"; // false - zbaxvats e
}

function connect_db(){
    $mysqli = new mysqli("localhost", "root", "", "mybase");
    $mysqli -> query("SET NAMES 'utf8' "); // kareli er chgrel
    return $mysqli;
}

function checkLogin($current){
    $mysqli = connect_db();
    //var_dump($current); exit;
    $result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$current'");
    $res = $result->fetch_assoc(); // NULL || array();
    if($res) { // true - Null or Defined
        return false;
    } // chka
    else {
        return true;
    }
}




?>