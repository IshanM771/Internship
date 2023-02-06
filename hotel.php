<!DOCTYPE html>
<html>
<head>
	<title>Choose your role</title>
</head>
<body>
	<h2>Welcome, please select your role:</h2>
	<form action="user.php">
		<input type="radio" id="user" name="role" value="user">
		<label for="user">User</label><br>
		<input type="radio" id="hotel-owner" name="role" value="hotel-owner">
		<label for="hotel-owner">Hotel Owner</label><br><br>
		<input type="submit" value="Submit" onclick="redirect()">
	</form>
	<script>
		function redirect() {
			if (document.getElementById("user").checked) {
				window.location.href = "user.php";
			}
			if (document.getElementById("hotel-owner").checked) {
				window.location.href = "hotel-owner.php";
			}
		}
	</script>
</body>
</html>
