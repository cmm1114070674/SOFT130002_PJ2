<?php
$title = $_GET['title-text'];

require_once('favorcount.php');
$ia = getImageArray();

$result = array();

if ($ia->num_rows > 0) {
    while($row = $ia->fetch_assoc()) {
        if(strstr($row["Title"], $title)) {
            array_push($result, $row);
        }
    }
}

session_start();
$_SESSION['search-rs'] = $result;

header("Location: ../browse.php");


