<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>登录</title>
  <link href="css/login.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
  function display_alert(){
    alert("alert!")
  }
  sessionStorage.user = 1;
  </script>
</head>
<body>

  <div class="login">
    <div class="login-logo">
      <img src="../img/icons/logo.jpg" class="logo">
    </div>
    <h3 class="login-title">登录</h3>
    <div class="login-text">
      <form action="./php/welcome.php" method="post">
        <p>用户名：</p>
        <input type="text" name="username" class="login-user">
        <p>密码：</p>
        <input type="password" name="password" class="login-user">
        <input type="submit" value="登录" class="login-submit">
    </div>
    <h5 class="login-register">没有账号？<a href="register.php">立刻注册!</a></h5>
  </div>

  <footer>
    <div class="copyright">
      <p><a class="footer-a">Copyright © 2019-2021 SOFT130002 Project2. All Rights Reserved. 备案号：16307130079@fudan.edu.cn</a></p>
    </div>
  </footer>

</body>
</html>
