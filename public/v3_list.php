<?php
$servername = "localhost";
$username = "root";
$password = "PassB62tu";
$dbname = "car_maintenance";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM basic_log_v3";
$result = mysqli_query($conn, $sql);

$types = mysqli_query($conn, "SELECT * FROM service_types");
?>
