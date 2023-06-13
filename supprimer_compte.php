<?php

 include_once "php/config.php";
session_start();

if ( isset($_SESSION['unique_id'])) {


$id = $_SESSION['unique_id'];


$sql = " DELETE FROM users WHERE unique_id ='$id'";
mysqli_query ($conn,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($conn));
session_destroy();

     include("login.php");
} 


?>