<?php session_start();
header('Content-Type: text/html; charset=utf-8');

//-----------------------------CONFIG------------------------------------------

ini_set('include_path', 'J:\\Xampp\\htdocs\\login.php\\');

 $db = mysqli_connect("localhost", "root", "", "mysqli_2");
  
mysqli_set_charset($db, "utf8");
$salt = "09.delfhkjsdfmlwsfd..324021034012041234,1234.21,34.1234.,,.231421";

require_once('functions.php');
require_once('login_logic.php');

if(check_login() == false) {
    require_once('login_markup_logged_out.php');
} else {
    require_once('login_markup_logged_in.php');
}
/* -------------- Check here, we have 2 connections: to mysqli_2 (I use that), and the, commented, hektate*/
?>

<?php
 $db = mysqli_connect("localhost", "root", "", "mysqli_2");
 $resultado = mysqli_query($db, "SET NAMES 'utf8'"); ?>
