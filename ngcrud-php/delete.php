<?php
//including the database connection file
include("config.php");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table

$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
if($result)
{
  $response = array('status'=>200,'message'=>'Record delted successfully!','result'=>$result);
}else{
	$response = array('status'=>400,'message'=>'Something went wronge!','result'=>$result);
}
echo json_encode($response);
 
?>

