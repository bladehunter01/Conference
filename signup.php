<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "users";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_POST['password'] == $_POST['confirm']) {
    mysqli_set_charset($connection, "utf8");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $gender = $_POST["gender"];
    $number = $_POST["number"];

    if ($_POST['agreement'] == "agree") {
        $agreement = "yes";
    }else {
        $agreement = "no";
    }

    $query = "INSERT INTO 'users' ('username', 'password', 'email', 'name', 'surname', 'gender', 'number', 'agreement') VALUES ('$username', '$password', '$email', '$name', '$surname', '$gender', '$number', '$agreement')";
    $result = mysqli_query($connection, $query);
}else {
    mysqli_close($connection);
    header("Location: localhost/conference/pages/signup.html");
    exit();
}

mysqli_close($connection);
header("Location: localhost/conference/pages/HomePage.html");
exit();