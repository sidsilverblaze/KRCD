<?php  
session_start();
session_destroy();
echo "you have been logged out <br>";
echo "click <a href='index.php'>here</a> to return";
?>