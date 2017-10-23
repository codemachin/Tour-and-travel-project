<?php
	ob_start();
	session_start();
	require_once 'login/dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php?");
		exit;
	}
	
	
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE uid=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$_SESSION['usertype'] = $userRow['Typeofuser'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tourgrid welcomes <?php echo $userRow['email']; ?></title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="stylecss.css" rel='stylesheet' type='text/css'/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>


<script src="login/assets/jquery-1.11.3-jquery.min.js"></script>
<script src="login/assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="login/assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="login/style.css" type="text/css" />

<!--/js-->
<!--animated-css-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
</head>

<body>
<?php include('function.php'); ?>
<div class="header-top">
		 <!--container-->
		  <div class="container">
			 <div class="top-nav">
						<div class="logo">
						<a href="#"><img src="images/san dias1.png" id="section-1" class="img-responsive" alt=""/></a>
						</div>
						<div class="menu">
						<script src="login/assets/jquery-1.11.3-jquery.min.js"></script>
						<ul id="nav">
							 <li><a href="home.php#section-1"  onclick="javascript:window.open('home.php#section-1','_self')">                            Home</a></li>
							 <li><a href="home.php#section-2"  onclick="javascript:window.open('home.php#section-2','_self')">                           About</a></li>
							 <li><a href="home.php#section-3"  onclick="javascript:window.open('home.php#section-3','_self')">                             Gallery</a></li>
                        <li><a href="category.php" onclick="javascript:window.open('category.php','_self')">Category</a></li>                             
							 <li><a href="home.php#section-4"   onclick="javascript:window.open('home.php#section-4','_self')">                            Advertisements</a></li>
							 <li><a href="home.php#section-5"   onclick="javascript:window.open('home.php#section-5','_self')">                              Contact</a></li>
							 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['Username']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
			    <li><a href="admin/loginform.php" onclick="location.replace('admin/loginform.php'),'_top'")><span class="glyphicon glyphicon-user"></span>&nbsp;My profile</a></li>
				<li><a href="wea/index.html" onclick="location.replace('wea/index.html'),'_top'"><span class="glyphicon glyphicon-globe"></span>&nbsp;Weather Info.</a></li>
                <li><a href="logout.php?logout" onclick="location.replace('logout.php?logout'),'_top'"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
							 <div class="clearfix"></div>
						 </ul>
						 </div>
			 </div>
			  <div class="clearfix"> </div>
			

		 </div>
		 <!--/container-->
	 </div>
<!--/sticky-->
<!--?php include('slider.php'); ?>-->
<br><br><br>
<div style="height:50px"></div>
<div style="width:1000px; margin:auto" >

<div style="width:200px; float:left">

<table cellpadding="0" cellspacing="0" width="1000px">
<tr><td style="font-family:Lucida Calligraphy; font-size:20px; color:#09F"><b>Category</b></td></tr>
<?php


$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'><b><a href='subcat.php?catid=$data[0]'>$data[1]</a></b></td></tr>";

}
mysqli_close($cn);
?>

</table>

</div>

<div style="width:800px; float:left">
<table cellpadding="0px" cellspacing="0" width="1000px">
<tr><td class="headingText">Welcome to TOURGRID</td></tr>
<tr><td class="paraText" width="900px">Plan and Book Your Perfect Trip.Create your dream holiday.
what you like. Do what you love.
What's New Explore new experiences, attractions, food and wine trends.
What will you find during your visit to My Tour? Awe-inspiring natural beauty and the dramatic
red rock landscape of the Colorado National Monument. Exhilarating outdoor adventures including
hiking, camping or skiing on the Grand Mesa. Hundreds of miles of world-class mountain biking trails
such as the Kokopelli Trail. Incredible whitewater rafting on the Colorado River. Stunning golf courses
whose green fairways are juxtaposed against the craggy Redland desert. Peaceful places to reflect and
unwind amidst the natural splendor of Colorado's Western Slope. A charming downtown full of great
shops, restaurants, art galleries and so much more. This is My Tour, where you can experience
beautiful tourist places.</td><td style="background-image:url(images/13.jpg); background-repeat:no-repeat; color:#FFF; font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:24px; " width="700px" height="250px" ><div style="background:linear-gradient(#09F,#096,#09F); vertical-align:text-top; padding-left:5%;  width:100%;">HAVE A GOOD TIME &nbsp;&nbsp;&nbsp; without spending a dime</div	></td></tr></table>

</div>

</div>

<div style="clear:both"></div><br><br>

<?php include('bottom.php'); ?>
</body>
</html>