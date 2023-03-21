<?php

$country = $_GET["country"];
switch($_GET["country"])
{
    case 1:
    echo json_encode(array("1" => "Yerevan", "2" => "Hrazdan", "3" => "Gyumri", "4" => "Berd", "5" => "Exegnadzor"));
    break;
    case 2:
    echo json_encode(array("6" => "Moskva", "7" => "Leningrad", "8" => "Saratov"));
    break;
    case 3:
    echo json_encode(array("9" => "Washington", "10" => "San-Francisco", "11" => "Las Vegas", "12" => "Los Angeles"));
    break;
    case 4:
    echo json_encode(array("13" => "London", "14" => "Liverpool", "15" => "Manchester"));
    break;
    case 5:
    echo json_encode(array("16" => "Kiev", "17" => "Doneck"));
    break;
    case 6:
    echo json_encode(array("18" => "Lion"));
    break;
    case 7:
    echo json_encode(array("19" => "Madrid", "20" => "Valencia", "21" => "Malaga", "24" => "Bilbao"));
    break;
}

?>