<?php include("db_connect.php");?>

<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
}
?>

<?php

$email = $password = $confirm_password = $name = '';

$errors = array("email" => '', "password" => '' , "confirm_password" => '', "name" => '');


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
    if (empty($_POST['confirm_password'])){
      $errors['confirm_password'] = 'false';
      }elseif ($_POST['password'] == $_POST['confirm_password']) {
        $errors['confirm_password'] = 'true';
      }else{
        $errors['confirm_password'] = 'false';
      }
      if (empty($_POST['name'])){
        $errors['name'] = 'false';
        }else {
          $errors['name'] = 'true';
        }
      // echo "POST<br>";
      // echo $_POST['email'];
      // echo "<br>";
      // echo $_POST['password'];
      // echo "<br>";
      // echo $_POST['confirm_password'];
      // echo "<br>";
      // echo "starting<br>";
      // echo $email;
      // echo $password;
      // echo $confirm_password;
      // echo "errors<br>";
      // echo $errors['email'];
      
      // echo $errors['password'];
      // echo $errors['confirm_password'];

}
?>

<!doctype html>

<html lang="en">
    <!-- Image and text -->
<nav class="navbar navbar-light bg-dark">
<h1 style="color: blanchedalmond;">Sign Up</h1>
  <a class="navbar-brand" href="login.php">
  <input class="btn btn-primary btn" type="submit" value="Sign In">

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
    <form action="signup.php" method="POST">
    <div class="form-group">
    <?php
        if ($errors['password'] == 'true' && $errors['email'] == 'true' && $errors['password'] == 'true' && $errors['confirm_password']== 'true' ) {
          echo "<br><div class='alert alert-success' role='alert'>
          Account Created Sucessfully
        </div>";
        $email = mysqli_real_escape_string($conn, $_POST['email']);
      $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT));
        $sql = "INSERT INTO logininfo (email, password, name) VALUES ('$email', '$password', '$name')";
        // mysqli_close($con)
        if (mysqli_query($conn, $sql)){
        // header('Location: signup.php');
        }else{
        echo 'query error: ' . mysqli_error($conn);
        }
        }     
    ?>
        <br><label for="email" style="font-weight:600">Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <?php
        if ($errors['email'] == 'false') {
          echo "<br><div class='alert alert-danger' role='alert'>
          Enter a Email Address
        </div>";
        }
        ?> 
    </div>
    <div>
    <label for="name" style="font-weight: 600">Enter Your Name</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
        <?php
        if ($errors['name'] == 'false') {
          echo "<br><div class='alert alert-danger' role='alert'>
          Enter a Name
        </div>";
        }
        ?> 
    </div>
    
    <div class="form-group">
        <label for="password" style="font-weight: 600">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <?php
        if ($errors['password'] == 'false') {
          echo "<br><div class='alert alert-danger' role='alert'>
          Enter a Password
        </div>";
        }
        ?>
    </div>
    <div class="form-group">
        <label for="confirm_password" style="font-weight: 600">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Password">
        <?php
        if ($errors['confirm_password'] == 'false') {
          echo "<br><div class='alert alert-danger' role='alert'>
          Please Confirm Your Password
        </div>";
        }
        ?>
    </div>
  
    <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
    </form>
    </div>
</html>

