<?php

require_once('favorcount.php');
$ia = getImageArray();

$result = array();

if($_GET['country'] != "0"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["CountryCodeISO"] == $_GET['country']) {
                array_push($result, $row);
            }
        }
    }
}
else{
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            array_push($result, $row);
        }
    }
}

session_start();
$_SESSION['search-rs'] = $result;

header("Location: ../browse.php");


