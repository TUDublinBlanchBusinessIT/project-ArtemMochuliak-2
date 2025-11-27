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


$sql = "SELECT * FROM basic_log_v1";
$result = mysqli_query($conn, $sql);

echo "<h2>Service List (Version 1)</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Service Name</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['service_name'];

    echo "<tr><td>$id</td><td>$name</td></tr>";
}

echo "</table>";

mysqli_close($conn); 
?>

<a href='v1_add.php'>Add New Service</a>
