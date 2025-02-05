<?php

require_once 'imports/permission_levels/student_only.php';

if (isset($_POST['title'])) {
  // if information is returned, attempt to log in

  $title = $_POST['title'];
  $text = $_POST['text'];
  $audience = $_POST['audience'];
  $image = filter_var($_POST['image'], FILTER_VALIDATE_URL) ? $_POST['image'] : 'CSS/Images/img3.png';
  $author = $_SESSION['username'];

  require_once 'imports/utils.php';
  $bad_words = filter_language($text);

  if (!empty($bad_words)) {
    $bad_words = implode(', ', $bad_words);
    $error = "Please remove the following words/phrases and resubmit: $bad_words";
  } else {
    require_once 'imports/utils.php';
    $db = get_db();
    $stmt = $db->prepare("INSERT INTO Article (title, text, audience, author, date, image) VALUES (?,?,?,?, CURDATE(),?);");
    $stmt->bind_param("sssss", $title, $text, $audience, $author, $image);
    if ($stmt->execute()) {
      $_POST['title'] = '';
      $_POST['text'] = '';
      $_POST['audience'] = 'public';
      $_POST['image'] = '';
      $msg = "Article: '$title' created successfully";
    } else {
      $error = "Something has gone terribly wrong. Please try again, or else contact Uni Tech Support.";
    }
    $stmt->close();
  }
} else {
  $_POST['title'] = '';
  $_POST['text'] = '';
  $_POST['audience'] = '';
  $_POST['image'] = '';
}
?>
<html lang="en">
<head>
  <title>FedNews</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/forms.css">
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
        <h2>Submit Article</h2>
        Article Title <br>
        <input id='title' name="title" type="text" value="<?= $_POST['title'] ?>" required maxlength="128"> <br>
        Image URL <br>
        <input id='image' name="image" type="text" value="<?= $_POST['image'] ?>" required maxlength="128"> <br>
        Text (5000 char max):<br>
        <textarea id="text" name="text" required maxlength="5000" rows="10"><?= $_POST['text'] ?></textarea> <br>
        Audience: <br>
        <select name="audience">
          <option value="public" <?= $_POST['audience'] == 'public' ? 'selected' : '' ?>>public</option>
          <option value="student"<?= $_POST['audience'] == 'student' ? 'selected' : '' ?>>student</option>
          <option value="staff"<?= $_POST['audience'] == 'staff' ? 'selected' : '' ?>>staff</option>
        </select>
        <br>
        <input class="button" type="submit" value="Submit For Review">
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