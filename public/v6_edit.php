<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php?msg=You must login first");
    exit;
}

if (!isset($_SESSION['lastAccessed'])) {
    $_SESSION['lastAccessed'] = time();
}

if ($_SESSION['lastAccessed'] < (time() - 600)) {
    session_destroy();
    echo "Too long since this session was used – session timeout";
    exit;
} else {
    $_SESSION['lastAccessed'] = time();
}

?>

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

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $type = $_POST['service_type_id'];
    $cost = $_POST['cost'];
    $date = $_POST['service_date'];

    $sql = "
    UPDATE basic_log_v3 
    SET service_type_id = '$type',
        cost = '$cost',
        service_date = '$date'
    WHERE id = $id
    ";

    mysqli_query($conn, $sql);

    header("Location: v9_list.php");
    exit;
}

$id = $_GET['id'];


$sql = "
SELECT * FROM basic_log_v3
WHERE id = $id
";

$result = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($result);


$types = mysqli_query($conn, "SELECT * FROM service_types");
?>

<h2>Edit Service (Version 6)</h2>

<a href="logout.php">Logout</a>
<br>
<br>

<form method="POST">
    <input type="hidden" name="id" value="<?= $record['id'] ?>">

    <label>Service Type:</label>
    <select name="service_type_id" required>
        <?php while ($row = mysqli_fetch_assoc($types)): ?>
            <option value="<?= $row['id'] ?>"
                <?= $row['id'] == $record['service_type_id'] ? 'selected' : '' ?>>
                <?= $row['type_name'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <label>Cost (€):</label>
    <input type="number" step="0.01" name="cost" value="<?= $record['cost'] ?>" required>

    <br><br>

    <label>Service Date:</label>
    <input type="date" name="service_date" value="<?= $record['service_date'] ?>" required>

    <br><br>

    <button type="submit" name="update">Update</button>
</form>