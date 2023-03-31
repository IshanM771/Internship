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
        $sql = "SELECT password,name,last_name from logininfo where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $hash = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (isset($hash['password'])){
            if (password_verify($_POST['password'], $hash['password'])) {
                session_start();
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['name'] = $hash['name'];
                $_SESSION['last_name'] = $hash['last_name'];
                $_SESSION['password'] = $hash['password'];
                header('Location: index.php');
            }else{
                $errors['confirm_password'] = 'false';
            }
        }else{
            $errors['confirm_password'] = 'false';
        }
        
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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container"  style="max-width: 40%">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-20 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div>
                                <div class="p-5">
                                    <div class="text-center">
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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email Address" Required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" Required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
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