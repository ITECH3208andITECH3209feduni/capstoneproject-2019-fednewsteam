<?php

if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['email'])) {
    // logged in
    ?>
    Logged in as <?= $_SESSION['email'] ?>
    <a href="imports/logout.php">log out</a>
    <?php
} else {
    // logged out
    ?>
    <a href="login.php">log in</a>
    <?php
} ?>