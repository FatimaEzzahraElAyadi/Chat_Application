
<?php include_once "header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<body>
  <div class="wrapper">
    <section  class="form login" >

      <header>Change Login</header>
    <form method="POST" action="change_nom_prenom.php" enctype="multipart/form-data" autocomplete="off">
    <div class="error-text"></div>
        <div class="field input">
         <label>Password</label>
      
          <input type="password" name="mdp" placeholder="Enter Your password"  required>
          <i class="fas fa-eye"></i>
        </div>
  
        <div class="field input">
          <label>Last Name</label>
          <input type="text" name="lname" placeholder="New Last name"  required>
         
        </div>
        <div class="field input">
          <label>First Name</label>
          <input type="text" name="fname" placeholder=" New First Name"  required>
         
        </div>
        
      
        <div class="field button">
          <input type="submit"   value="Change!">
        </div>
      </form>
    </section>
  </div>
  

</body>
</html>
