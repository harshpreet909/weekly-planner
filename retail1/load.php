
<?php

 mysql_connect("localhost","root","");

mysql_select_db("abc");
$week = $_POST['week'] ;
$team = $_POST['team'];
  if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);

 
 
 

$sql= "SELECT * FROM $team where week = $week order by priority desc, id1 desc  ";
$a=array();
$totala=0;
$totalb=0;
$totalc=0;
$totald=0;
$totale=0;
$totalf=0;
$totalg=0;
$totalh=0;
$totalk=0;

if($data = mysql_query($sql))
  {   $i=1;
      $r=mysql_num_rows($data);
	if($r>0){  
	while($row = mysql_fetch_assoc($data) ){
		
		$size='14px';
       $color ='#3467ba';
	   $j=1;
	$id[$i]= $row['id1'];   
	$task = $row['task'];
    $a[$i] = $row['a'];
	$b[$i] = $row['b'];
	$c[$i] = $row['c'];
    $d[$i] = $row['d'];
	$e[$i] = $row['e'];
	$f[$i] = $row['f'];
	$g[$i] = $row['g'];
	$h[$i] = $row['h'];
	$k[$i] = $row['k'];
	$p[$i] = $row['priority'];
	$pcolor= '#3467ba';
	
  if($p[$i]==3)
	$pcolor= '#ff000e';
	  
		
  if($i<$r-1){	
   $totala= $totala + $a[$i];
   $totalb= $totalb + $b[$i];
   $totalc= $totalc + $c[$i];
   $totald= $totald + $d[$i];
   $totale= $totale + $e[$i];
   $totalf= $totalf + $f[$i];
   $totalg= $totalg + $g[$i];
   $totalh= $totalh + $h[$i];
   $totalk= $totalk + $k[$i];
  }
  $dis='';
   if($i>=$r-1){ 
		$size='16px';
		$dis='none';
	}
   echo '<tr>
   <td style ="font-size:'.$size.' " ><strong style ="color: '.$pcolor.'">'. $task .'</strong></td>  
   <td>
<div   idi='.$id[$i].'     idj='.($j++).'  contenteditable="true" >'. $a[$i] .'</div></td>
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $b[$i] .'</td> 
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $c[$i].'</td> 
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $d[$i] .'</td> 
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $e[$i] .'</td> 
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $f[$i] .'</td> 
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $g[$i] .'</td>
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $h[$i] .'</td> 
   <td idi='.$id[$i].'     idj='.($j++).'  contenteditable="true">'. $k[$i] .'</td>  
   <td  style ="width:20px; display:'.$dis.';    text-align: center;">
   <button id='.$id[$i].' type="button" class="btn btn-danger btn-delete">Delete </button> </td>   
   
  </tr> ';
   
   if($i==$r-2)
   { echo '<tr>  <td colspan="10"><hr/></td></tr>';
	
	}
   $i++;
 
  
 }
  
    $color=array('red','red','red','red','red','red','red','red','red');
 
	    if ($totala < $a[$i-1]) 
        $color[0] = 'red';
		else 
		$color[0] ='#3467ba';
	
	    if ($totalb < $b[$i-1]) 
        $color[1] = 'red';
		else 
		$color[1] ='#3467ba';
	
	if ($totalc < $c[$i-1]) 
        $color[2] = 'red';
		else 
		$color[2] ='#3467ba';
	
	if ($totald < $d[$i-1]) 
        $color[3] = 'red';
		else 
		$color[3] ='#3467ba';
	
	if ($totale < $e[$i-1]) 
        $color[4] = 'red';
		else 
		$color[4] ='#3467ba';
	
	if ($totalf < $f[$i-1]) 
        $color[5] = 'red';
		else 
		$color[5] ='#3467ba';
	
	if ($totalg < $g[$i-1]) 
        $color[6] = 'red';
		else 
		$color[6] ='#3467ba';
	
	if ($totalh < $h[$i-1]) 
        $color[7] = 'red';
		else 
		$color[7] ='#3467ba';
	
	if ($totalk < $k[$i-1]) 
        $color[8] = 'red';
		else 
		$color[8] ='#3467ba';
	
	 
	 echo '<tr> <td style="font-size:16px;" ><strong>Planned Cap</strong></td> 
	            <td style ="color:'.$color[0].'" >'.($totala).'</td> 
				<td style ="color:'.$color[1].'" >'.($totalb).'</td> 
				<td style ="color:'.$color[2].'" >'.($totalc).'</td> 
				<td style ="color:'.$color[3].'" >'.($totald).'</td> 
				<td style ="color:'.$color[4].'" >'.($totale).'</td> 
				<td style ="color:'.$color[5].'" >'.($totalf).'</td> 
				<td style ="color:'.$color[6].'" >'.($totalg).'</td>
				<td style ="color:'.$color[7].'" >'.($totalh).'</td> 
				<td style ="color:'.$color[8].'" >'.($totalk).'</td>				
				</tr>';
				
	  
  }
  }
  else
  {
	  echo mysql_error();
  }

  $sql1= "SELECT * FROM $team where week = '$week' and task= 'Available Days' and task= 'Available Cap'  ";
if($data1 = mysql_query($sql1))
  {   
      $r=mysql_num_rows($data1);
	  echo '<tr>
         <td colspan="10"><hr/></td></tr>';
	 
	 
  }
	  



?>


<script>
$.ajax({
    type: "POST",
    url: "head.php",
	dataType: "html",
	data: {week:'<?php echo $week; ?>',team:'<?php echo $team; ?>'},
   success: function(Result){
		        $('#result1').html(Result);
		  // $(.table).append(Result);
		   }
		
		})
		
$(function(){
	//acknowledgement message
    var message_status = $("#status");
    $("td[contenteditable=true]").blur(function(){
		
		var i = $(this).attr("idi") ;
        var j = $(this).attr("idj") ;
        var value = $(this).text() ;
				
		$.ajax({
		   type: "POST",
		   url: "inline.php",
		   dataType: "html",
		   data: {week:'<?php echo $week; ?>',team:'<?php echo $team; ?>',i:i , j:j , value:value  },
		   success: function(Result){
		   
			  //alert("dsaf");
			
			  //location.reload();
			  $.ajax({
		   url: "load.php",
		   dataType: "html",
		    type: "POST",
		   data: {team:team, week:d1 },
		   success: function(Result){
		        $('#result').html(Result);
		  
		   }
		   
		
		})
		console.log("ok?");
		  
		   }
		
		})
    });
});		
</script>
