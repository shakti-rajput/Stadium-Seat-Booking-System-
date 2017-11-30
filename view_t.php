<?php
$conn=mysql_connect("localhost","root","");
$selecydb=mysql_select_db("ndbms");
if (!$conn) 
{     
die("Connection failed: " . $conn->connect_error); 
} 
session_start();
$un=$_SESSION["uname"];
$sql ="SELECT * FROM ticket WHERE username_t= '$un'";
$result = mysql_query($sql);
$k=0;
$arr=array();
while($row1=mysql_fetch_array($result))
{
	 $p1=$row1['matchid_t'];
	 
	if(!in_array($p1,$arr))
	{
		
	$arr[$k]=$p1;
	$k=$k+1;
	echo "Match :".$k;echo "<br>";echo "<br>";
	
	echo "Match Id : ";
	echo $p1;
	echo "<br>";
   $sqlm ="SELECT * FROM matches WHERE match_id= '$p1'";
   $resultm = mysql_query($sqlm);
   $row1m=mysql_fetch_array($resultm);
   echo "Start Time :"; echo $row1m['start_time'];echo "<br>";
   echo "End Time :"; echo $row1m['end_time'];echo "<br>";
   echo "Date Of Match :"; echo $row1m['date'];echo "<br>";
   $hm=$row1m['home_team'];
   $am=$row1m['away_team'];
   
   
   $sqls ="SELECT * FROM ticket WHERE matchid_t= '$p1' and username_t='$un'";
   $resuls = mysql_query($sqls);
   $l=0;
   echo "wing id: &nbsp; seat No.";
   while($row1s=mysql_fetch_array($resuls))
{
	echo "<br>";
   echo $row1s['wingtype_t'];echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
   echo $row1s['seat_number_t'];echo "<br>";
}
   $sqlhm ="SELECT * FROM teams WHERE team_id= '$hm'";
   $resulthm =	mysql_query($sqlhm);
   $row1hm=mysql_fetch_array($resulthm);
    echo "Organized by (Home Team) : ";echo $row1hm['team_name'];echo "<br>";
   $sqlam ="SELECT * FROM teams WHERE team_id= '$am'";
   $resultam = mysql_query($sqlam);
   echo "Challanged by (Away Team) : "; $row1am=mysql_fetch_array($resultam);
   echo $row1am['team_name'];echo "<br><br><br><br><br><br><br><br><br><br>";  
	}
}
?>
<form name="form1" method="POST" action="projectN.php">
<center><input type="submit" value="OK"></center>
</form>