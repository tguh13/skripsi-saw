<?php
include 'include/conn.php';


$username = $_POST['username'];
// $password = md5($_POST['password']);
$password = $_POST['password'];

$login = $db->query("select * from saw_users where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    session_start();
    echo $_SESSION['username'] = $username;
    echo $_SESSION['status'] = "login";
    header("location:index.php");
} else {
   echo "gagal login";
} 