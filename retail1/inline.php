<?php
// called from load.php

	mysql_connect("localhost","root","");

mysql_select_db("abc");
   
  $team = $_POST['team'];
  $week = $_POST['week'];
  $val = $_POST['value'];
  $i= $_POST['i'];
  $j= $_POST['j'];
  if($j==1)
	  $j='a';
  else if($j==2)
	  $j='b';
  else if($j==3)
	  $j='c';
  else if($j==4)
	  $j='d';
  else if($j==5)
	  $j='e';
  else if($j==6)
	  $j='f';
  else if($j==7)
	  $j='g';
   else if($j==8)
	  $j='h';
  else if($j==9)
	  $j='k';
  
			
	
		
		mysql_query("UPDATE $team SET $j = '$val' where id1= '$i' and week='$week'" );
		
		$t = mysql_query("select task from $team where id1= '$i' and week='$week'" );
		while($row = mysql_fetch_assoc($t) ){
		   
		   if($row['task'] == 'Available Days' and $j!='b' ){
			$val = $val*7;
			mysql_query("UPDATE $team SET $j = '$val' where task = 'Available Cap' and week='$week' and $j=''" );
		   
		   }
		   else if($row['task'] == 'Available Days' and $j=='b' ){
			$val = $val*7*0.75;
			mysql_query("UPDATE $team SET $j = '$val' where task = 'Available Cap' and week='$week' and $j=''" );
		   
		   }
		
		}
	
		
		
?>