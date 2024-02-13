<?php
require 'config.php';
session_start();

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['email'] == $email && $row['password'] == $password) {

            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
        }
    }

    header("Location: ../Dashboard/index.php");
}


?>