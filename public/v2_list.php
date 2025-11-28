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

$sql = "SELECT * FROM basic_log_v2";
$result = mysqli_query($conn, $sql);

?>

<h2>Service List (Version 2)</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Service Name</th>
        <th>Cost (€)</th>
        <th>Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['service_name'] ?></td>
            <td><?= $row['cost'] ?></td>
            <td><?= $row['service_date'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="v2_add.php">Add New Service</a>

