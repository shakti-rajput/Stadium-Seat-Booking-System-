<!DOCTYPE html>
<html>
<head>
<style>
</style>
<?php
session_start();
$connect=mysql_connect("localhost","root","");
$selectdb=mysql_select_db("ndbms",$connect);
$sql = "select * from matches";
$result=mysql_query($sql);
?>
<link rel="stylesheet" type="text/css" href="layout.css">
<link rel="stylesheet" type="text/css" href="style_navigation_bar.css">
<link rel="stylesheet" type="text/css" href="slide.css">
<script src="form.js"></script> 
</head>
<body>
<div class="container">  
<nav>
<ul >
<li>
<?php if(isset($_SESSION['uname'])||isset($_SESSION['admin']))
{
	echo '';
}
else
{	
	echo '<a href="2new.php" style="text-decoration:none">Login or Sign up</a>';
}
?>
</li>

  <li>
  <?php if(isset($_SESSION['uname'])||isset($_SESSION['admin']))
{
	echo '<a href="" style="text-decoration:none">Home</a>';
}
else
{	
	echo '<a href="" style="text-decoration:none">Home</a>';
}
?>
  </li>
     
	 <li>
  <?php if(isset($_SESSION['uname'])||isset($_SESSION['admin']))
{
	echo '<a href="matches.php" style="text-decoration:none">Match</a>';
}
else
{	
	echo '<a href="" style="text-decoration:none">Match</a>';
}
?>
  </li>
</li>
  <li>
  
    <?php if(isset($_SESSION['uname'])||isset($_SESSION['admin']))
{
	echo '<a href="" style="text-decoration:none">About</a>';
}
else
{	
	echo '<a href="" style="text-decoration:none">About</a>';
}
?>
  </li>
  <li>
  
      <?php if(isset($_SESSION['uname'])||isset($_SESSION['admin']))
{
	echo '<a href="" style="text-decoration:none">Contact us</a>';
}
else
{	
	echo '<a href="" style="text-decoration:none">Contact us</a>';
}
?>  
  </li>
   <li>
 
        <?php if(isset($_SESSION['uname']))
{
	echo '<a href="deleteseat.html" style="text-decoration:none">Delete Ticket</a>';
}
else
{	
	echo '';
}
?>  
  </li>
  
  <li>
  <?php if(isset($_SESSION['admin']))
	{
		echo '<a href="db_admin.html" style="text-decoration:none">Insert OR Delete matches</a>';
	}
	
	?>
  </li>
  <li>
<?php if(isset($_SESSION['admin'])|| isset($_SESSION['uname']))
{
echo'';
}
else{
	
	echo '<a href="2admin.php" style="text-decoration:none">Admin Login</a>';
}

?>
</li>
<li>
<?php if(isset($_SESSION['uname']))
{
echo '<a href="view_t.php" style="text-decoration:none">View Tickets</a>';
}

?>
</li>
</nav>

<?php 
if(isset($_SESSION['uname']))
{
echo "<center>Welcome \t\t&nbsp;&nbsp;&nbsp;".$_SESSION['uname']."</center>";
}
?>

<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="images1/a.jpg" style="width:100%">
   <div class="text" style="color:red;"><b>Test matches</b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="images1/b.jpg" style="width:100%">
  <div class="text" style="color:red;"><b>A cricket ball</b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">3/ 5</div>
  <img src="images1/c.jpg" style="width:100%">
   <div class="text" style="color:red;"><b>jayvardhane's 100</b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4/ 5</div>
  <img src="images1/d.jpg" style="width:100%">
   <div class="text" style="color:red;"><b>Wankhede stadium</b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="images1/e.jpg" style="width:100%">
   <div class="text" style="color:red;"><b>Amazing match sight</b></div>
</div>
</div>
<br>
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
    <span class="dot"></span>
	  <span class="dot"></span>
</div>
<script>
var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
  
<article>
<?php 
if(isset($_SESSION['matchuse']))
{
	unset($_SESSION["matchuse"]);
	

			while($mach_data=mysql_fetch_array($result))
			{
?>
<?php $mat=$mach_data['match_id'];
?>
			<div>
			<div>
			<a href="<?php if(!isset($_SESSION['admin'])){echo "matchdetail.php?matches={$mat}&user={$_SESSION['uname']}";
			}
			else { echo "matches.php";}?>">
			<div><img src="<?php echo "dbtext/".$mat.".jpg"; ?>" style="width:300px; height:200px;"></div>
			</a>
			</div>
			<br><?php echo "{$mach_data['start_time']}";?><br><?php echo "{$mach_data['end_time']}"; ?><br><?php echo "{$mach_data['date']}"; ?><br>
			
<?php echo "Home Team : ";
			$p=mysql_query("select team_name from teams where team_id={$mach_data['home_team']}");
			$data1=mysql_fetch_array($p);
			echo $data1[0];
?>
<br>
<?php echo "Away Team : ";
$p=mysql_query("select team_name from teams where team_id={$mach_data['away_team']}");
			$data1=mysql_fetch_array($p);
			echo $data1[0];
?>			
			</div>
<?php 
			}
}			
?>
</article>
<a href="logout.php">Logout</a>
<footer>Copyright © MY Cricket Ground.com</footer>
</div>
</body>
</html>
