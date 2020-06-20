<?php
session_start();

$_SESSION['renew'] = 1;

header("Location: /PJ2/index.php");

//function getImageArrayRand(){
//    require_once('favorcount.php');
//    $imageArray = getImageArray();
//    $imageArray = array_rand($imageArray, 6);
//    return $imageArray;
//}

