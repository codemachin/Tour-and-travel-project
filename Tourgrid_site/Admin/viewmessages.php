<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
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

<!DOCTYPE html>
<html>
<head>
<title>Tourgrid welcomes <?php echo $userRow['email']; ?></title>
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
<style>
table#tab{
    border: 2px solid black;
}
#tab td{border: 2px solid black;}
</style>
</head>
<body>
<!--header-->
<!--sticky-->
<?php 
if($_SESSION['user']=="")
{
	header("location:loginform.php");
}
?>
<?php include('function.php'); ?>



<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into category(Cat_name) values('" . $_POST["t1"] ."')";
	mysqli_query($cn,$s);
	
	echo "<script>alert('Record Save');</script>";
}
?>



<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post">
<table id="tab" border="0" width="800px" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Messages</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="70%" >
<?php
$s="select * from sentbox where Name='".$_SESSION['username']."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
if($r==0){
	echo "<b>No Messages</b>";}
	else{
    echo '<tr><td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
	<td style="font-size:15px; padding:5px; font-weight:bold;">Message</td></tr>';} ?>

<?php


if($r==0){
}
else{
while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'>$data[0]</td><td style=' padding:5px;'>$data[1]</td></tr>";

}}




?>

</table>
</td></tr></table>

</form>



</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>