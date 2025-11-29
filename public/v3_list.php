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

$sql = "
SELECT 
    basic_log_v3.id,
    service_types.type_name,
    basic_log_v3.cost,
    basic_log_v3.service_date
FROM basic_log_v3
JOIN service_types 
    ON basic_log_v3.service_type_id = service_types.id
";

$result = mysqli_query($conn, $sql);
?>

<h2>Service List (Version 3)</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Service Type</th>
        <th>Cost (€)</th>
        <th>Date</th>
        <th>Delete</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['type_name'] ?></td>
            <td><?= $row['cost'] ?></td>
            <td><?= $row['service_date'] ?></td>
            <td><a href="v5_delete.php?id=<?= $row['id'] ?>">Delete</a></td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="v3_add.php">Add New Service</a>

