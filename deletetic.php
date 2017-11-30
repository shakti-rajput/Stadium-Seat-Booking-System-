<?php
session_start();
$un=$_SESSION['uname'];
$conn=mysql_connect("localhost","root","");
$selecydb=mysql_select_db("ndbms");
if (!$conn) 
{     
die("Connection failed: " . $conn->connect_error); 
} 
$a=$_POST['m_id'];
$b=$_POST['w_id'];
$c=$_POST['s_id'];
$ns=explode(",",$c);
echo "<center>Welcome Sir ".$un." your request have been accepted for ticket deletion</center><br><br><br>";
	$count=0;
	$k=0;
	$sql="select matchid_t from ticket where username_t='$un'";
	$pr_m=mysql_query($sql);
	while($rp_m=mysql_fetch_array($pr_m))
	{
		$match[$count]=$rp_m['matchid_t'];
		$count++;
	} 
	if(!in_array($a,$match))
	{
		echo '<script language="javascript">';
		echo 'window.alert("Match is not even booked by you Sir")';
		echo '</script>';
	}
	else
	{
		$sql="select wingtype_t from ticket where username_t='$un' and matchid_t ='$a'";
		$count=0;
		$pr_w=mysql_query($sql);
		while($rp_w=mysql_fetch_array($pr_w))
		{
		
			$wing[$count]=$rp_w['wingtype_t'];
			$count++;
		} 	 
		if(!in_array($b,$wing))
		{
			echo '<script language="javascript">';
			echo 'window.alert("In Selected Match entered wingid is not even booked by you Sir")';
			echo '</script>';
		}
		else
		{
			$sql="select *from ticket where matchid_t='$a' and wingtype_t='$b' and username_t='$un'";
			$pr2=mysql_query($sql);
			$count=0;
			while($rp=mysql_fetch_array($pr2))
			{
		
				$r[$count]=$rp['seat_number_t'];
				$count++;
			}
			$m=sizeof($ns);
			$rt=0;
			$v=0;
			for($i=0;$i<$m;$i++)
			{
				if(!in_array($ns[$i],$r))
				{
					if($ns[$i]=="")
					{
						$k++;
					}
						$rt++;
						continue;
				}
				$sql="delete from ticket where matchid_t='$a' and wingtype_t='$b' and seat_number_t='$r[$i]' and username_t='$un'";
				mysql_query($sql);
				$v++;
				echo "Delete Request is accepted for : ";
				echo $ns[$i];
				echo "<br>";
			}
			if($v==0)
			{
				echo "None of the seat no enteries made by you are proper seat number SIR";
			}
			if($rt==0)
			{
			}
			else
			{
				if($k!=$rt)
				{
					echo '<script language="javascript">';
					echo 'window.alert("Please enter properly, all these seats are not allocated to you")';
					echo '</script>';
					echo "<br>";echo "Please Provide Proper values of seat number";
				}
			}
		}

	}
?>
<form name="form1" method="POST" action="view_t.php">
<center><input type="submit" value="OK"></center>
</form>