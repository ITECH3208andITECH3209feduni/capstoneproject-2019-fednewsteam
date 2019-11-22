<?php

require_once 'imports/permission_levels/admin_only.php';

if (!isset($_REQUEST['id'])) {
  header("Location: pending_articles.php");
}
$id = $_REQUEST['id'];
require_once 'imports/utils.php';
$db = get_db();

if (!isset($_REQUEST['title'])) {
  // first time loading page
  $query = "SELECT title, text, audience, author, reviewed, DATE_FORMAT(date, '%d %b %Y'), image FROM Article WHERE id=?;";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($title, $text, $audience, $author, $reviewed, $date, $image);
  $stmt->fetch();
  $stmt->close();

} else {
  // submitting changes
  $title = $_REQUEST['title'];
  $text = $_REQUEST['text'];
  $audience = $_REQUEST['audience'];
  $author = $_REQUEST['author'];
  $reviewed = $_REQUEST['reviewed'];
  $date = $_REQUEST['date'];
  $image = $_REQUEST['image'];


  require_once 'imports/utils.php';
  $bad_words = filter_language($text);

  if (!empty($bad_words)) {
    $bad_words = implode(', ', $bad_words);
    $error = "Please remove the following words/phrases and resubmit: $bad_words";
  } else {
    $query = "UPDATE Article SET title=?, text=?, audience=?, author=?, reviewed=?, image=? WHERE id=?;";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssss", $title, $text, $audience, $author, $reviewed, $image, $id);
    if ($stmt->execute()) {
      $_REQUEST['title'] = '';
      $_REQUEST['text'] = '';
      $_REQUEST['audience'] = '';
      $_REQUEST['author'] = '';
      $_REQUEST['reviewed'] = '';
      $_REQUEST['id'] = '';
      $_REQUEST['date'] = '';
      $_REQUEST['image'] = '';
      $msg = "Article: '$title' saved successfully";
    } else {
      $error = "Something has gone terribly wrong. Please contact Uni Tech Support.";
    }
    $stmt->close();
  }
}
?>
<html lang="en">
<head>
  <title>FedNews</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/forms.css">
  <style>img {
      max-width: 50%;
      min-width: 25%;
      margin: 16px;
      display: block;
    }</style>
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
      <form id="form" method="post">
        <h2>Review Article</h2>
        Article Title <br>
        <input id='title' name="title" type="text" value="<?= $title ?>" required maxlength="128"> <br>
        Image URL <br>
        <input id='image' name="image" type="text" value="<?= $image ?>" required maxlength="128"> <br>
        <img style='max-width: 50%;min-width: 25%;margin: 16px; display: block;' src="<?= $image ?>">
        Date: <br>
        <input id='date' name="date" type="text" value="<?= $date ?>" readonly> <br>
        Author: <br>
        <input id='author' name="author" type="text" value="<?= $author ?>" readonly> <br>
        Text (5000 char max):<br>
        <textarea id="text" name="text" required maxlength="5000" rows="10"><?= $text ?></textarea> <br>
        Audience: <br>
        <select name="audience">
          <option value="public" <?= $audience == 'public' ? 'selected' : '' ?>>public</option>
          <option value="student"<?= $audience == 'student' ? 'selected' : '' ?>>student</option>
          <option value="staff"<?= $audience == 'staff' ? 'selected' : '' ?>>staff</option>
        </select>
        <br>
        Reviewed: <br>
        <select name="reviewed">
          <option value="pending" <?= $reviewed == 'pending' ? 'selected' : '' ?>>pending</option>
          <option value="approved"<?= $reviewed == 'approved' ? 'selected' : '' ?>>approved</option>
          <option value="rejected"<?= $reviewed == 'rejected' ? 'selected' : '' ?>>rejected</option>
        </select>
        <br>
        <input class="button" type="submit" value="Update Article">
        <input class="button" type="Reset">
      </form>
      <?php if (isset($error)) echo "<p style='color: red'>$error</p><br>"; ?>
      <?php if (isset($msg)) echo "<p style='color: green'>$msg</p><br>"; ?>

    </div>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>

</body>
</html>