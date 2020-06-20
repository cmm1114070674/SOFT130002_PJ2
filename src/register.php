<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>注册</title>
  <link href="css/register.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
  function display_alert(){
    alert("alert!")
  }
  </script>
</head>
<body>
  <div class="login">
    <div class="login-logo">
      <img src="../img/icons/logo.jpg" class="logo">
    </div>
    <h3 class="login-title">注册</h3>
    <div class="login-text">
      <form action="./php/reg.php" method="post">
        <p>用户名：</p>
        <input type="text" name="username" class="login-user" pattern="^[A-Za-z0-9_]+$">
        <p>邮箱：</p>
        <input type="email" name="email" class="login-user">
        <p>密码：</p>
        <input type="password" name="password" class="login-user" pattern="^[A-Za-z0-9]{6,16}$">
        <p>确认密码：</p>
        <input type="password" name="confirm" class="login-user" pattern="^[A-Za-z0-9]{6,16}$">
        <input type="submit" value="注册" class="login-submit">
    </div>
    <h5 class="login-register">已有账号？<a href="login.php">立刻登录!</a></h5>
  </div>

  <footer>
    <div class="copyright">
      <p><a class="footer-a">Copyright © 2019-2021 SOFT130002 Project2. All Rights Reserved. 备案号：16307130079@fudan.edu.cn</a></p>
    </div>
  </footer>

</body>
</html>
