<?php 

    session_start();
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    $password = $_SESSION['password'];

?>

<?php if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
 ?>

<!doctype html>

<html lang="en">
    <!-- Image and text -->
<nav class="navbar navbar-light bg-dark">
<h3 style="color: blanchedalmond;"><?php echo "Hello ".$name?></h3>

  <a class="navbar-brand" href="logout.php">
  <div align='right'>
  <input class="btn btn-primary btn" type="submit" value="Sign Out">
  </a>
    <h6 style="color: blanchedalmond;"> <?php echo "<div align='right'>";
            echo $email;
            ?>
</h6>

</nav>
<!doctype html>

<html lang="en">
    
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>

<html>
    <br><h5>Login Successful !!!</h5>

    <h5>Your Encrypted Password is -> <?php echo $password ?></h5>

</html>
