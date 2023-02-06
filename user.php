<!DOCTYPE html>
<html>
<head>
	<title>User Options</title>
</head>
<body>
	<h2>User Options</h2>
	<form action="register.php">
  <input type="radio" id="register" name="user-option" value="register">
  <label for="register">Register</label><br>
  <input type="submit" value="Submit">
</form>

<form action="login.php">
  <input type="radio" id="login" name="user-option" value="login">
  <label for="login">Login</label><br>
  <input type="submit" value="Submit">
</form>


	
	<script>
		function redirect() {
			if (document.getElementById("register").checked) {
				window.location.href = "register.php";
			}
			if (document.getElementById("login").checked) {
				window.location.href = "login.php";
			}
		}
	</script>
</body>
</html>
