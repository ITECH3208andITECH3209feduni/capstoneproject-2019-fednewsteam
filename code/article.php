<?php

require_once 'imports/permission_levels/public.php';

if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];

  require_once 'imports/utils.php';
  $db = get_db();

  $query = "SELECT id, title, audience, text, DATE_FORMAT(date, '%d/%m/%Y'), image FROM Article WHERE id = ?;";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $title, $audience, $text, $date, $image);
  while ($stmt->fetch()) {
    $a = ['id' => $id, 'title' => $title, '$audience' => $audience, 'text' => $text,
      'date' => $date, 'image' => $image];

    if ($audience == 'public') require_once 'imports/permission_levels/public.php';
    else if ($audience == 'student') require_once 'imports/permission_levels/student_only.php';
    else if ($audience == 'staff') require_once 'imports/permission_levels/staff_only.php';
  }
  $stmt->close();
}
?>
<html lang="en">
<head>
  <title><?= $a['title'] ?></title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/article.css">
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
      <img src="<?= $a['image'] ?>">
      <h1><?= $a['title'] ?></h1>
      <p><?= $a['date'] ?></p>
      <p><?= $a['text'] ?></p>
    </div>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>

</body>
</html>
