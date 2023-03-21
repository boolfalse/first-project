<?php

require "functions.php";
get_header();

$sessionlog = "";

if(isset($_SESSION['login']) && !isset($_SESSION['id'])){
    $sessionlog = $_SESSION['login'];
}
if (isset($_GET['logout']))
{
    // functions.php-um kgrenq rX32f-id stugman logout funkcian
    $get_out = $_GET['logout'];
    if(logoutuser($get_out)){
        get_footer();
        header("Location: logoutredirect.php");
        exit;
    }
    else{
        echo '<h2>You tried to logout on profile in this site without order!</h2>';
    }
}
    echo '
    <div id="page" class="container">
        <h2 class="horizontal-center">Some Text here..</h2>
        <p class="horizontal-center">You are my sunshine, my only sunshine. You make me happy when sky are grey.</p>
        <p class="horizontal-center">You never know dear how much i love you. Please don\'t say my dear don\'t cry!</p>
    </div>
    ';

if (!isset($_SESSION['id'])) {
    echo '
    <div id="container" class="container">
        <div id="loguser" class="show">

            <form class="form-horizontal" action="logaction.php" method="POST">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Login form</legend>



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="login">Login</label>
                        <div class="col-md-5">
                            <input id="loginuser" name="loginuser" type="text" class="form-control input-md" value="'.$sessionlog.'">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="login">Password</label>
                        <div class="col-md-5">
                            <input id="passworduser" name="passworduser" type="password" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="submit"></label>
                        <div class="col-md-5">
                            <button id="submituser" name="submit" class="btn btn-primary" disabled="disabled">Login</button>
                            <!-- <input id="logbutton" type="button" class="btn btn-primary" value="Reg"> -->
                          
                            <!-- DROP DOWN NAVBAR -->
                            <ul id="reglikea" class="nav pull-right">
                              <li class="dropdown">
                                <div class="btn btn-primary" data-toggle="dropdown">Reg like a <b class="caret"></b></div>
                                <ul id="inreglike" class="dropdown-menu">
                                  <li><input id="logbutton" type="button" class="btn btn-primary" value="Common user"></li>
                                  <div id="betweenreg"></div>
                                  <li><input id="viplogbutton" type="button" class="btn btn-primary" value="VIP user"></li>
                                </ul>
                              </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div> <!--loguser-->
        
        <div id="reguser" class="hide">
            <form class="form-horizontal" action="regaction.php" method="POST">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Registration form</legend>
                
                <div id="leftside">
                        <div class="between"></div>
                        <div>
                            <label for="login">Login</label>
                            <div>
                                <input id="login" name="login" type="text" class="form-control input-md">
                                <span id="nlogin" class="notice">Incorrect!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="fn">First name</label>
                            <div>
                                <input id="fn" name="fn" type="text" placeholder="Vladimir" class="form-control input-md">
                                <span class="notice">Please enter first name!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="email">Email</label>
                            <div>
                                <input id="email" name="email" type="text" placeholder="vladputin@gmail.com" class="form-control input-md" >
                                <span id="nemail" class="notice">Incorrect!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="datepicker">Birthday</label>
                            <div>
                                <input type="text" id="datepicker" name="birthday" class="form-control input-md dateclass">
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="route">Street name</label>
                            <div>
                            <input id="route" name="streetname" disabled="true" class="form-control input-md"></div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="administrative_area_level_1">State</label>
                            <div>
                                <input id="administrative_area_level_1" name="state" disabled="true" class="form-control input-md">
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="country">Country</label>
                            <div>
                                <input id="country" name="country" disabled="true" class="form-control input-md">
                            </div>
                        </div>
                </div>
                
                
                <div id="rightside">
                        <div class="between"></div>
                        <div>
                            <label for="password">Password</label>
                            <div>
                                <input id="password" name="password" type="password" class="form-control input-md">
                                <span id="npassword" class="notice">Incorrect!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="ln">Last name</label>
                            <div>
                                <input id="ln" name="ln" type="text" placeholder="Putin" class="form-control input-md">
                                <span class="notice">Please enter last name!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="phone">Phone</label>
                            <div>
                                <input id="phone" name="phone" type="text" placeholder="123456" class="form-control input-md" >
                                <span id="nphone" class="notice">Incorrect!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="locationField">Address</label>
                            <div id="locationField">
                                <input id="autocomplete" name="address" placeholder="Enter your address" onFocus="geolocate()" type="text" class="form-control input-md">
                                 <span class="notice">Please enter last name!</span>
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="street_number">Street number</label>
                            <div>
                                <input id="street_number" name="streetnumber" disabled="true" class="form-control input-md">
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="locality">City</label>
                            <div>
                                <input id="locality" name="city" disabled="true" class="form-control input-md">
                            </div>
                        </div>
                        <div class="between"></div>
                        <div>
                            <label for="postal_code">Zip code</label>
                            <div>
                                <input id="postal_code" name="zipcode" disabled="true" class="form-control input-md">
                            </div>
                        </div>
                </div>
               

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="submit"></label>
                        <div class="col-md-5">
                            <button id="submit" name="submit" class="btn btn-primary" disabled="disabled">SUBMIT</button>
                            <button id="reset" name="reset" class="btn btn-primary" disabled="disabled">Reset</button>
                            <input type="button" id="regbutton" class="btn btn-primary" value="Log">
                        </div>
                    </div>


                </fieldset>
            </form>
        </div> <!--reguser-->
        
    </div> <!--container-->


    ';
}

echo '
<script src="https://maps.googleapis.com/maps/api/js?key=&signed_in=true&libraries=places&callback=initAutocomplete"
                async defer></script>
';

get_footer();

?>

