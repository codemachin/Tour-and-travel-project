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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "">
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
<link rel="stylesheet" href="login/assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="login/style.css" type="text/css" />
<script src="login/assets/js/bootstrap.min.js"></script>

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
<br><br><br>
<div style="height:50px"></div>
<div style="width:1000px; margin:auto"  >

<div style="width:200px; font-size:18px; color:#09F; float:left">

<table cellpadding="0" cellspacing="0" width="1000px" >
<tr><td style="font-size:18px" color="#09F">Category</td></tr>
<?php

$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'><a href='subcat.php?catid=$data[0]'>$data[1]</a></td></tr>";

}

?>

</table>

</div>

<div style="width:800px; float:left">
<table cellpadding="0px" cellspacing="0" width="1000px" >
<tr><td class="headingText">View Packages</td></tr>
<tr><td class="paraText" width="900px">
<table cellpadding="0" cellspacing="0" width="900px" border="0">
<tr>
<td>

<table border="0" width="600px" height="400px" align="center" >
<?php

$s="select * from package,category,subcategory where package.category=category.cat_id and package.subcategory=subcategory.subcatid and package.packid='" . $_GET["pid"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
$n=0;
$data=mysqli_fetch_array($result);
mysqli_close($cn);
?>
 

<tr><td colspan="3"><span class="middletext">Pack Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[1];?></td></tr>
<tr><td class="middletext"><img src="Admin/packimages/<?php echo $data[5];?>" width="200px" height="200px"  /></td>

<td class="middletext" style="padding-left:15px"><img src="Admin/packimages/<?php echo $data[6];?>" width="200px" height="200px"  /></td>

<td class="middletext" style="padding-left:15px"><img src="Admin/packimages/<?php echo $data[7];?>" width="200px" height="200px"  /></td>
</tr>
<tr><td  colspan="3" height="90px"><span class="middletext"><b>Category:</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b><?php echo $data[10];?></b>
 <br/>
  <span class="middletext">Subcategory:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo $data[12];?>
  <br/>
   <span class="middletext">Price:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo $data[4];?>
</td></tr>
<tr><td colspan="3"><p><?php echo $data[8];?></p></td></tr>
<tr>
<td align="left" colspan="3" height="50px">
<a href="enquiry.php?pid=<?php echo $data[0];   ?>"><input type="button" value="Enquiry" name="sbmt" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="cartAction.php?action=addToCart&id=<?php echo $data[0];   ?>"><input type="button" value="Add to cart" name="sbmt" /></a>
</td>

</tr>
</table>
</td>
</tr>
</table>
</td></tr>
</table>

</div>

</div>

<div style="clear:both"></div>

<?php include('bottom.php'); ?>
</body>
</html>



