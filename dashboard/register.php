<?php include("db_connect.php");?>

<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
}
?>

<?php

$email = $password = $confirm_password = $name = $last_name = $role = '';

$errors = array("email" => '', "password" => '' , "confirm_password" => '', "name" => '', "last_name" => '', "role" => '');


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
        if (empty($_POST['last_name'])){
          $errors['last_name'] = 'false';
          }else {
            $errors['last_name'] = 'true';
          }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container" style="max-width: 50%">

        <div class="card o-hidden border-10 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div>
                    <div>
                        <div class="p-5">
                            <div class="text-center">
                            <?php
                                    
                                    if ($errors['password'] == 'true' && $errors['email'] == 'true' && $errors['password'] == 'true' && $errors['confirm_password']== 'true' && $errors['last_name']== 'true') {
                                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                                        $name = mysqli_real_escape_string($conn, $_POST['name']);
                                        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
                                        $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT)); 
                                        $email_query = mysqli_query($conn, "SELECT * FROM logininfo WHERE email = '$email'");
                                        $email_query = mysqli_fetch_assoc($email_query);
                                        $Checker = $email_query['email'];
                                        if($Checker != null){

                                            echo "<div class='alert alert-danger' role='alert'>
                                    Email Already Registered. Redirecting to Login Page
                                    </div>";
                                    header("Refresh:3;url=http://localhost/dashboard/login.php");
                                            
                                        }
                                    else{

                                    echo "<div class='alert alert-success' role='alert'>
                                    Account Created Sucessfully
                                    </div>";
                                    header("Refresh:3;url=http://localhost/dashboard/login.php");
                                    
                                    //$password = mysqli_real_escape_string($conn, $_POST['password']);
                                    $sql = "INSERT INTO logininfo (email, password, name, last_name) VALUES ('$email', '$password', '$name', '$last_name')";
                                    // mysqli_close($con)
                                    if (mysqli_query($conn, $sql)){
                                    // header('Location: signup.php');
                                    }else{
                                    echo 'query error: ' . mysqli_error($conn);
                                    }
                                    }}     
                                    ?>
                                    <?php
                                    if ($errors['confirm_password'] == 'false') {
                                    echo "<div class='alert alert-danger' role='alert'>
                                    Please Confirm Your Password
                                    </div>";
                                    }
                                    ?>
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="register.php" method="POST">
                                <div class="form-group row" >
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name" aria-describedby="emailHelp" placeholder="First Name" Required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="last_name" aria-describedby="emailHelp" placeholder="Last Name" Required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Email Address" Required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="confirm_password" placeholder="Confirm Password" Required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                                        <a class="small" href="admin\index.php">SuperAdmin Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>