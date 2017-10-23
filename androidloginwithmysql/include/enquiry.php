<?php 
 
 
 
 $id  = urldecode($_GET['id']);
 $name = urldecode($_GET['name']);
 $mob = urldecode($_GET['mob']);
 $email = urldecode($_GET['email']);
 $days = urldecode($_GET['days']);
 $message = urldecode($_GET['message']);
 
 header('Content-type: application/json');
 
 require_once('db_connection.php');
 
 $sql = "insert into enquiry(Packageid,Name,Gender,Mobileno,Email,NoofDays,Child,Adults,Message,Statusfield) values('$id','$name','male','$mob','$email','$days','1','1','$message','Pending')";
 
  mysqli_query($connection,$sql);
 
 
 
 /*
 
 if($r)
{
	while($row=mysqli_fetch_array($r))
	{
		$flag[]=$row;
	}
	
	print json_encode($flag);
	
}
/* $result = array();
 echo json_encode(array("result"=>$result));*/
 
 mysqli_close($connection);
 
 ?>