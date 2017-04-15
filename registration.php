<?php
// FRAME
//
//-----------------------------CONFIG------------------------------------------
// CHANGE THESE SETTINGS
 ini_set('include_path', 'J:\\Xampp\\htdocs\\registration.php\\');

 $db = mysqli_connect("localhost", "root", "", "mysqli_2");
  
mysqli_set_charset($db, "utf8");
$salt = "09.delfhkjsdfmlwsfd..324021034012041234,1234.21,34.1234.,,.231421";
//-----------------------------------------------------------------------------

require_once('registration_logic.php');
require_once('index.php');
