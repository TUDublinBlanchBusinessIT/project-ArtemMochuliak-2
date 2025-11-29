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

$id = $_GET['id'];


$sql = "
SELECT * FROM basic_log_v3
WHERE id = $id
";

$result = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($result);


$types = mysqli_query($conn, "SELECT * FROM service_types");
?>
