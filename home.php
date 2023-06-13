<?php 
session_start();
   include_once "../php/config.php";
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
  $row = mysqli_fetch_assoc($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
     <h1>Hello</h1>
     <nav class="home-nav">
     	<a href="change-password.php">Change Password</a>
          <a href="../php/logout.php?logout_id=<?php echo $row['unique_id']; ?>">Logout</a>
     </nav>
     
</body>
</html>

