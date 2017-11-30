<?php

$serv_name ="localhost";
$username="root";
$password="";
$dbname = "ndbms";


$con = new mysqli($serv_name,$username,$password,$dbname);
if($con->connect_error)
{
	die("Connection terminated".$con->connect_error);
}
else
{
	echo'Connection Successful';
}

echo'<br><br>';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email= $_POST['email'];
$uname = $_POST['uname'];
$pass = $_POST['password1'];
$ins = "INSERT into user values('$fname','$lname','$uname','$pass','$email')";
if($con->query($ins) === TRUE)
{
session_start();
$_SESSION["uname"] = $uname;
$_SESSION["firn"] = $data[0];	
	 header("Location:projectN.php");	
}
else
{
	echo'Failed to Update Table'.$con->error;
}
?>
