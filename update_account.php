<?php  session_start();

 $db = mysqli_connect("localhost", "root", "", "mysqli_2");
  
  $resultado = mysqli_query($db, "SET NAMES 'utf8'");

  if(isset($_SESSION))
  {
    $User = $_SESSION['username'];
    $result = mysqli_query($db, "SELECT * FROM user WHERE Username='$User'");
    $salt = "09.delfhkjsdfmlwsfd..324021034012041234,1234.21,34.1234.,,.231421";
    while($row = mysqli_fetch_array($result))
    {
      $_SESSION["Email"] = $row['Email'];
      $_SESSION["Password"] = hash('sha256', $row['Password'].$salt); //hash decode
     // $password = hash('sha256', $password.$salt);
    }
  }

  if(isset($_POST['submit']))
  {
    $UpdateEmail = $_POST['Emailnew'];
    $UpdatePassword = hash('sha256', $_POST['Password'].$salt); //hash encode

    $result = mysqli_query($db, "UPDATE user SET Email = '".$UpdateEmail."', Password ='".$UpdatePassword."' WHERE Username = '".$User."'");
    header('Location: Updated.php');
  }

//header('Location: Updated.php');
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

  <title>Update Account</title>
</head>

<body>

          <?php 

require_once('Header.php');?>

        <div class="Menu">

       <div id="Menu">

             <nav>

                <ul class="cssmenu">

	              <li><a href="login_markup_logged_in.php">Back to Account</a></li>
        	      <li><a href="delete.php">Delete Account</a></li>
      	              <li><a href="logout_logic.php">Logout</a></li>
            

                </ul>

             </nav>

          </div>
    </div> 
     <div class="Container">

      <div class ="LeftBody">
      <div class="fancybox">
        <a class="fancybox" rel="group" title="Out of the Dark into the Light" href="img/tor_gross.jpg"><img src="img/tor_klein.jpg" alt=""/> </a>
      </div>
      </div>
      <div class="RightBody">
   <div class="EmailPass">  Change here your Email and / or Password!</div>

    <form name="RegisterForm" method="post" action="">

          <div class="FormElement">
        	  <input name="Email" type="email" required class="TField" id="Email" placeholder="Current Email" value="<?php echo $_SESSION["Email"]; ?>" />
           </div>
           <div class="FormElement">
            <input name="Emailnew" type="email" required class="TField" id="Emailnew" placeholder="New Email" value="" />
           </div>
           <div class="FormElement">
         	  <input name="Password" type="password" required class="TField" id="Password" placeholder="New Password" value="" />
         </div>
           <div class="FormElement">
            <input name="Password" type="password" required class="TField" id="Password" placeholder="Confirm new Password" value="" />
         </div>

         <div class="FormElement">
            <input type="submit" name="submit"  class="UpdateButton" value="Update Account"/>
          </div>
</form>


 <?php if(isset($error_msg) && !empty($error_msg)) : ?>

            <div class="Messages"><?php echo $error_msg; ?></div>

        <?php endif; ?>


       

        </div>
      </div>
    </div>
  </div>
   <?php require_once('Footer.php'); ?>
  </div>
</body>
</html>
