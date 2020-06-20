<?php

$UID = $_GET['UID'];
$ImageID = $_GET['imageID'];
require_once('mysql.php');
$conn = getConnected();
mysqli_query($conn,"DELETE FROM travelimage WHERE UID='$UID' AND ImageID='$ImageID'");
header("Location: ../myphoto.php?UID=$UID");

