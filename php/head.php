
<?php
 mysql_connect("127.0.0.1","root","");

mysql_select_db("planner");
//echo "<script>alert('dsfs');</script>";

$week = $_POST['week'] ;
$team = $_POST['team'];
$team1 = $team . 'head';
//echo "<script>alert('$team');</script>";
  if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);
   $week1 = $week;
   $sql= "SELECT max(week) as week FROM $team1 where team='$team' and week<='$week'";
    //$i=1;
	$data = mysql_query($sql);
  
  if(mysql_num_rows($data)>0)
  { 
	while($row = mysql_fetch_assoc($data)){
      $week=$row['week'];
	  $week = sprintf("%02d", $week);
	 //$sql= "SELECT name FROM $team1 where week ='$week' and team='$team' ";
     $sql= "SELECT * FROM $team1 where week ='$week' and team='$team' order by id asc  ";
	 $i=1;
  $data = mysql_query($sql);
  
  if(mysql_num_rows($data)>0)
  { 
	while($row = mysql_fetch_assoc($data)){
   $a1[$i]=$row["name"];
   $a = $row["name"];
   $a2 = $row["id"];
 	 // echo '<th id='.$i.' >'.$a.'</th>';
	 echo '<th id='.$a2.' class="active" style ="text-align:center;" >'.$a.'</th>';
		//$i++;
	}
 }
	}
 }
  
  /* $sql= "SELECT name FROM head where week ='$week' and team='$team' ";
   
  $i=1;
  $data = mysql_query($sql);
  
  if(mysql_num_rows($data)>0)
  { 
	while($row = mysql_fetch_assoc($data)){
   $a1[$i]=$row["name"];
   $a = $row["name"];
 	  echo '<th id='.$i.'  contenteditable="true">'.$a.'</th>';
		$i++;
	}
 } */


?>
<script>

$( document ).ready(function() {
	
  
    $('form').find("input[name=date1]").each(function(ev){
     	 if(!$(this).val()) { 
     $(this).attr("value", " CW : <?php echo $week1;?>");
	}
  });
  
  
});

</script>