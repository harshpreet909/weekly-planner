<?php


include 'db.php';

$header = '';
$result ='';
$flag=1;
$team = $_GET['team'];
$SQL = "SELECT task,Comment FROM $team order by week asc";
//echo "<script>console.log('$team');</script>";
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $exportData );
 

    $header .= "Task". "\t" . "Comment";

 
while( $row = mysql_fetch_row( $exportData ) )
{   $flag=1;
    $line = '';
	foreach( $row as $value )
    {   if( $value!="Available Cap"&& $value!="Available Days"){                                         
        if ( ( !isset( $value ) ) || ( $value == "" )  )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
	}
	else
		$flag=0;
		//break;
    }
	if($flag==1)
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
 
?>