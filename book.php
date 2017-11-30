<!DOCTYPE html>
<html>
<head>
	<title>Book Now</title>
	<style type="text/css">
		#ho1
		{
			color: red;
			font-size: 70px;
		}
		#p1
		{
			font-size: 25px;
			color: red;
		}
		#s1
		{
			background-color: orange;
			color: white;
			font-size: 20px;
			width: 150px;
			height: 40px;
		}
	</style>
	
<?php	
	$id=$_GET['matches'];
	$un=$_GET['user'];
?>
</head>
<body bgcolor="gray">
<center><h1 id="ho1">BOOK YOUR TICKETS HERE</h1></center><br><br><br><br><br><br>
<center><b id="p1">Choose your Wing</b></center>>
<form name="form4" method="post" action="<?php echo "seat_selector.php?matches={$id}&wingid=1&user={$un}";?>"><center>
<input type="submit" name="w_ing" id="s1" value="WEST WING">&nbsp;&nbsp;</form>
<form name="form4" method="post" action="<?php echo "seat_selector.php?matches={$id}&wingid=2&user={$un}";?>">
<input type="submit" name="e_wing" id="s1" value="EAST WING">&nbsp;&nbsp;</form>
<form name="form4" method="post" action="<?php echo "seat_selector.php?matches={$id}&wingid=3&user={$un}";?>">
<input type="submit" name="n_wing" id="s1" value="NORTH WING">&nbsp;&nbsp;</form>
<form name="form4" method="post" action="<?php echo "seat_selector.php?matches={$id}&wingid=4&user={$un}";?>">
<input type="submit" name="s_wing" id="s1" value="SOUTH WING">&nbsp;</form>
</center>
</body>
</html>