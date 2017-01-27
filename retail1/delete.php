<?php
$user = getenv("username");
// called from html

	mysql_connect("localhost","root","");

mysql_select_db("abc");
if($user=='I332712'){   
  $team = $_POST['team'];
  $week = $_POST['week'];
  $id1= $_POST['id'];
   if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);
 
$sql= "DELETE FROM $team WHERE week = '$week' and id1='$id1'";
mysql_query($sql) ;

}
 
?> 