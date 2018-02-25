<?php include_once("config.php");
  // header("Access-Control-Allow-Origin: *");
  // 	header("Access-Control-Allow-Credentials: true");
  // 	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  // 	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  // 	header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
  // 	header("Content-Type: application/json; charset=utf-8");

 
  //       $data=$_REQUEST;

  //     //  $data="HELLLLLLLLLLLLLLL";
  // echo json_encode($data);


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
 
//$data=$_REQUEST;  
$data = json_decode(file_get_contents('php://input'), true);
  
$result = mysqli_query($mysqli, "INSERT INTO users (password,gender,name,age,email)values('".$data['Password']."','".$data['Gender']."','Name','20','".$data['email']."')");
if($result)
{
  $response = array(
  	'status'=>200,'message'=>'Record saved successfully!','result'=>$result
  );

}else{
	$response = array(
		'status'=>400,'message'=>'Something went wronge!','result'=>$result
	);
}

echo json_encode($response);
?>

