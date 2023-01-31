
<?php
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

//MySQL Query to read data
$query = "SELECT * FROM info;";
$result= mysqli_query($conn,$query);
$check= mysqli_num_rows($result);

if($check>0){
  while($row= mysqli_fetch_assoc($result)){
    echo $row['id']."<br>";
    echo $row['Name']."<br>";
    echo $row['Address']."<br>";
    echo $row['Phno']."<br>";
    echo $row['eamil']."<br>";
    echo $row['qua']."<br>";
    echo $row['spc']."<br>";

  }
}
?>

