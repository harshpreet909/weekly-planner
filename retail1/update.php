<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test1", $con);
   
   $name = $_POST["name"];
   $availdays = $_POST["availdays"];
   $availcap = $_POST["availcap"];
   $est = $_POST["est"];
   $a = $_POST["a"];
   $b = $_POST["b"];
   $c = $_POST["c"];
   $d = $_POST["d"];
   $e = $_POST["e"];
   $f = $_POST["f"];
   /* echo <script>console.log(<?php echo $name;?>);<script>; */
   $sql= "update retail1 SET AvailDays = '$availdays' , AvailCap = '$availcap' , est = '$est', a='$a' ,  b='$b' ,  c= '$c'  , d= '$d' , e='$e' ,  f= '$f' where name = '$name'";
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