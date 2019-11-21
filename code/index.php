<?php

require_once 'imports/permission_levels/public.php';

require_once 'imports/utils.php';
$db = get_db();

$offset = (isset($_REQUEST['offset'])) ? intval($_REQUEST['offset']) : 0;
if ($offset < 0) $offset = 0;

$query = <<<MYSQL
SELECT id, title, text, author, DATE_FORMAT(date, '%d/%m/%Y'), image
FROM Article
WHERE audience = 'public'
  and reviewed = 'approved'
ORDER BY date DESC
LIMIT $offset, 4;
MYSQL;

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $title, $text, $author, $date, $image);
$articles = [];
while ($stmt->fetch()) {
  if (strlen($text) > 500) {
    $text = substr($text, 0, 500);
    $text .= '...';
  }

  $articles[] = ['id' => $id, 'title' => $title, 'text' => $text, 'author' => $author, 'date' => $date,
    'image' => $image];
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
            <a href="article.php?id=<?= $articles[0]['id'] ?>">
              <img src="<?= $articles[0]['image'] ?>" style="width: 320px; height:320px">
              <div class="text"><?= $articles[0]['title'] ?></div>
            </a>
          </div>
          <div class="mySlides fade">
            <a href="article.php?id=<?= $articles[1]['id'] ?>">
              <img src="<?= $articles[1]['image'] ?>" style="width: 320px; height:320px">
              <div class="text"><?= $articles[1]['title'] ?></div>
            </a>
          </div>
          <div class="mySlides fade">
            <a href="article.php?id=<?= $articles[2]['id'] ?>">
              <img src="<?= $articles[2]['image'] ?>" style="width: 320px; height:320px">
              <div class="text"><?= $articles[2]['title'] ?></div>
            </a>
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
      <a style='float: left;' href="staff_news.php?offset=<?= $offset - 4 ?>">prev</a>
      <a style='float: right;' href="staff_news.php?offset=<?= $offset + 4 ?>">next</a>
      <br>
      <br>
      <?php foreach ($articles as $a) { ?>
        <div class="article">
          <a href="article.php?id=<?= $a['id'] ?>">
            <h3 class="article_heading"><?= $a['date'] ?> - <?= $a['title'] ?></h3>
            <img class="article_pic" src="<?= $a['image'] ?>">
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