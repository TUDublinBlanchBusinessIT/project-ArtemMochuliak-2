<?php
$conn = new mysqli("localhost", "root", "", "car_maintenance");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service = $_POST['service_name'];

    $stmt = $conn->prepare("INSERT INTO basic_log_v1 (service_name) VALUES (?)");
    $stmt->bind_param("s", $service);
    $stmt->execute();

    echo "<p>Service added successfully!</p>";
}
?>

<h2>Add Service (Version 1)</h2>

<form method="POST">
    <label>Service Name:</label>
    <input type="text" name="service_name" required>
    <button type="submit">Add</button>
</form>

<a href="v1_list.php">View Services</a>
