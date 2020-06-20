<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>图片详情</title>
  <link href="css/details.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
  function display_alert(){
    alert("alert!")
  }
  </script>
</head>
<body>
  <header id="head">
    <nav>
      <h3><a href="../index.php">
        <img src="../img/icons/logo.jpg" class="logo">
        </a>
        <div class="div-left">
        <a href="../index.php" class="link">首页</a>
        <a href="browse.php" class="link">浏览页</a>
        <a href="search.php" class="link">搜索页</a>
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
                <li><a href=\"upload.php\">上传</a></li>
                <li><a href=\"myphoto.php\">我的照片</a></li>
                <li><a href=\"favor.php\">我的收藏</a></li>
                <li><a href=\"php/logout.php\">登出</a></li>";
                }
                else
                    echo "<li><a href=\"login.php\">登入</a></li>";
                ?>
    </div>
      </ul>
      </li>
      </ul>
      </h3>
    </div>
  </header>
  <br>
  <br>

  <div class="main-bottom">
    <div class="filter">
      <h4 class="search-title">详情</h4>
        <?php
        $imageID = $_GET['imageID'];
        require_once('php/detailsget.php');
        $un = getUser($imageID);
        $favorCount = getFavorCount($imageID);
        $iCountry = getImageCountry($imageID);
        $iCity = getImageCity($imageID);

        require_once('php/favorcount.php');
        $ia = getImageArray();
        if ($ia->num_rows > 0) {
            while($row = $ia->fetch_assoc()) {
                if($row["ImageID"] == $imageID) {
                    echo "<div class=\"filter-show\">
        <h4 class=\"title-name\">{$row["Title"]}</h4>
        <h5 class=\"title-name\">by {$un}</h5>
        <div class=\"list-show\">
          <img src=\"../img/travel-images/medium/{$row["PATH"]}\" class=\"list-image\">
          <br>
          <div class=\"list-details\">
            <div class=\"content\">
              <h4 class=\"search-title\">收藏人数</h4>
              <div class=\"search-line\">
                <p class=\"p-info\">{$favorCount}</p>
                <br>
              </div>
            </div>
            <div class=\"content\">
              <h4 class=\"search-title\">图片详情</h4>
              <div class=\"search-line\">
                <p>主题：Scenery</p>
                <p>国家：{$iCountry}</p>
                <p>城市：{$iCity}</p>
              </div>
            </div>";
        if(isset($_SESSION['user'])){
            require_once('php/mysql.php');
            $tif = getTravelImageFavor();
            $temp = 0;
            if ($tif->num_rows > 0) {
                while($row1 = $tif->fetch_assoc()) {
                    if($row1["ImageID"] == $imageID && $row1["UID"] == $_SESSION['UID']) {
                        $temp = 1;
                    }
                }
            }
            if($temp == 1)
                echo "<input type=\"submit\" value=\"已收藏\" class=\"modify\" onclick=\"location.href='php/favordelete.php?imageID=$imageID&UID={$_SESSION['UID']}'\">";
            else
                echo "<input type=\"submit\" value=\"收藏\" class=\"modify\" onclick=\"location.href='php/favorinsert.php?imageID=$imageID&UID={$_SESSION['UID']}'\">";
        }
          echo "</div>
        </div>
        <div class=\"description\">
          <br>
          <p class=\"list-info\">{$row["Description"]}</p>
          <br>
        </div>
      </div>";
                }
            }
        }
        ?>
    </div>
  </div>

  <footer>
    <div class="copyright">
      <p><a class="footer-a">Copyright © 2019-2021 SOFT130002 Project2. All Rights Reserved. 备案号：16307130079@fudan.edu.cn</a></p>
    </div>
  </footer>

</body>
</html>
