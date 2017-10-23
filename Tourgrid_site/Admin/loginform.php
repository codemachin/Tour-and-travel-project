<?php 
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		exit;
	}
	
	
	if(isset($_POST["sbmt"]))
{
	
	//$cn=makeconnection();
	$user=trim($_POST["t1"]);
	$pass=trim($_POST["t2"]);
	$s=mysql_query("select * from users where Username='$user'");
	
	//$q=mysql_query($cn,$s);
	$r=mysql_num_rows($s);
    $data=mysql_fetch_array($s);
	//mysql_close($cn);
	if( $r == 1 && $data['Pwd']==$pass) {
				$_SESSION['user'] = $data['uid'];
				$_SESSION['usertype'] = $data['Typeofuser'];
				$_SESSION['username'] = $data['Username'];
				header("Location: index.php");
				
				exit;
				
				
			}
	else
	{
	echo "<script>alert('Invalid User Name or Password');</script>";
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Tourgrid</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />

<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
<body>
<!--header-->
<!--sticky-->

<?php include('dbconnect.php'); ?>
<?php


?>



<?php include('topforlogin.php'); ?>
<!--/sticky-->
<div style="padding-top:150px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style=" min-height:450px;">

</div>
<div class="col-sm-9">




<form method="post">
<table border="0" width="500px" height="400px" align="left" class="tableshadow">
<tr><td colspan="2" class="toptd"><img src="adminpics/lo.jpg" width="550px" height="100px" /></td></tr>

<tr><td><img src="adminpics/gggh.jpg" width="200px" height="200px" /></td>
<td class="lefttxt"><table border="0" width="100px" height="200px"><td>User Name</td></td><td><input type="text" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for User Name" /></td></tr>
<tr><td class="lefttxt">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters between 1 to 10 for Password" /></td></tr></table>
<tr><td></td><td align="center" ><input type="submit" value="LOGIN" name="sbmt" /></td></tr>




</table>
</form>



</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>
<?php ob_end_flush(); ?>