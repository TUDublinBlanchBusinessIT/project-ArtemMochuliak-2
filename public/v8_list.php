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

$search = "";
$where = "";

if (isset($_GET['search']) && $_GET['search'] !== "") {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where = "WHERE 
                service_types.type_name LIKE '%$search%' OR
                basic_log_v3.cost LIKE '%$search%' OR
                basic_log_v3.service_date LIKE '%$search%' OR
                basic_log_v3.id LIKE '%$search%'";
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
$where
";


$result = mysqli_query($conn, $sql);
?>

<h2>Service List (Version 8)</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Search..." 
           value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
           
    From: <input type="date" name="from_date" 
            value="<?= isset($_GET['from_date']) ? $_GET['from_date'] : '' ?>">

    To: <input type="date" name="to_date" 
            value="<?= isset($_GET['to_date']) ? $_GET['to_date'] : '' ?>">   

    <button type="submit">Search</button>
</form>

<br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Service Type</th>
        <th>Cost (€)</th>
        <th>Date</th>
        <th>Edit | Delete</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['type_name'] ?></td>
            <td><?= $row['cost'] ?></td>
            <td><?= $row['service_date'] ?></td>
            <td>
                <a href="v6_edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="v5_delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="v3_add.php">Add New Service</a>

