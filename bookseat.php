<?php
$id=$_GET["matches"];
$iwd=$_GET["wingid"];
$un=$_GET["user"];
$connection=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('ndbms',$connection)  or die(mysql_error());
$t=$_POST['seatno'];
$occ=explode(",",$t);
$x=sizeof($occ);
for($i=1;$i<$x;$i++)
{
	$q=$occ[$i];
	$data="INSERT into ticket values('$un','$id','$iwd','$q')";
	mysql_query($data);
header('Location:payment.html');
}
?>
