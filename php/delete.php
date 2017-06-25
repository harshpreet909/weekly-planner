<?php
// called from html
$user = getenv("username");
	mysql_connect("127.0.0.1","root","");

mysql_select_db("planner");
 

  $team = $_POST['team'];
  $week = $_POST['week'];
  $story = $_POST['id2'];
  $id1= $_POST['id'];
   if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);
 $team2=$team.'story';
 $tt="select task FROM $team WHERE week = '$week' and id1='$id1'";
$sql= "DELETE FROM $team WHERE week = '$week' and id1='$id1'";
$sql2= "DELETE FROM $team2 WHERE week = '$week' and id1='$story'";
mysql_query($sql) ;
mysql_query($sql2) ;

	
 
?> 