<?php
session_start();

$servername = "localhost";
$dbuser = "root";
$dbpass = "PassB62tu";
$dbname = "car_maintenance";
$port = 3306;

$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$enteredUser = $_POST['username'];
$enteredPass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$enteredUser'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    if ($enteredPass == $row['password']) {

        $_SESSION['username'] = $row['username'];

        header("Location: v8_list.php");
        exit;

    } else {
        header("Location: login.php?msg=Incorrect password");
        exit;
    }

} else {
    header("Location: login.php?msg=User not found");
    exit;
}
