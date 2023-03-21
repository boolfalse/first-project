<?php


if (isset($_POST['submit']))
{

    session_start();
    $login = trim(htmlspecialchars(stripcslashes($_POST['login'])));
    $password = trim(htmlspecialchars(stripcslashes($_POST['password'])));
    $_SESSION['loginuser'] = $login;
    $_SESSION['passworduser'] = $password;

    if ($login == "" || $password == ""){
        echo "<p>Inputed no correctly login or password!</p><br />";
        echo "<a href='index.php'>Back</a>";
        exit;
    }



    $_SESSION['id'] = userornot($login, $password);

    if($_SESSION['id'] != false){
        //echo $_SESSION['id'];
        header("Location: userpage.php");
        exit;
    }
    else{
        unset($_SESSION['id']);
        echo "<p>Your login or password is not true!</p>";
        echo "<a href='index.php'>Back</a>";
        exit;
    }

}

function connect_db(){
    $mysqli = new mysqli("localhost", "root", "", "mybase");
    $mysqli -> query("SET NAMES 'utf8' "); // kareli er chgrel
    return $mysqli;
}

// poxel pntrman zapros@ WHERE-ov
function userornot($l, $p){
    $mysqli = connect_db();
    $result = $mysqli->query("SELECT * FROM `users`");
    while($row = $result->fetch_assoc()){
        if($l==$row['login'] && md5($p)==$row['password']){
            return $row['id'];
            //return true;
        }
    }
    return false;
}


?>