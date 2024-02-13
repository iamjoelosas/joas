<?php
require('config.php');

if(isset($_POST['submit'])) {
    $username=$_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql="INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    $result = mysqli_query($conn, $sql);

    if($result){
        
        header("Location: ../signin/index.html");
    }

}

?>

