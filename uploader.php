<?php
session_start();
$info= (object)[];


include_once "php/config.php";

$data_type="";
if(isset($_POST['data_type'])){
	$data_type=$_POST['data_type'];
}

$destination="";
if(isset($_FILES['file']) && $_FILES['file']['name'] != ""){
	if($_FILES['file']['error'] == 0){
		$folder = "";
		// if(!file_exists($folder)){
		// 	//mkdir($folder,0777,true);
		// }
		$destination=$folder . $_FILES['file']['name'];
		$destination=$_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'], $destination);
		
		$info->message="your image was uploaded";
		$info->data_type=$data_type;
		echo json_encode($info);
	}
	
}

if($data_type=="change_profile_image"){
	if($destination!=""){
		$id=$_SESSION['unique_id'];
		$query="update users set img = '$destination' where unique_id='$id' limit 1";
		mysqli_query ($conn,$query) or die ('Erreur SQL !'.$query.'<br />'.mysqli_error($conn));
	}
	
}
	
	


?>