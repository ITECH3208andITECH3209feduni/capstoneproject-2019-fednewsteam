<?php require_once 'imports/permission_levels/public.php' ?>

<html lang="en">
<head>
  <title>FedNews</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/slideshow.css">
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
      <div id="slideshow_outer_container">
        <a class="prev" onclick="plusSlides(-1)">&#10094; </a>
        <div class="slideshow-container">
          <div class="mySlides fade">
            <img src="CSS/Images/img1.png" style="width: 320px; height:320px">
            <div class="text">image 1</div>
          </div>
          <div class="mySlides fade">
            <img src="CSS/Images/img2.png" style="width: 320px; height:320px">
            <div class="text">image 2</div>
          </div>
          <div class="mySlides fade">
            <img src="CSS/Images/img3.png" style="width: 320px; height:320px">
            <div class="text">image 3</div>
          </div>
        </div>
        <a class="next" onclick="plusSlides(1)">&#10095; </a>
        <!-- This script needs to be run on the DOM after the slideshow-container is declared -->
        <script src="JS/SlideShow.js"></script>
        <div>
          <span class="dot active" onclick="currentSlide(0)"></span>
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
        </div>
      </div>
      <h1>Articles</h1>
      <div class="article">
        <a href="HTML/article1.html">
          <img class="article_pic" src="CSS/Images/img1.png">
          <div class="article_text">Text text text text text text tex text text text text text text text text text text
            text text
            text text text text text text text text text text text tex text text text text text text text text text text
            text text text text text text text text text text text text text tex text text text text text text text text
            text text text text text text text text text text text text text text text tex text text text text text text
            text text text text text text text text text text text text
          </div>
        </a>
      </div>
      <div class="article">
        <a href="HTML/article1.html">
          <img class="article_pic" src="CSS/Images/img1.png">
          <div class="article_text">Text text text text text text tex text text text text text text text text text text
            text text
            text text text text text text text text text text text tex text text text text text text text text text text
            text text text text text text text text text text text text text tex text text text text text text text text
            text text text text text text text text text text text text text text text tex text text text text text text
            text text text text text text text text text text text text
          </div>
        </a>
      </div>
      <div class="article">
        <a href="HTML/article1.html">
          <img class="article_pic" src="CSS/Images/img1.png">
          <div class="article_text">Text text text text text text tex text text text text text text text text text text
            text text
            text text text text text text text text text text text tex text text text text text text text text text text
            text text text text text text text text text text text text text tex text text text text text text text text
            text text text text text text text text text text text text text text text tex text text text text text text
            text text text text text text text text text text text text
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>

</body>
</html>