<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>主页</title>
  <link href="src/css/index.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
  function display_alert(){
    alert("Reload!")
  }
  </script>
</head>
<body>
  <header id="head">
    <nav>
      <h3><a href="index.php">
        <img src="img/icons/logo.jpg" class="logo">
        </a>
        <div class="div-left">
        <a href="index.php" class="link" style="color:#7693AD">首页</a>
        <a href="src/browse.php" class="link">浏览页</a>
        <a href="src/search.php" class="link">搜索页</a>
        </div>
      </h3>
    </nav>
    <div class="div-right">
      <h3>
        <ul id="main">
            <?php
          session_start();
          if(isset($_SESSION['user'])) {
              echo "<li>个人中心
            <ul class=\"drop\">
              <div>
                <li><a href=\"src/upload.php\">上传</a></li>
                <li><a href=\"src/myphoto.php\">我的照片</a></li>
                <li><a href=\"src/favor.php\">我的收藏</a></li>
                <li><a href=\"src/php/logout.php\">登出</a></li>";
          }
          else
              echo "<li><a href=\"src/login.php\">登入</a></li>";
                  ?>
              </div>
            </ul>
          </li>
        </ul>
      </h3>
    </div>
  </header>

  <div class="title-photo-1">
    <img src="img/travel-images/medium/5855735700.jpg" class="title-photo"></img>
  </div>

  <div class="test-area">
      <?php
        require_once('src/php/favorcount.php');
        $ac = getFavor();
        require_once('src/php/favorcount.php');
        $rs = getImageArray();
        if(isset($_SESSION['renew'])){
            require_once('src/php/favorcount.php');
            $ac = getImageArrayRand();
            unset($_SESSION['renew']);
        }
        $isExisted = 0;
        foreach ($ac as $key => $value){
            $rs = getImageArray();
            if ($rs->num_rows > 0) {
              while($row = $rs->fetch_assoc()) {
                  if($row["ImageID"] == $key)
                      echo "<div class=\"list-photo\">
      <a href=\"src/details.php?imageID={$row["ImageID"]}\">
        <div class=\"list-image\" style='background: url(img/travel-images/small/{$row["PATH"]})'>
        </div>
      </a>
      <label class=\"list-name\">{$row["Title"]}</label>
      <p class=\"list-info\">{$row["Description"]}</p>
    </div>";
              }
          }
      }
      ?>

  </div>

  <footer>
    <div class="col">
      <p><a>使用条款</a></p>
      <p><a>隐私保护</a></p>
      <p><a>Cookie</a></p>
    </div>
    <div class="col">
      <p><a>关于</a></p>
      <p><a>联系我们</a></p>
    </div>
    <div class="col">
      <div>
        <img src="img/icons/wechat.png" width="40px">
        <img src="img/icons/ins.png" width="40px">
      </div>
      <div>
        <img src="img/icons/qq.png" width="40px">
        <img src="img/icons/github.png" width="40px">
      </div>
    </div>
    <div class="col">
      <img src="img/icons/wechat2DCode.png" width="100px">
    </div>
    <div class="copyright">
      <p><a>Copyright © 2019-2021 SOFT130002 Project2. All Rights Reserved. 备案号：16307130079@fudan.edu.cn</a></p>
    </div>
  </footer>

  <div id="totop">
    <a href="index.php#head">
      <img src="img/icons/totop.jpg" width="40px">
    </a>
  </div>
  <div id="reload" onclick="location.href='src/php/renew.php'">
    <a>
      <img src="img/icons/reload.jpg" width="40px">
    </a>
  </div>

</body>
</html>
