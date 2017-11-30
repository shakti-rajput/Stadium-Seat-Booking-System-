<?php
$conn=mysql_connect("localhost","root","");
$selecydb=mysql_select_db("ndbms");
if (!$conn) 
{     
die("Connection failed: " . $conn->connect_error); 
} 
$home=$_POST['team1']; 
$away=$_POST['team2']; 
$sql ="SELECT * FROM teams WHERE team_name= '$home'";
$result = mysql_query($sql);
while($row1=mysql_fetch_array($result))
{
   $p1=$row1['team_id'];
}
$sql1 ="SELECT * FROM teams WHERE team_name= '$away'";
$result1 = mysql_query($sql1);
while($row2=mysql_fetch_array($result1))
{
   $p2=$row2['team_id'];
}
$x=$_POST['inmatch'];
$y=$_POST['start1'];
$z=$_POST['end1'];
$x1=$_POST['date1'];
$sql2="insert into matches values('$x','$y','$z','$x1','$p1','$p2')";
$result2=mysql_query($sql2);
$y1=$_POST['lw'];
$z1=$_POST['rw'];
$x2=$_POST['nw'];
$y2=$_POST['sw'];
$sql3="insert into price_p values ('$x',1,'$y1')";
$result3=mysql_query($sql3);
$sql4="insert into price_p values ('$x',2,'$z1')";
$result4=mysql_query($sql4);
$sql5="insert into price_p values ('$x',3,'$x2')";
$result5=mysql_query($sql5);
$sql6="insert into price_p values ('$x',4,'$y2')";
$result6=mysql_query($sql6);
header('Location:projectN.php');
?>
