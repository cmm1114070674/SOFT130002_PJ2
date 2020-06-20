<?php
session_start();
$UID = $_SESSION['UID'];
$Title = $_GET['title-text'];
$Description = $_GET['description-text'];
$CountryCodeISO = $_GET['country'];
$PATH = $_GET['img-url'];

require_once('mysql.php');
$conn = getConnected();

//mysqli_query($conn,"INSERT INTO travelimage (Title) VALUES ($Title)");
mysqli_query($conn,"INSERT INTO travelimage (Title, Description, CountryCodeISO, UID, PATH) VALUES ('$Title', '$Description', '$CountryCodeISO', '$UID', '$PATH')");

$result = mysqli_query($conn, "SELECT * FROM travelimage WHERE Title='$Title' AND Description='$Description' AND CountryCodeISO='$CountryCodeISO' AND UID='$UID' AND PATH='$PATH'");

$ImageID = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["UID"] == $UID) {
            $ImageID = $row["ImageID"];
        }
    }
}

header("Location: ../details.php?imageID=$ImageID&UID=$UID");
