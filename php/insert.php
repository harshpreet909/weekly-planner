<?php
$con = mysql_connect("127.0.0.1","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("planner", $con);

$week = $_POST['week'] ;
$priority = $_POST['priority'] ;
$team = $_POST['team'];
$epic = $_POST['epic'];
$component = $_POST['component'];
  if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);
   
   $task = $_POST['task'];
   
 
$team2=$team.'story';   
   $sql= "INSERT INTO $team ( `id`, `task`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `k`, `l`, `Comment`, `week` ,`priority` ,`epic` ,`component`  ) VALUES ( '', '$task', '', '', '', '', '', '', '', '', '', '', '' , '$week', '$priority' ,'$epic' , '$component')";
   $sql2= "INSERT INTO $team2(`id`, `task`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `k`, `l`, `Comment`, `week` ,`priority` ,`epic` ,`component` ) VALUES ( '', '$task', '', '', '', '', '', '', '', '', '', '', '' , '$week', '$priority' ,'$epic' , '$component')";
   
   //$run_query=mysql_query($sql,$con);
  if(mysql_query($sql,$con) && mysql_query($sql2,$con))
  {
	 // echo "Inserted Successfully";
	  
  }
  else
  {
	  echo mysql_error();
  }
mysql_close($con);
?>