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
		if(!file_exists($folder)){
			mkdir($folder,0777,true);
		}
		$destination=$_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'], $destination);
		
		$info->message="your image was uploaded";
		$info->data_type=$data_type;
		echo json_encode($info);
	}
	
}
if($data_type=="send_image"){
	
	$outgoing_msg_id=$_SESSION['unique_id'];
	
	$files=$destination;
	//$msg=$destination;
	
	
	$incoming_msg_id =$_POST['incoming_id'];
	 
	// $sql="select * from messages where (outgoing_msg_id='$outgoing_msg_id' && incoming_msg_id='$incoming_msg_id') || (incoming_msg_id='$outgoing_msg_id' && outgoing_msg_id='$incoming_msg_id') limit 1";
	// $result2=mysqli_query ($conn,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($conn));
	
	
	$query="insert into messages (incoming_msg_id, outgoing_msg_id, msg, files) values ('$incoming_msg_id', '$outgoing_msg_id','','$files')";
	mysqli_query ($conn,$query) or die ('Erreur SQL !'.$query.'<br />'.mysqli_error($conn));
		
}

?>

