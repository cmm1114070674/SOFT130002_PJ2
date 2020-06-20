<?php
session_start();
$UID = $_SESSION['UID'];
$ImageID = $_GET['imgID'];
$Title = $_GET['title-text'];
$Description = $_GET['description-text'];
$CountryCodeISO = $_GET['country'];
$PATH = $_GET['img-url'];

require_once('mysql.php');
$conn = getConnected();

mysqli_query($conn, "UPDATE travelimage SET PATH='$PATH', Title='$Title', Description='$Description', CountryCodeISO='$CountryCodeISO', UID='$UID', PATH='$PATH' WHERE ImageID='$ImageID'");

//mysqli_query($conn, "UPDATE travelimage SET Title='$Title' AND Description='$Description' AND CountryCodeISO='$CountryCodeISO' AND UID='$UID' AND PATH='$PATH' WHERE ImageID='$ImageID'");

header("Location: ../details.php?imageID=$ImageID&UID=$UID");