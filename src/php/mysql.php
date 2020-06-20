<?php

function getConnected(){
    $servername = "localhost";
    $u = "root";
    $p = "123456";
    $dbname = "webpj2";

    $conn = new mysqli($servername, $u, $p, $dbname);

    return $conn;
}

function getGeocontinents(){
    $conn = getConnected();
    $sql = "SELECT ContinentCode, ContinentName, GeoNameId FROM geocontinents";
    $result = $conn->query($sql);
    return $result;
}

function getGeocountries(){
    $conn = getConnected();
    $sql = "SELECT ISO, CountryName, Continent FROM geocountries";
    $result = $conn->query($sql);
    return $result;
}

function getGeocities(){
    $conn = getConnected();
    $sql = "SELECT AsciiName, CountryCodeISO, Continent FROM geocities";
    $result = $conn->query($sql);
    return $result;
}

function getTravelUser(){
    $conn = getConnected();
    $sql = "SELECT UID, UserName, Pass FROM traveluser";
    $result = $conn->query($sql);
    return $result;
}

function getTravelImageFavor(){
    $conn = getConnected();
    $sql = "SELECT FavorID, UID, ImageID FROM travelimagefavor";
    $result = $conn->query($sql);
    return $result;
}
