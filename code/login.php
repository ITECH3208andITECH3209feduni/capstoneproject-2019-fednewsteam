<?php

require_once 'imports/public.php';

if (isset($_POST['email'])) {
    // if information is returned, attempt to log in
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'imports/utils.php';
    $db = get_db();

    $stmt = $db->prepare("SELECT id, password FROM User WHERE email = ?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) $error = "we can't seem to find that email";
    else {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            // correct login
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            header("Location: student_news.php");
            die();
        } else $error = 'wrong password';
    }
    $stmt->close();
} else {
    $_POST['email'] = '';
    $_POST['password'] = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>
<body>
<div id="Header"></div>
<?php require_once 'imports/navbar_primary.php'; ?>
<div id="strip"></div>

<div id="background">
  <br>
  <br>
  <center>
    <div id="bond">
      <br>
      <br>
      <br>
      <form id="form" method="post">
        Email: <br>
        <input class="id" name="email" type="text" value="<?= $_POST['email'] ?>" required> <br>
        Password:<br>
        <input class="id" name="password" type="password" required>
        <br>
        <input class="button" type="submit" value="Login">
        <input class="button" type="Reset">
      </form>
        <?php if (isset($error)) echo "<p style='color: red'>$error</p><br>"; ?>

      <p>Username = 30331949</p>
      <p>Password = Student</p>
      <p>
      <p>Username = 30331949</p>
      <p>Password = Staff</p>

    </div>
  </center>
</div>
</body>
</html>