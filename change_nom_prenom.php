<?php 
session_start();

if (isset($_SESSION['unique_id'])) {

   include_once "php/config.php";

if (isset($_POST['mdp']) && isset($_POST['fname']) && isset($_POST['lname'])) {

	function validate($data){
	   $data = htmlspecialchars($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$pwd = validate($_POST['mdp']);
	$newfname = validate($_POST['fname']);
    $newlname = validate($_POST['lname']);

    
    if(!empty($pwd) && !empty('$newfname') && !empty('$newlname'))
    	// hashing the password
    	$pwd = md5($pwd);
        $id = $_SESSION['unique_id'];

        $sql = "SELECT password
                FROM users WHERE 
                unique_id='$id' AND password='$pwd'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET  fname = '$newfname',lname = '$newlname'
        	          WHERE unique_id='$id'";
        	mysqli_query($conn, $sql_2);
        
            header("location:login.php");

	        exit();

        }else {

           
            header("location:change_login.php");
            //echo 'Mot de passe Inccorrect. <br /><a href="">Refaire</a>';
            exit();
        }

    }    
}