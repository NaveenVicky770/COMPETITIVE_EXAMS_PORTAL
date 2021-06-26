<?php
   $db = mysqli_connect('localhost', 'root', '', 'learning');  
    if(!$db) {
        die("Database connection failed") . mysqli_error($db);
    }
?>