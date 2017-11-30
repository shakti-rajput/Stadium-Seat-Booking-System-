<?php
	$connection=mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db("ndbms",$connection);
	$id=$_GET['matches'];
	$un=$_GET['user'];
	session_Start();
	$_SESSION['m']=$id;
	$sql="select * from matches where match_id='$id'";
	$Trail=mysql_query($sql,$connection);
	$Traillink=mysql_fetch_array($Trail);
	$file=fopen("dbtext/".$id.".txt",'r');
?>
<html>

<br><br><br>
<div><img src="<?php echo "dbtext/".$id.".jpg"; ?>" style="width:300px; height:200px;"></div>

<div style="margin-left:200px">
<h3>MATCH DETAILS
.........</h3>
<font size="4px"><?php echo fgets($file). "<br />";?></font>


<h3></h3><font size="4px">
<?php echo fgets($file). "<br />"; ?></font> <br>
</div>
<div style="margin-left:200px;margin-right:200px;">


<h3></h3>
<font size="4px">
<?php echo fgets($file). ""; ?>
</font>

<br><br><br>
<a href="<?php echo "book.php?matches={$id}&user={$un}"; ?>">
<input class="btn" type="button" value="BOOK  SHOW"></a>
<br><br><br><br>
</div>
<form>
	<a href=""><font size="1px">LOGOUT</font></a>
</form>
</body>
</html>
