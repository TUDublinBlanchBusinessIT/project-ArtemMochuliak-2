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

$sql = "DELETE FROM basic_log_v3 WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: v8_list.php");
exit;
?>
