<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h2>Register</h2>
	<form action="register.php" method="post">
		Username: <input type="text" name="username"><br><br>
		Password: <input type="password" name="password"><br><br>
		<input type="submit" value="Submit">
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

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "New user registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Error: Incomplete data.";
}
?>

