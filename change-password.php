<?php 
session_start();
   include_once "php/config.php";
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
  $row = mysqli_fetch_assoc($sql);
}
?>

<?php 

if ( isset($_SESSION['unique_id'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><div class="wrapper">
    <section class="form login">
    <form action="change-p.php" method="post">
	    <h2>Change Password</h2><br>
		
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<div class="field input"><label>Old Password:</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password"></div>
     	       

     	<div class="field input"><label>New Password:</label>
     	<td><input type="password" 
     	       name="np" 
     	       placeholder="New Password">
     	       </div>

     	<div class="field input"><label>Confirm New Password:</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password"></div>
     	       

     	<div class="field button">
     	    <input type="submit" value="Change">
     	    </div>
       
          
		    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
     </form></section></div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>