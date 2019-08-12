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
            header("Location: students.php");
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
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php require_once 'imports/navbar.php'; ?>
<h1>Login</h1>
<?php if (isset($error)) echo "<p style='color: red'>$error</p><br>"; ?>
<form id="form" method="post">
    email:<br>
    <input type="text" name="email" maxlength="64" value="<?= $_POST['email'] ?>"><br>
    password:<br>
    <input type="password" name="password" maxlength="24"><br>
    <input type="submit" value="Login">
</form>
</body>
</html>