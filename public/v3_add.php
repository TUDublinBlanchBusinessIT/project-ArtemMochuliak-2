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

$types = mysqli_query($conn, "SELECT * FROM service_types");
?>

<h2>Add Service (Version 3)</h2>

<form method="POST">
    <label>Service Type:</label>
    <select name="service_type_id" required>
        <option value="">-- Select Service Type --</option>
        <?php while ($row = mysqli_fetch_assoc($types)): ?>
            <option value="<?= $row['id'] ?>">
                <?= $row['type_name'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <label>Cost (€):</label>
    <input type="number" step="0.01" name="cost" required>

    <br><br>

    <label>Service Date:</label>
    <input type="date" name="service_date" required>

    <br><br>

    <button type="submit">Add</button>
</form>

<a href="v3_list.php">View Services</a>