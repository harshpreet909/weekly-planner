
<?php
$noofcell=11;
$noofcell1=$noofcell;
$com='none';
	for($it=1;$it<=$noofcell;$it++)
     {
		 $discell[$it]='none';
	 }
	 
 mysql_connect("127.0.0.1","root","");

mysql_select_db("planner");
$week = $_POST['week'] ;
$team = $_POST['team'];
  if($week==0)	
   $week = date("W");
  else
   $week = sprintf("%02d", $week);

//get number of head
$team1 = $team . 'head';
$week1 = $week;
   $sql= "SELECT max(week) as week FROM $team1 where team='$team' and week<='$week'";
    //$i=1;
	$data = mysql_query($sql);
  
  if(mysql_num_rows($data)>0)
  { 
	while($row = mysql_fetch_assoc($data)){
      $weekt=$row['week'];
	  
	  $weekt = sprintf("%02d", $weekt);
	  $sql= "SELECT * FROM $team1 where week ='$weekt' and team='$team' ";
      $data = mysql_query($sql);
	  $noofhead = mysql_num_rows($data);
	  //echo "<script>console.log('$noofhead');</script>";
	  
  
  if(mysql_num_rows($data)>0)
  { 
	while($row = mysql_fetch_assoc($data)){
       $of = $row['id'];
	   if($of!=1)
	   $discell[$of]='';
       else
		 $com='';
	}
  }
  }
 }
 
 $team2 = $team . 'story';
 

$sql= "SELECT * FROM $team where week = $week order by priority desc, id1 desc  ";
$sql2="SELECT * FROM $team2 where week = $week order by priority desc, id1 desc  ";
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
$totall=0;

$totalsa=0;
$totalsb=0;	
$totalsc=0;
$totalsd=0;
$totalse=0;
$totalsf=0;
$totalsg=0;
$totalsh=0;
$totalsk=0;
$totalsl=0;

$totalstory=0;
$data2 = mysql_query($sql2);
if($data = mysql_query($sql) )
  {   $i=1;
      $r=mysql_num_rows($data);
	if($r>0){  
	while($row = mysql_fetch_assoc($data)    ){
		$row2 = mysql_fetch_array($data2);
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
	$l[$i] = $row['l'];

	$comment[$i] = $row['Comment'];
	$p[$i] = $row['priority'];
	$pcolor= '#3467ba';
	
	//story
	$id2[$i]= $row2['id1'];   
	$task2 =  $row2['task'];
    $a2[$i] = $row2['a'];
	$b2[$i] = $row2['b'];
	$c2[$i] = $row2['c'];
    $d2[$i] = $row2['d'];
	$e2[$i] = $row2['e'];
	$f2[$i] = $row2['f'];
	$g2[$i] = $row2['g'];
	$h2[$i] = $row2['h'];
	$k2[$i] = $row2['k'];
	$l2[$i] = $row2['l'];

	//
	
	
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
   $totall= $totall + $l[$i];

  }
  //story point total
   $totalsa= $totalsa + $a2[$i];
   $totalsb= $totalsb + $b2[$i];
   $totalsc= $totalsc + $c2[$i];
   $totalsd= $totalsd + $d2[$i];
   $totalse= $totalse + $e2[$i];
   $totalsf= $totalsf + $f2[$i];
   $totalsg= $totalsg + $g2[$i];
   $totalsh= $totalsh + $h2[$i];
   $totalsk= $totalsk + $k2[$i];
   $totalsl= $totalsl + $l2[$i];

   
  $dis='';
  
   if($i>=$r-1){ 
		$size='16px';
		$dis='none';
	}
 	if( $task != "Available Days" && $task!= "Available Cap")
   	{
		$disstory='';
	}  
	else
		$disstory='none';
	
echo '<tr>
   <td style ="font-size:'.$size.'; width: 120px; padding-left: 20px; " ><strong style ="color: '.$pcolor.'">'. $task .'</strong></td>  
   
    <td style="width:120px; max-width:150px; display:'.$com.';  ">
			<div   idi='.$id[$i].'    s=0 idj=100  contenteditable="true" style=" min-height:30px; height:auto; max-width:200px" >'. $comment[$i] .'</div>
   </td>
   
   <td style ="display:'.$discell[2].';    width: 75px; height:auto ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.($j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;  background: linear-gradient(to top, blue 1%, white 10%); " >'. $a[$i] .'</div>
	  <div  class="form-control"  s=1 idi='.$id2[$i].'    idj='.($j).'  contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%);" >'. $a2[$i] .'</div>
  
  </td>
   <td style ="display:'.$discell[3].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;  background: linear-gradient(to top, blue 1%, white 10%); " >'. $b[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'    idj='.($j).'    contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $b2[$i].'</div>
   </td>
   <td style ="display:'.$discell[4].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;  background: linear-gradient(to top, blue 1%, white 10%); " >'. $c[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $c2[$i].'</div>
   </td>
   <td style ="display:'.$discell[5].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;  background: linear-gradient(to top, blue 1%, white 10%); " >'. $d[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $d2[$i].'</div>
   </td>
   <td style ="display:'.$discell[6].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left; ; background: linear-gradient(to top, blue 1%, white 10%); " >'. $e[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $e2[$i].'</div>
   </td>
   <td style ="display:'.$discell[7].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;   background: linear-gradient(to top, blue 1%, white 10%); " >'. $f[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $f2[$i].'</div>
   </td>
   <td style ="display:'.$discell[8].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;   background: linear-gradient(to top, blue 1%, white 10%); " >'. $g[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $g2[$i].'</div>
   </td>
   <td style ="display:'.$discell[9].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;   background: linear-gradient(to top, blue 1%, white 10%); " >'. $h[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $h2[$i].'</div>
   </td>
   <td style ="display:'.$discell[10].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;   background: linear-gradient(to top, blue 1%, white 10%); " >'. $k[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $k2[$i].'</div>
   </td>
   <td style ="display:'.$discell[11].';    width: 75px; ">
      <div  class="form-control"  s=0 idi='.$id[$i].'     idj='.(++$j).'  contenteditable="true" style="height:30px; max-width:37px; float:left;   background: linear-gradient(to top, blue 1%, white 10%); " >'. $l[$i] .'</div>
      <div  class="form-control"  s=1 idi='.$id2[$i].'     idj='.($j).'   contenteditable="true" style="height:30px; max-width:37px; float:left; display:'.$disstory.'; background: linear-gradient(to top, black 1%, white 10%); " >'. $l2[$i].'</div>
   </td>

  
     
   <td  style ="width:30px; max-width:50px; max-height:20px; display:'.$dis.';    text-align: center;">
   <image type="button" name= '.$id2[$i].' id='.$id[$i].' class="btn  btn-delete" src="del.png" style="height:40px"; ></button> </td>    
    
   
  </tr> ';
   
   if($i==$r-2)
   { echo '<tr>  <td colspan="10"><hr/></td></tr>';
	
	}
   $i++;
 
  
 }
  
    $color=array('red','red','red','red','red','red','red','red','red','red');
 
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
	
	if ($totall < $l[$i-1]) 
        $color[9] = 'red';
		else 
		$color[9] ='#3467ba';
	
	if ($totalm < $m[$i-1]) 
        $color[10] = 'red';
		else 
		$color[10] ='#3467ba';
	
	
	 
	 echo '<tr> <td style="font-size:16px;" ><strong>Planned Cap</strong></td> 
	            <td style="display:'.$com.';" >
				    <div style ="color:'.$color[0].'; display:'.$discell[1].';float:left;" ></div>
				    <div style ="color:; float:left;padding-left: 45px" ></div>
				</td>
	            <td  style ="display:'.$discell[2].';">
				    <div style ="color:'.$color[0].'; display:'.$discell[2].';float:left;" >'.($totala).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalsa).'</div>
				</td>
				<td  style ="display:'.$discell[3].';">
				    <div style ="color:'.$color[1].'; display:'.$discell[3].';float:left;" >'.($totalb).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalsb).'</div>
				</td>
				<td  style ="display:'.$discell[4].';">
				    <div style ="color:'.$color[2].'; display:'.$discell[4].';float:left;" >'.($totalc).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalsc).'</div>
				</td>
				<td  style ="display:'.$discell[5].';">
				    <div style ="color:'.$color[3].'; display:'.$discell[5].';float:left;" >'.($totald).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalsd).'</div>
				</td>
				<td  style ="display:'.$discell[6].';">
				    <div style ="color:'.$color[4].'; display:'.$discell[6].';float:left;" >'.($totale).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalse).'</div>
				</td>
				<td  style ="display:'.$discell[7].';">
				    <div style ="color:'.$color[5].'; display:'.$discell[7].';float:left;" >'.($totalf).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalsf).'</div>
				</td>
				<td  style ="display:'.$discell[8].';">
				    <div style ="color:'.$color[6].'; display:'.$discell[8].';float:left;" >'.($totalg).'</div>
				    <div style ="color:; float:left;padding-left: 45px" >'.($totalsg).'</div>
				</td>
				<td  style ="display:'.$discell[9].';">
				    <div style ="color:'.$color[7].'; display:'.$discell[9].';float:left;" >'.($totalh).'</div>
				    <div  class=a style ="color:; float:left;padding-left: 45px" >'.($totalsh).'</div>
				</td>
				<td  style ="display:'.$discell[10].';">
				    <div style ="color:'.$color[8].'; display:'.$discell[10].';float:left;" >'.($totalk).'</div>
				    <div class=a style ="color:; float:left;padding-left: 45px" >'.($totalsk).'</div>
				</td>
				<td  style ="display:'.$discell[11].';">
				    <div style ="color:'.$color[9].'; display:'.$discell[11].';float:left;" >'.($totall).'</div>
				    <div class=a style ="color:; float:left;padding-left: 45px" >'.($totalsl).'</div>
				</td>
				
				</tr>';
				
	  $totalstory = $totalsa + $totalsb + $totalsc + $totalsd + $totalse + $totalsf + $totalsg + $totalsh + $totalsk + $totalsl;
	 // echo "<script>alert('$totalstory');</script>";
  }
  }
  else
  {
	  echo mysql_error();
  }

	  



?>


<script>
$.ajax({
    type: "POST",
    url: "../php/head.php",
	dataType: "html",
	data: {week:'<?php echo $week; ?>',team:'<?php echo $team; ?>'},
   success: function(Result){
		        $('#result1').html(Result);
		  // $(.table).append(Result);
		   }
		
		})
//total story points

  
$(function () {
  $('#btn-story').val("Total Story Points: <?php echo $totalstory; ?>");
});
		
$(function(){
	//acknowledgement message
    var message_status = $("#status");
    $("div[contenteditable=true]").blur(function(){
		
		var i = $(this).attr("idi") ;
        var j = $(this).attr("idj") ;
		var s = $(this).attr("s") ;
        var value = $(this).text() ;
		var flag = $.isNumeric( value ); 
		var flag1 = false;
		//alert(s);
		if(value == '')
          flag=true;
	    if (j==100)
			flag1=true;
				
	if(flag==true || flag1==true){	
				
		$.ajax({
		   type: "POST",
		   url: "../php/inline.php",
		   dataType: "html",
		   data: {week:'<?php echo $week; ?>',team:'<?php echo $team; ?>',i:i , j:j , value:value , s:s },
		   success: function(Result){
		     //alert("dsaf");
			
			  //location.reload();
			  $.ajax({
		   url: "../php/load.php",
		   dataType: "html",
		    type: "POST",
		   data: {team:team, week:d1 },
		   success: function(Result){
		        //$('#result').html(Result);
		  
		   }
		   
		
		})
		console.log("ok?");
		  
		   }
		
		})
	}
    });
});		
</script>
