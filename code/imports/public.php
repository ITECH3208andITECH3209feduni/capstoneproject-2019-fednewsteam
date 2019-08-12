<?php

session_start();

if (isset($_SESSION['email'])) {
    // if already logged in, redirect
    header("Location: ../students.php");
    die();
}