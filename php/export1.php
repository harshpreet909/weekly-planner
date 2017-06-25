<?php  
//export.php  
$connect = mysql_connect("127.0.0.1","root","");
mysql_select_db("planner");
$output = '';
$header = '';
$result ='';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM retail1 order by week asc";
 $result = mysql_query($query);
 if(mysql_num_rows($result) > 0)
 {
  $header .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Task</th>  
                         <th>Comment</th>  
                         
                    </tr>
  ';
  while($row = mysql_fetch_array($result))
  { if($row["task"] != "Available Days" && $row["task"] != "Available Cap" ){
   $output .= '
    <tr>  
                         <td>'.$row["task"].'</td>  
                         <td>'.$row["Comment"].'</td>  
    </tr>
   ';
  }
  }
  $output .= '</table>';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
  print "$header\n$output";
 }
}
?>
