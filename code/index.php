<?php

require_once 'imports/permission_levels/public.php';

require_once 'imports/utils.php';
$db = get_db();


$query = <<<MYSQL
SELECT id, title, text, author, DATE_FORMAT(date, '%d/%m/%Y')
FROM Article
WHERE audience = 'public'
  and reviewed = 'approved'
ORDER BY date DESC
LIMIT 10;
MYSQL;

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $title, $text, $author, $date);
$articles = [];
while ($stmt->fetch()) {
  if (strlen($text) > 500) {
    $text = substr($text, 0, 500);
    $text .= '...';
  }

  $articles[] = ['id' => $id, 'title' => $title, 'text' => $text, 'author' => $author, 'date' => $date];
}
$stmt->close();

?>
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
      <?php foreach ($articles as $a) { ?>
        <div class="article">
          <a href="article.php?id=<?= $a['id'] ?>">
            <h3 class="article_heading"><?= $a['date'] ?> - <?= $a['title'] ?></h3>
            <img class="article_pic" src="CSS/Images/img1.png">
            <div class="article_text"><?= $a['text'] ?></div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>

</body>
</html>