<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("abc", $con);

$week = $_POST['week'] ;
$priority = $_POST['priority'] ;
$team = $_POST['team'];
  if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);
   
   $task = $_POST['task'];
 
   
   $sql= "INSERT INTO $team ( `id`, `task`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `week`,`priority` ) VALUES ( '', '$task', '', '', '', '', '', '', '','$week' , '$priority')";
   //$run_query=mysql_query($sql,$con);
  if(mysql_query($sql,$con))
  {
	 // echo "Inserted Successfully";
	  
  }
  else
  {
	  echo mysql_error();
  }
mysql_close($con);
?>