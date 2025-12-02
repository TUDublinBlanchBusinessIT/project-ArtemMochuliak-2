<?php session_start(); ?>

<h2>Login</h2>

<?php 
if (isset($_GET['msg'])) {
    echo "<p style='color:red'>" . $_GET['msg'] . "</p>";
}
?>

<form action="login_process.php" method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
