<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>

<form action="login.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <br><br>
  <input type="submit" value="Login">
</form>

</body>
</html>

<?php
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '123', 'hotel');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: dashboard.php");
    } else {
        echo "Error: Invalid username or password.";
    }

    mysqli_close($conn);
} else {
    echo "Error: The form is not submitting the required data.";
}
?>
