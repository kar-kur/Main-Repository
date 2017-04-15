<?php

if(isset($_POST['news'])){

	//$Username = $_POST['Username']; really username is needed?
	$news = $_POST['news'];

 $db = mysqli_connect("localhost", "root", "", "mysqli_2");
  
		$sql = "UPDATE user SET news = '".$news."' WHERE Username = '" .$_SESSION['username']. "'";

mysqli_set_charset($db, "utf8");
$salt = "09.delfhkjsdfmlwsfd..324021034012041234,1234.21,34.1234.,,.231421";
	
	$result = mysqli_query ($db, $sql);
}

?>