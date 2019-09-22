<?php
require_once 'imports/permission_levels/admin_only.php';

require_once 'imports/utils.php';
$db = get_db();

$query = "SELECT id, title, audience, date FROM Article WHERE reviewed = 'pending' ORDER BY date ASC;";
$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $title, $audience, $date);
$articles = [];
while ($stmt->fetch())
  $articles[] = ['id' => $id, 'title' => $title, 'audience' => $audience, 'date' => $date];
$stmt->close();

?>

<html lang="en">
<head>
  <title>FedNews</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/pending_articles.css">
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
      <h2>Articles Pending Review</h2>
      <table>
        <tr>
          <th class="small_th">date</th>
          <th>title</th>
          <th class="small_th">audience</th>
        </tr>
        <?php foreach ($articles as $a) { ?>
          <tr>
            <td><?= $a['date'] ?></td>
            <td><a href="review_article.php?id=<?= $a['id'] ?>"><?= $a['title'] ?></a></td>
            <td><?= $a['audience'] ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>

</body>
</html>