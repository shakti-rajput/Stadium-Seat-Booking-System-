<?php	
	$id=$_GET['matches'];
	$idw=$_GET['wingid'];
	$un=$_GET['user'];
	$connection=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('ndbms',$connection);
	$pr1=mysql_query("select cost_p from price_p where matchid_p='$id' and wingtype_p='$idw'" );
	$pr2=mysql_query("select seat_number_t from ticket where matchid_t='$id' and wingtype_t='$idw'");
	//$pr2="select * from ticket where matchid_t='.$id.' and wingtype_t='$idw'";
	$data1=mysql_fetch_array($pr1);
	$price=$data1[0];
	//echo $data1[0];
	//$v=0;
	$r[0]=0;
	while($rp=mysql_fetch_array($pr2))
	{
		
		$r[]=$rp['seat_number_t'];
		//$v=$v+1;
	} 
	$m=sizeof($r);		
?>
<html>
<head>
<title>Seat Select</title>
<link rel="stylesheet" type="text/css" href="VKpbyP.css">
<script>
	function updateseat(obj)
	{
		document.getElementById("matchid").value=<?php echo $id; ?>;
		if(obj.checked)
		{
			addseat(obj.id);
			document.getElementById("cost").value=parseInt(document.getElementById("cost").value)+parseInt(<?php echo $price; ?>);
			
		}
		else
		{
			removeseat(obj.id);
			document.getElementById("cost").value=parseInt(document.getElementById("cost").value)-parseInt(<?php echo $price; ?>);
		}
	}
	function addseat(id)
	{
		var seats_str=document.getElementById("seatno").value;
		seats_str+=","+id;
		document.getElementById("seatno").value=seats_str;
	}
	function removeseat(id)
	{
		var seats_str=document.getElementById("seatno").value;
		var seats_arr=seats_str.split(",");
		//document.write(seats_arr[2]);
		var index=seats_arr.indexOf(id);
		seats_arr.splice(index,1);
		seats_str=seats_arr.join();
		document.getElementById("seatno").value=seats_str;
	}
	function checkfirst()
	{
		if (document.getElementById("cost").value ==0)
		{
			window.alert("select any seat");
			return false;
		}
		
	}
</script>
</head>
<body>
<form method="post" action="<?php echo "bookseat.php?matches={$id}&wingid={$idw}&user={$un}";?>" onsubmit="return checkfirst()">
<div class="plane">
  <div class="cockpit">
    <h1>Stadium This Way</h1>
  </div>
  <ol class="cabin fuselage">
  <?php
	for ($k=1;$k<=10;$k++)
	{
		?>
	   <li class="row row--<?php echo $k;?>">
      <ol class="seats" type="A">
	  
	  <?php
		$j=chr($k+64);
		for($i=1;$i<=30;$i++)
		{
		
		?>
			<li class="seat">
			  <input type="checkbox" <?php if (in_array($i.$j,$r)){echo "disabled ";} echo "id='$i"."$j'"; ?> onclick="updateseat(this);"/>
			  <label for=<?php echo $i.$j;?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			</li>
		<?php	
			if($i%5==0 && $i!=0)
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		?>
		</ol>
		</li>
		<?php
	}
	?>
  </ol>
  <div class="fuselage">
    
  </div>
 
</div>
<input type="hidden" name="matchid" id="matchid">
<input type="hidden" name="seatno" id="seatno">
<input type="submit" name="cost" id="cost" value="0">
  <input type="Submit"  class="button" name="bookseats" id="bookseats" value="checkout">
 </form>
</body>
</html>