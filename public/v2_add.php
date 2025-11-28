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

?>



<h2>Add Service (Version 2)</h2>

<form method="POST">
    Service Name: <input type="text" name="service_name" required><br><br>
    Cost (€): <input type="number" step="0.01" name="cost" required><br><br>
    Service Date: <input type="date" name="service_date" required><br><br>

    <button type="submit">Add</button>
</form>

<a href="v2_list.php">View Services</a>


