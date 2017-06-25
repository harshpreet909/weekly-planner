<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

   $team=$_POST['team'];
   $week = $_POST['week'];
   if($week==0)
   $week = date("W");
   else
	   $week = sprintf("%02d", $week);
echo "<script>alert('$week');</script>";
mysql_select_db("planner", $con);
   
   $name = $_POST["name"];
   $availdays = $_POST["availdays"];
   $availcap = $_POST["availcap"];

   $a = $_POST["a"];
   $b = $_POST["b"];
   $c = $_POST["c"];
   $d = $_POST["d"];
   $e = $_POST["e"];
   $f = $_POST["f"];
   $g = $_POST["g"];
   $h = $_POST["h"];
   $i = $_POST["i"];
   $j = $_POST["j"];
   
//echo "<script>alert('$team,$week,$name,$availdays,$availcap,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j');</script>";
			//echo "<script>alert('$week');</script>";
			//echo "<script>alert('$val');</script>";
			//echo "<script>alert('$field_userid');</script>";

   $sql= "update $team SET AvailDays = '$availdays' , AvailCap = '$availcap' , a='$a' ,  b='$b' ,  c= '$c'  , d= '$d' , e='$e' ,  f= '$f'
   , g='$g' ,  h='$h' ,  i= '$i'  , j= '$j'
   where week = '$week' AND name = '$name'  ";
   $run_query=mysql_query($sql,$con);
  if(mysql_query($sql,$con))
  {
	  echo "updated Successfully";
	  
  }
  else
  {
	  echo mysql_error();
  }
mysql_close($con);
?>