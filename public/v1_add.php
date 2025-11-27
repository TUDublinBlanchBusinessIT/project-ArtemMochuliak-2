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


if (isset($_POST['service_name'])) {
    $service = $_POST['service_name'];

    $sql = "INSERT INTO basic_log_v1 (service_name) VALUES ('$service')";
    mysqli_query($conn, $sql);

    echo "<p>Service added successfully!</p>";
}


mysqli_close($conn);
?>

<h2>Add Service (Version 1)</h2>

<form method="POST">
    Service Name:
    <input type="text" name="service_name" required>
    <button type="submit">Add</button>
</form>

<a href="v1_list.php">View Services</a>
