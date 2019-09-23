<?php
require "konek.php";

if(isset($_POST['login'])) {
    $username   = $_POST["username"];
    $pass       = $_POST["pass"];

    $datasql = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$pass'") or mysqli_error($conn);

    if(mysqli_num_rows($datasql) > 0){
        session_start();
        $_SESSION['nama']=mysqli_fetch_array($datasql)[2];
        header("location:dashboard.php");
    }else{
        echo"<script>alert('Username atau password tidak valid');
            window.location.href='index.php';
        </script>";
        exit;
    }
}
?>