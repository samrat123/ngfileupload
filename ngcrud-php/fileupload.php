<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  include_once("config.php");
  // $data = array(
  //   array('id' => '1','email' => '1','password' => 'Cynthia','gender' => 'M'),
  //   array('id' => '2','email' => '1','password' => 'Keith','gender' => 'M'),
  //   array('id' => '3','email' => '1','password' => 'Robert','gender' => 'M'),
  //   array('id' => '4','email' => '1','password' => 'Theresa','gender' => 'M'),
  //   array('id' => '5','email' => '1','password' => 'Margaret','gender' => 'M')
  // );

  
 //  echo ' <br> $_FILES  : '.  json_encode($_FILES);

 //  echo '<br> $_REQUEST  : '.  json_encode($_REQUEST);

if(!empty($_FILES['avatar']['name']))
{
	move_uploaded_file($_FILES['avatar']['tmp_name'], $_FILES['avatar']['name']);
	
}
else
{
	$data = json_decode(file_get_contents('php://input'), true);
	echo  json_encode($data);
	  
	file_put_contents($data['avatar']['filename'], base64_decode($data['avatar']['value']));

} 
   
 


?>