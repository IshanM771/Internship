<?php include("db_connect.php");?>


<?php

if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
}
?>


<?php

$email = $password = $confirm_password = '';

$errors = array("email" => '', "password" => '' , "confirm_password" => 'true');


if (isset($_POST['submit'])) {
    

    if (empty($_POST['email'])){
      $errors['email'] = 'false';
      }else {
          $errors['email'] = 'true';
      }
    if (empty($_POST['password'])){
      $errors['password'] = 'false';
      }else {
        $errors['password'] = 'true';
      }

    if (!empty($_POST['email']) && (!empty($_POST['password']))) {

        $email = $_POST['email'];
        $sql = "SELECT password,name from logininfo where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $hash = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (password_verify($_POST['password'], $hash['password'])) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['name'] = $hash['name'];
            $_SESSION['password'] = $hash['password'];
            header('Location: home.php');
        } else {
            $errors['confirm_password'] = 'false';
        }
    }
}
    
?>



<!doctype html>

<html lang="en">
    <!-- Image and text -->
<nav class="navbar navbar-light bg-dark">
<h1 style="color: blanchedalmond;">Login</h1>
  <a class="navbar-brand" href="signup.php">
  <input class="btn btn-primary btn" type="submit" value="Sign Up">
  </a>
</nav>
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
  <div class="container" style="max-width: 30%">
    <br><form action="login.php" method="POST">
    <div class="form-group">
        <label for="email" style="font-weight:600">Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <!-- <small name="emailHelp" class="form-text text-muted"></small> -->
        <?php
        if ($errors['email'] == 'false') {
          echo "<br><div class='alert alert-danger' role='alert'>
          Enter a Email Address
        </div>";
        }
        ?> 
    </div>
    <div class="form-group">
        <label for="password" style="font-weight:600">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <?php
        if ($errors['password'] == 'false') {
          echo "<br><div class='alert alert-danger' role='alert'>
          Enter a Password
        </div>";
        }
        ?>
    </div>
    <div>
    <?php
        if ($errors['confirm_password'] == 'false') {
          echo "<div class='alert alert-danger' role='alert'>
          Invalid Username or Password
        </div>";
        $errors['confirm_password'] = 'true';
        }
        
        ?>
    </div>
  
    <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
    </form>
  </div>
</html>