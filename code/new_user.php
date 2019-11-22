<?php

require_once 'imports/permission_levels/admin_only.php';

if (isset($_POST['username'])) {
  // if information is returned, attempt to log in
  require_once 'imports/utils.php';
  $username = $_POST['username'];
  $password = get_hash($_POST['password']);
  $permissions = $_POST['permissions'];
  $db = get_db();

  $stmt = $db->prepare("INSERT INTO User (username, password, permissions) VALUES (?,?,?);");
  $stmt->bind_param("sss", $username, $password, $permissions);
  if ($stmt->execute()) {
    $_POST['username'] = '';
    $_POST['password'] = '';
    $error = "$permissions $username created successfully";
    header("Location: index.php");
    die();
  } else {
    $error = "DB error. User may already exist";
  }
  $stmt->close();
} else {
  $_POST['username'] = '';
  $_POST['password'] = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>New User</title>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>
<body>
<div id="Header"></div>
<?php require_once 'imports/navbar_primary.php'; ?>
<div id="strip"></div>

<div id="background">
  <div id="bond">
    <form id="form" method="post">
      <h2>New User</h2>
      New Username: <br>
      <input name="username" type="text" value="<?= $_POST['username'] ?>" required> <br>
      Password:<br>
      <input id="password" name="password" type="password" required> <br>
      Confirm Password:<br>
      <input id="password_conf" name="password_conf" type="password" required oninput="check(this)"> <br>
      Permissions: <br>
      <select name="permissions">
        <option value="student">student</option>
        <option value="staff">staff</option>
        <option value="admin">admin</option>
      </select>
      <br>
      <input class="button" type="submit" value="Create">
      <input class="button" type="Reset">
    </form>
    <?php if (isset($error)) echo "<p style='color: red'>$error</p><br>"; ?>
  </div>
  <script type='text/javascript'>
      function check(input) {
          if (input.value !== document.getElementById('password').value) {
              input.setCustomValidity('Password Must be Matching.');
          } else {
              input.setCustomValidity('');
          }
      }
  </script>
</div>
</body>
</html>