<?php

if(!empty($_POST))
{
	mysql_connect("localhost","root","");

mysql_select_db("test1");
   
  $week = date("W"); 
  
  $team = "retail1";
	
	foreach($_POST as $field_name => $val)
	{
		//clean post values
		$field_userid = strip_tags(trim($field_name));
		$val = strip_tags(trim(mysql_real_escape_string($val)));
		
		if(!empty($field_userid) && !empty($val))
		{
			
			$k1=mysql_query("select * from head WHERE id1 = '$field_userid' AND week = '$week' AND team = '$team' ");
			if(mysql_num_rows($k1) > 0 ){
				$k=mysql_query("UPDATE head SET name = '$val' WHERE id1 = '$field_userid' AND week = '$week' AND team = '$team'  ");
				echo "<script>location.reload();</script>";
			}
		    else{
         			
			$aa="INSERT INTO head (id1,week,name,team) VALUES('$field_userid','$week','$val','$team')";
				mysql_query($aa);
				echo "<script>alert('fail');</script>";
			
		}
		}
		else {
			echo "Invalid Requests";
		}
	}
} else {
	echo "Invalid Requests";
}



?>