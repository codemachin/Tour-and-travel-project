<?php 
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	if( !isset($_SESSION['user']) ) {
		header("Location: loginform.php?");
		exit;}
 ?>


<!DOCTYPE html>
<html>
<head>
<title>Tourgrid</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
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




<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<?php if($_SESSION["usertype"]=="Admin") { ?>
<div class="col-sm-9" align="center"><img src="adminpics/adm.jpg" style="padding-top:40px"  width="400px" height="400px"/></div>
 <?php }

 else  { ?>
<div class="col-sm-9" align="center"><img src="adminpics/crt.png" style="padding-top:40px"  width="400px" height="400px"/></div>
<?php }?>

</div>
<?php include('bottom.php'); ?>
</body>
</html>