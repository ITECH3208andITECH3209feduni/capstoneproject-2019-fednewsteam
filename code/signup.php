<?php

require_once 'imports/public.php';

if (isset($_POST['email'])) {
    // Receive form submission. This is where the form validation sits.
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (strlen($password1) < 5) $error = 'passwords must be at least 5 characters long';
    if ($password1 !== $password2) $error = 'passwords do not match';

    require_once 'imports/utils.php';
    $db = get_db();

    $stmt = $db->prepare("SELECT * FROM User WHERE email = ?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows !== 0) $error = 'email already in use';
    $stmt->close();

    if (!isset($error)) {
        // if everything checks out, register the user and redirect
        $stmt = $db->prepare("INSERT INTO User (email, password) VALUES (?, ?);");
        $password = get_hash($password1);
        $stmt->bind_param("ss",$email, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows !== 0) $error = 'email already in use';
        $stmt->close();

        header("Location: login.php");
        die();
    }


} else {
    // First time page loaded. Do nothing.
    $_POST['email'] = '';
    $_POST['password1'] = '';
    $_POST['password2'] = '';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
<?php require_once 'imports/navbar.php'; ?>
<h1>Sign Up</h1>
<?php
if (isset($error)) echo "<p style='color: red'>$error</p><br>";
?>
<form id="form" method="post">
    email:<br>
    <input type="text" name="email" maxlength="128" value="<?= $_POST['email'] ?>"><br>
    password:<br>
    <input type="password" name="password1" maxlength="24" value="<?= $_POST['password1'] ?>"><br>
    password (repeat):<br>
    <input type="password" name="password2" maxlength="24" value="<?= $_POST['password2'] ?>"><br>
    <input type="submit" value="Sign Up">
</form>
</body>
</html>