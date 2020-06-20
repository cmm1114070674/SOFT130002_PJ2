<?php
$username = $password = $confirm = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
}

session_start();

$servername = "localhost";
$u = "root";
$p = "123456";
$dbname = "webpj2";

$conn = new mysqli($servername, $u, $p, $dbname);

$sql = "SELECT UserName, Pass FROM traveluser";
$result = $conn->query($sql);

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql1 = "INSERT INTO traveluser (UserName, Pass) VALUES ('$username', '$password_hash')";

$isRight = 0;
$isREG = 0;

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        if($row["UserName"] == $username)
            $isREG = 1;
        if($row["UserName"] != $username && $password == $confirm)
            $isRight = 1;
        elseif($row["UserName"] != $username && $password != $confirm)
            $isRight = 2;
    }
}

if($isREG == 1){
    echo "<script>alert('该用户已存在');location.href=\"../register.php\";</script>";
}
else{
    if($isRight == 1){
        mysqli_query($conn, $sql1);
        header("Location: ../login.php");
    }
    elseif ($isRight == 2){
        echo "<script>alert('两次密码不同');location.href=\"../register.php\";</script>";
    }
}



