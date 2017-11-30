<html>
<head>
<title>Movie Booking System</title>
<script>
function SelectShow(ShowId,price)
{
	document.getElementById("Show_id").value=ShowId;
	document.getElementById("cost").value=price;
	document.getElementById("ShowSelect").submit();
}
</script>
</head>
<body background="m13.jpg">
<?php
$connection=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('mbs',$connection);
?>
<ul class="tab"><center>
<?php
	session_Start();
	$movieid=$_SESSION['m'];
	$tabcount=0;
	$dates=mysql_query("select DISTINCT Date from shows where Movie_Id=$movieid");
	while($datedata=mysql_fetch_array($dates))
	{
			$datesfound[]=$datedata['Date'];
	?>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, '<?php echo $datedata['Date']; ?>')"
		 <?php if($tabcount==0){echo 'id="defaultOpen"';}$tabcount++; ?>><?php echo $datedata['Date']; ?></a></li>
	<?php
	}
	?>
</ul><br><br><br><br><br>
<form id="ShowSelect" action="seat_selector.php" method="POST" >
<input type="Hidden" id="Show_id" name="Show_id">
<?php
	for($i=0;$i<$tabcount;$i++)
	{

	?>
	<div id="<?php echo $datesfound[$i];?>" class="tabcontent">
	<?php
	$shows=mysql_query("Select * from shows where Date='$datesfound[$i]' and Movie_Id=$movieid");
	while($showdata=mysql_fetch_array($shows))
	{
	?>
	<center>
	<input class="btn" type="Button" value="<?php echo $showdata['TIME']; ?>" name="<?php echo $showdata['SHOW_ID']; ?>" id="<?php echo $showdata['SHOW_ID']; ?>" onclick="SelectShow(this.id,<?php echo $showdata['Price']; ?>)">&nbsp;&nbsp;Price:-<?php echo $showdata['Price']; ?><br>
	<?php
	}
	?>
	</div>
	<?php
	}
	?>
	<input type="hidden" id="cost" name="cost"></center>
</form>
<script>
function openCity(evt, Date) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(Date).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>
