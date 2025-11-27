<?php
$conn = new mysqli("localhost", "root", "", "car_maintenance");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM basic_log_v1");
?>

<h2>Service List (Version 1)</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Service Name</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['service_name'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="v1_add.php">Add New Service</a>
