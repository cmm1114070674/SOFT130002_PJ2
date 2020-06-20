<?php
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

session_start();

$servername = "localhost";
$u = "root";
$p = "123456";
$dbname = "webpj2";

$conn = new mysqli($servername, $u, $p, $dbname);

$sql = "SELECT UserName, Pass FROM traveluser";
$result = $conn->query($sql);

$isRight = 0;

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
//        $p = password_hash($password, PASSWORD_DEFAULT);
        if($row["UserName"] == $username && password_verify($password, $row["Pass"]))
            $isRight = 1;
    }
}

if($isRight == 1){
    $_SESSION['username'] = $username;
    require_once('detailsget.php');
    $uid = getUID($username);
    $_SESSION['UID'] = $uid;
    if($username != "")
        $_SESSION['user'] = 1;

    header("Location: ../../index.php");
}
else {
    echo "<script>alert('账号或密码错误');location.href=\"../login.php\";</script>";
}


