<?php

$conn = mysqli_connect('localhost', 'ritik', 'abc@123', 'login');

    if(!$conn){
        echo 'Connection Error: '. mysqli_connect_errno();
    }

?>