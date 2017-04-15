<?php session_start();
  $db = mysqli_connect("localhost", "root", "", "mysqli_2");
  
  $resultado = mysqli_query($db, "SET NAMES 'utf8'");
  $salt = "09.delfhkjsdfmlwsfd..324021034012041234,1234.21,34.1234.,,.231421";

  if(isset($_POST['submit']))
  {
    $confirm_Email = $_POST['Email'];
    $confirm_password = hash('sha256', $_POST['password'].$salt);

    $result = $db->query("SELECT COUNT(*) FROM user WHERE Email='$confirm_Email' AND Password = '$confirm_password'");
    $row = $result->fetch_row();

    if($row[0] == 1)
    {
      $result = mysqli_query($db, "DELETE FROM user WHERE Email = '".$confirm_Email."'");
     
    header('Location: deleted_account.php');
      } else {
  echo "<span class='Messages1'>Please check Email and Password!</span>"; // Make an error alert
    }
  }
?>


<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	       <link href="css/Master.css" rel="stylesheet" type="text/css" />
         <link href="css/Menu.css" rel="stylesheet" type="text/css" />   

   <!-- Add jQuery library -->

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>

<!-- Add fancyBox -->

<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="stylesheet" href="js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript">

         $(document).ready(function() {

        $("a.fancybox").fancybox();

     });

    $(document).ready(function(){

    $('a[rel="gallery"]').fancybox();

  });

</script>

	<title>Successfully Deleted</title>

 <body>

          <?php 

require_once('Header.php');?>

        <div class="Menu">

       <div id="Menu">

             <nav>

                <ul class="cssmenu">

                    <li><a href="login_markup_logged_in.php">Back to Account</a></li>    

                    <li><a href="update_account.php">Update Account</a></li>  

                </ul>

             </nav>

          </div>
    </div> 
     <div class="Container">
<div class="LeftBody">
      <div class="fancybox img">
        <a class="fancybox img" rel="group" title="Forest" href="img/forest_gross.jpg" alt=""/> <img src="img/forest_klein.jpg" border"1" alt=""/> </a>    
      </div>
    </div>

    <div class="RightBody">
      <div class="EmailPass1">  Hello <?php echo htmlspecialchars($_SESSION['username']); ?>!<br> <br>If you are sure that you want <br> to delete your account, please confirm your <br>Email-Address and Password!</h4>
    </div>

    <form name="delete" method="post" action="">
      <div class="FormElement">
        <input name="Email" type="text" required class="TField" id="username" placeholder="Email"/>
      </div>
      <div class="FormElement">
        <input name="password" type="password" required class="TField" id="password" placeholder="Password"/>
      </div>

          <input type="submit" name="submit"  class="DeleteButton" value="Delete Account"/>

        
      </form>
     
      <?php if(isset($error_msg) && !empty($error_msg)) : ?>

         <div class="Messages1"><?php echo $error_msg; ?></div>

        <?php endif; ?>

        <?php if(isset($success_msg) && !empty($success_msg)) : ?>
      
        <div class="Messages1"><?php echo $success_msg; ?> </div>

        <?php endif; ?> 
    </div>
  </div>

        </div>

  </div>
             <?php require_once('Footer.php'); ?>

</body>

</html>