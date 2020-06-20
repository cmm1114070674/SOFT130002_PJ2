<?php

function getFavor(){
    $servername = "localhost";
    $u = "root";
    $p = "123456";
    $dbname = "webpj2";

    $conn = new mysqli($servername, $u, $p, $dbname);

    $sql = "SELECT FavorID, UID, ImageID FROM travelimagefavor";
    $result = $conn->query($sql);

    $a = array();

    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            array_push($a, $row["ImageID"]);
        }
    }

    $ac = array_count_values($a);

    arsort($ac);

    if(count($ac) > 6)
        $ac = array_slice($ac,0,6);

    return $ac;
}

function getImageArray(){
    $servername = "localhost";
    $u = "root";
    $p = "123456";
    $dbname = "webpj2";

    $conn = new mysqli($servername, $u, $p, $dbname);

    $sql = "SELECT ImageID, Title, Description, PATH, CityCode, CountryCodeISO, UID FROM travelimage";
    $result = $conn->query($sql);

    return $result;
}

function getImageArrayRand(){
    $imageArray = getImageArray();
    $rs = array();
    if ($imageArray->num_rows > 0) {
        while ($row = $imageArray->fetch_assoc()) {
            array_push($rs, $row["ImageID"]);
        }
    }
    $k = rand(7, 70);
    $rs = array_slice($rs, $k, 6, true);
    return $rs;
}
