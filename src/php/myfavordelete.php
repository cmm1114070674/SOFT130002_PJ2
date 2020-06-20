<?php

$UID = $_GET['UID'];
$ImageID = $_GET['imageID'];
require_once('mysql.php');
$conn = getConnected();
mysqli_query($conn,"DELETE FROM travelimagefavor WHERE UID='$UID' AND ImageID='$ImageID'");
header("Location: ../favor.php?UID=$UID");

