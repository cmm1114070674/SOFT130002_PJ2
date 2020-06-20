<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>浏览页</title>
  <link href="css/browse.css" rel="stylesheet" type="text/css">
  <script src="js/browse.js"></script>
</head>
<body>
  <header id="head">
    <nav>
      <h3><a href="../index.php">
        <img src="../img/icons/logo.jpg" class="logo">
        </a>
        <div class="div-left">
        <a href="../index.php" class="link">首页</a>
        <a href="browse.php" class="link" style="color:#7693AD">浏览页</a>
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
  <br>
  <br>
  <br>

  <div class="main-info">
    <div class="main-left">
      <div class="search-area">
        <h4 class="search-title">标题搜索</h4>
        <div class="search-line">
          <form method="get" action="php/browsesearch.php">
            <input type="text" id="search-text" name="title-text">
            <input type="submit" id="search-submit">
          </form>
        </div>
      </div>
      <div class="hot-content">
        <h4 class="search-title">热门内容快速浏览</h4>
        <div class="search-line">
            <p><a href="php/hotsearch.php?topic=Scenery">Scenery</a></p>
            <p><a href="php/hotsearch.php?topic=Canada">Canada</a></p>
            <p><a href="php/hotsearch.php?topic=Greece">Greece</a></p>
            <p><a href="php/hotsearch.php?topic=Italy">Italy</a></p>
            <p><a href="php/hotsearch.php?topic=United States">United States</a></p>
            <p><a href="php/hotsearch.php?topic=Ottawa">Ottawa</a></p>
            <p><a href="php/hotsearch.php?topic=Athens">Athens</a></p>
        </div>
      </div>
      <div class="hot-content">
        <h4 class="search-title">热门国家快速浏览</h4>
        <div class="search-line">
            <p><a href="php/hotsearch.php?topic=Canada">Canada</a></p>
            <p><a href="php/hotsearch.php?topic=Greece">Greece</a></p>
            <p><a href="php/hotsearch.php?topic=Italy">Italy</a></p>
            <p><a href="php/hotsearch.php?topic=United States">United States</a></p>
        </div>
      </div>
      <div class="hot-content">
        <h4 class="search-title">热门城市快速浏览</h4>
        <div class="search-line">
            <p><a href="php/hotsearch.php?topic=Ottawa">Ottawa</a></p>
            <p><a href="php/hotsearch.php?topic=Athens">Athens</a></p>
        </div>
      </div>
    </div>

    <div class="main-right">
      <div class="filter">
        <h4 class="search-title">筛选</h4>
        <div class="filter-select">
        <form name="form1" method="get" action="php/selectsearch.php">
          <select class="select" name="title-topic">
              <option value=\"title\">主题</option>
              <option value=\"title1\">Scenery</option>
              <option value=\"title2\">City</option>
              <option value=\"title3\">People</option>
              <option value=\"title4\">Animal</option>
              <option value=\"title5\">Building</option>
              <option value=\"title6\">Wonder</option>
              <option value=\"title7\">Other</option>
          </select>
          <select name="country" class="select" onChange="set_city(this, this.form.city);">
              <option value="0">国家</option>
              <option value="CA">Canada</option>
              <option value="GR">Greece</option>
              <option value="IT">Italy</option>
              <option value="US">United States</option>
          </select>
          <select name="city" class="select" id="citys">
            <option value="0">选择城市</option>
          </select>
          <input type="submit" class="select-button" value="筛选">
        </form>
        </div>
        <div class="filter-show">
            <?php
            if(isset($_SESSION['search-rs'])){
                $result = $_SESSION['search-rs'];
                foreach ($result as $r){
                    echo "<a href=\"details.php?imageID={$r["ImageID"]}\">
            <div class=\"list-image\" style='background: url(../img/travel-images/small/{$r["PATH"]})'>
            </div>
          </a>";
                }
            }
            ?>

          <div class="pages">
            < <span class="page">1</span> 2 3 4 5 6 ... 9 >
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="copyright">
      <p><a class="footer-a">Copyright © 2019-2021 SOFT130002 Project2. All Rights Reserved. 备案号：16307130079@fudan.edu.cn</a></p>
    </div>
  </footer>

</body>
</html>
