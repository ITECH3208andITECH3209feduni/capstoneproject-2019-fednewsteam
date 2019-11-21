<?php

require_once 'imports/permission_levels/staff_only.php';

require_once 'imports/utils.php';
$db = get_db();

$offset = (isset($_REQUEST['offset'])) ? intval($_REQUEST['offset']) : 0;
if ($offset < 0) $offset = 0;

$query = <<<MYSQL
SELECT id, title, text, author, DATE_FORMAT(date, '%d/%m/%Y'), image
FROM Article
WHERE audience IN ('public', 'student', 'staff') 
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
  <title>Staff News</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
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
      <h1>Staff News</h1>
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