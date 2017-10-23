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
<link rel="stylesheet" href="login/assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="login/style.css" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>


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
<tr><td style="font-size:24px; font-family:Lucida Calligraphy; color:#09F"><b>Category</b><br><br></td></tr>
<?php

$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;font-size:15px'><a href='subcat.php?catid=$data[0]'><b>$data[1]</b></a></td></tr>";

}

?>

</table>

</div>

<div style="width:800px; float:left">
<table cellpadding="0px" cellspacing="0" width="1000px">
<tr><td class="headingText">Subcategories</td></tr>
<tr><td class="paraText" width="900px">




<table cellpadding="0" cellspacing="0" width="900px">

<?php

$s="select * from subcategory where Catid='" .$_GET["catid"] . "'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
$n=0;
while($data=mysqli_fetch_array($result))
{
	
	if($n%3==0)
	{
	?>
		


<tr>
<?php

	}?>
<td>
<table border="0" width="100px" bordercolor="#FF6666">

<tr><td align="center" style="background-color:#60B0E6; font-family:Lucida Calligraphy; color:#FFF"><?php echo $data[1];?> </td></tr>
<tr><td class="image"><img src="Admin/subcatimages/<?php echo $data[3]; ?>" width="250px" height="200px" /></td></tr><br/><br/>
<tr><td align="center" style="background-color:#60B0E6; font-family:Lucida Calligraphy"><a href="package.php?subcatid=<?php echo $data[0];?>"><font color="#FFFFFF">View Detail</font></a></td></tr>

</table>
</td>
<?php

if($n%3==2)
{
?>
</tr>

<?php
}
$n=$n+1;
}
mysqli_close($cn);
?>

</table>




</td></tr></table>

</div>

</div>

<div style="clear:both"></div>

<?php include('bottom.php'); ?>
</body>
<script src="login/assets/js/bootstrap.min.js"></script>
</html>