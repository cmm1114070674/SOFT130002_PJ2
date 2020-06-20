<?php
$topic = $_GET['topic'];

require_once('favorcount.php');
$ia = getImageArray();

$result = array();

if($topic == "Scenery"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            array_push($result, $row);
        }
    }
}
if($topic == "Canada" || $topic == "Ottawa"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["CountryCodeISO"] == "CA") {
                array_push($result, $row);
            }
        }
    }
}
if($topic == "Greece" || $topic == "Athens"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["CountryCodeISO"] == "GR") {
                array_push($result, $row);
            }
        }
    }
}
if($topic == "Italy"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["CountryCodeISO"] == "IT") {
                array_push($result, $row);
            }
        }
    }
}
if($topic == "United States"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["CountryCodeISO"] == "US") {
                array_push($result, $row);
            }
        }
    }
}

session_start();
$_SESSION['search-rs'] = $result;

header("Location: ../browse.php");


