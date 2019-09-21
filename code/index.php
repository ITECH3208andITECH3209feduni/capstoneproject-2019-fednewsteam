<?php require_once 'imports/permission_levels/public.php'?>

<html lang="en">
<head>
  <title>FedNews</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/slideshow.css">
  <link rel="stylesheet" type="text/css" href="CSS/articles.css">
</head>
<body>
<div id="Header"></div>
<?php require_once 'imports/navbar_primary.php'; ?>
<div id="strip"></div>
<div id="background">
  <br>
  <div id="bond">
      <?php require_once 'navbar_secondary.php'; ?>
    <div id="body">
      <h1>News</h1>
      <br>
      <center>
        <div class="slideshow-container">
          <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="CSS/Images/img1.png" style="width:300px""Height:300px">
            <div class="text"></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="CSS/Images/img2.png" style="width:300px""height:300px">
            <div class="text"></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="CSS/Images/img3.png" style="width:300px""height:300px">
            <div class="text"></div>
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <!-- This script needs to be run on the DOM after the slideshow-container is declared -->
        <script src="JS/SlideShow.js"></script>
        <br>
        <div>
          <span class="dot" onclick="currentSlide(0)"></span>
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
        </div>
      </center>
      <br>
      <div id="Article"><h1>Articles</h1></div>
      <br>
      <br>
      <a href="HTML/article1.html">
        <div id="sArt1">
          <div id="pic1"></div>
          <div id="text">Text text text text text text tex text text text text text text text text text text text text
            text text text text text text text text text text text tex text text text text text text text text text text
            text text text text text text text text text text text text text tex text text text text text text text text
            text text text text text text text text text text text text text text text tex text text text text text text
            text text text text text text text text text text text text
          </div>
        </div>
      </a>
      <br>
      <a href="HTML/article2.html">
        <div id="sArt2">
          <div id="pic2"></div>
          <div id="text">Text text text text text text tex text text text text text text text text text text text text
            text text text text text text text text text text text tex text text text text text text text text text text
            text text text text text text text text text text text text text tex text text text text text text text text
            text text text text text text text text text text text text text text text tex text text text text text text
            text text text text text text text text text text text text
          </div>
        </div>
      </a>
      <br>
      <a href="HTML/article3.html">
        <div id="sArt3">
          <div id="pic3"></div>
          <div id="text">Text text text text text text tex text text text text text text text text text text text text
            text text text text text text text text text text text tex text text text text text text text text text text
            text text text text text text text text text text text text text tex text text text text text text text text
            text text text text text text text text text text text text text text text tex text text text text text text
            text text text text text text text text text text text text
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>

</body>
</html>