<?php
session_start();
session_unset(); //to ensure you are using same session
session_destroy(); //destroy the session
header("Location: login.php"); //to redirect back to "index.php" after logging out
exit();
?>