<?php
$conn=mysql_connect("localhost","root","");
$selecydb=mysql_select_db("ndbms");
if (!$conn) 
{     
die("Connection failed: " . $conn->connect_error); 
} 
$y1=$_POST['m_id'];
 $sqlm ="DELETE FROM ticket WHERE matchid_t= '$y1'";
   $resultm = mysql_query($sqlm);

   $sqlm1 =" DELETE FROM price_p WHERE matchid_p= '$y1'";
   $resultm1 = mysql_query($sqlm1);
   
    $sqlm2 ="delete FROM matches WHERE match_id = '$y1'";
   $resultm2 = mysql_query($sqlm2);

header('Location:projectN.php');
?>  