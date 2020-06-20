<?php
$radio = $_GET['search-radio'];
$title = $_GET['title-text'];
$description = $_GET['description-text'];

require_once('favorcount.php');
$ia = getImageArray();

$result = array();
if($radio == "bytitle"){
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if(strstr($row["Title"], $title)) {
                array_push($result, $row);
            }
        }
    }
}
else{
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if(strstr($row["Description"], $description)) {
                array_push($result, $row);
            }
        }
    }
}

session_start();
$_SESSION['search-rs'] = $result;

header("Location: ../search.php");


