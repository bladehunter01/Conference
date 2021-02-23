<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "users";

$connection = mysqli_connect($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query1 = "SELECT * FROM `users` WHERE `username`='$username'";
$query2 = "SELECT * FROM `users` WHERE `password`='$password'";
$result1 = mysqli_query($connection, $query1);
$result2 = mysqli_query($connection, $query2);

if (($result1) && ($result2)) {
    mysqli_close($connection);
    header("Location: localhost/conference/pages/program.html");
    exit();
}else {
    mysqli_close($connection);
    header("Location: localhost/conference/pages/login.html");
    exit();
}
