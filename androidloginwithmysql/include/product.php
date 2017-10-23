<?php 
 
 
 
 $id  = urldecode($_GET['id']);
 header('Content-type: application/json');
 
 require_once('db_connection.php');
 
 $sql = "SELECT * FROM package where Packid = '$id'";
 
 $r = mysqli_query($connection,$sql);
 
 
 
 
 
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