<?php

function get_header(){
    session_start();
    echo  '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

            <!--headerfooter-->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <!--
            <script src="https://maps.googleapis.com/maps/api/js?key=&signed_in=true&libraries=places&callback=initAutocomplete"
                async defer></script>
            -->

            <!--datepicker-->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script type="text/javascript" src="jquery-1.12.3.min.js" ></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

            <link rel="stylesheet" href="notice.css" >
            <link rel="stylesheet" href="pagecontent.css" >

            <script type="text/javascript" src="validation.js" ></script>
            <script type="text/javascript" src="validlogin.js" ></script>
            <script type="text/javascript" src="logreg.js" ></script>
            <script type="text/javascript" src="mapsapi.js" ></script>
            <title>My Social</title>
        </head>
        <body>

        <div class="jumbotron">
            <h1 class="horizontal-center">Header</h1>
            <p class="horizontal-center">You have to register in this site now!</p>
        </div>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <a href="index.php">
                <img height="60" class="homelogo" src="http://www.webseoanalytics.com/images/clients/clientlogos/your-logo-here.png">
            </a>

            <div class="navbar-inner">
                <div class="contain">
                    <ul class="nav">
                        <li id="dropdown-right" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOG</a>
                            <ul class="dropdown-menu">
                            ';
    if(isset($_SESSION['id'])){
        $hashid = md5($_SESSION['id']);
        $start = genRandStr(5);
                                echo '<li><a href="index.php?logout='.$start.$hashid.'">LogOut</a></li>';
    }
    else {                      echo '<li><a href="#">LogIn</a></li>';  }
    echo '
                            </ul>
                        </li>
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Photos</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Arts</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Programming</a></li>
                                    <li><a href="#opening">Politics</a></li>
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sites</a>
                            <ul class="dropdown-menu">
                                <li><a href="https://www.youtube.com">YouTube</a></li>
                                <li><a href="https://www.google.com">Google</a></li>
                                <li><a href="https://www.w3schools.com">W3schools</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> ';
    if(isset($_SESSION['id']) &&  $_SERVER['SCRIPT_NAME']=="/social/index.php"){
                            echo '<a href="http://localhost/social/userpage.php" class="dropdown-toggle" data-toggle="dropdown">My page</a>';
                        }
    else{                   echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">About us</a>'; }
    echo '
                        </li>
                    </ul>
                </div>
            </div>
        </div>





    ';
}
function get_footer(){
    echo '
        <!--FOOTER-->
        <div class="footerdown"></div>
        <div class="jumbotron">
            <h1 class="horizontal-center">Footer</h1>
        </div>

        </body>
        </html>
        ';
}
function logoutuser($out){
    $hash = substr($out, 5);
    if ($hash == md5($_SESSION['id']))
        return true;
    else
        return false;
}
function genRandStr($length)
{
    return substr(md5(rand()), 0, $length);
}

?>