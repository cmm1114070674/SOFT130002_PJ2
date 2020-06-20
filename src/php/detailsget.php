<?php

function getUser($imageID){
    require_once('favorcount.php');
    $ia = getImageArray();
    $UID = "";
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["ImageID"] == $imageID) {
                $UID = $row["UID"];
            }
        }
    }
    require_once('mysql.php');
    $tu = getTravelUser();
    $UserName = "";
    if ($tu->num_rows > 0) {
        while($row = $tu->fetch_assoc()) {
            if($row["UID"] == $UID) {
                $UserName = $row["UserName"];
            }
        }
    }
    return $UserName;
}

function getFavorCount($imageID){
    require_once('mysql.php');
    $tif = getTravelImageFavor();
    $k = 0;
    if ($tif->num_rows > 0) {
        while($row = $tif->fetch_assoc()) {
            if($row["ImageID"] == $imageID) {
                $k++;
            }
        }
    }
    return $k;
}

function getImageCountry($imageID){
    require_once('favorcount.php');
    $ia = getImageArray();
    $CountryCodeISO = "";
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["ImageID"] == $imageID) {
                $CountryCodeISO = $row["CountryCodeISO"];
            }
        }
    }
    require_once('mysql.php');
    $gc = getGeocountries();
    $CountryName = "";
    if ($gc->num_rows > 0) {
        while($row = $gc->fetch_assoc()) {
            if($row["ISO"] == $CountryCodeISO) {
                $CountryName = $row["CountryName"];
            }
        }
    }
    return $CountryName;
}

function getImageCity($imageID){
    require_once('favorcount.php');
    $ia = getImageArray();
    $CityCode = "";
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["ImageID"] == $imageID) {
                $CityCode = $row["CityCode"];
            }
        }
    }
    require_once('mysql.php');
    $gc = getGeocities();
    $AsciiName = "";
    if($gc != ""){
        if ($gc->num_rows > 0) {
            while($row = $gc->fetch_assoc()) {
                if($row["GeoNameID"] == $CityCode) {
                    $AsciiName = $row["AsciiName"];
                }
            }
        }
    }
    return $AsciiName;
}

function getUID($UserName){
    require_once('mysql.php');
    $tu = getTravelUser();
    $UID = "";
    if ($tu->num_rows > 0) {
        while($row = $tu->fetch_assoc()) {
            if($row["UserName"] == $UserName) {
                $UID = $row["UID"];
            }
        }
    }
    return $UID;
}

function getMyPhoto($UID){
    require_once('favorcount.php');
    $ia = getImageArray();
    $imageIDs = array();
    if ($ia->num_rows > 0) {
        while($row = $ia->fetch_assoc()) {
            if($row["UID"] == $UID) {
                array_push($imageIDs, $row["ImageID"]);
            }
        }
    }
    return $imageIDs;
}

function getMyFavor($UID){
    require_once('mysql.php');
    $tif = getTravelImageFavor();
    $imageIDs = array();
    if ($tif->num_rows > 0) {
        while($row = $tif->fetch_assoc()) {
            if($row["UID"] == $UID) {
                array_push($imageIDs, $row["ImageID"]);
            }
        }
    }
    return $imageIDs;
}

function getImageInfo($imageID){
    require_once('favorcount.php');
    $ia = getImageArray();
    $CountryCodeISO = "";
    if ($ia->num_rows > 0) {
        while ($row = $ia->fetch_assoc()) {
            if ($row["ImageID"] == $imageID) {
                return $row;
            }
        }
    }
    return 0;
}
