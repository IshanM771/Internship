<?php
echo '<pre>';print_r($_POST); 
$name=$_POST["name"] ?? '';
$add=$_POST["add"];
$phno=$_POST["phno"];
$email=$_POST["email"];
$qua=$_POST["qua"];
$spc=$_POST["spc"];
$terms=$_POST["terms"];
if (!$terms){
   die("Terms must be accepted");
}

$host="localhost";
$user="root";
$password=" ";
$db="doctors";

$conn= mysqli_connect($host,$user,$password,$db);

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
  }
  
    echo "Connected successfully";
    $sql = "INSERT INTO info (Name, Address, Phno, eamil, qua, spc) VALUES ('$name','$add','$phno','$email','$qua','$spc')";
if (mysqli_query($conn, $sql)) {

     echo "<br> New record created successfully";
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

<?php
if (isset($_POST['submit1']))
{
    header ('Location:read.php');
}
?>
<!DOCTYPE html>
<html>
    <head></head>
        <body>
            <form name="form1" action="" method="post">
                <input type="submit" name="submit1" value="redirect">
            </form>
        </body>
</html>



