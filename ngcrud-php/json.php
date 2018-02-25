<?php
  header("Access-Control-Allow-Origin: *");
  include_once("config.php");
  // $data = array(
  //   array('id' => '1','email' => '1','password' => 'Cynthia','gender' => 'M'),
  //   array('id' => '2','email' => '1','password' => 'Keith','gender' => 'M'),
  //   array('id' => '3','email' => '1','password' => 'Robert','gender' => 'M'),
  //   array('id' => '4','email' => '1','password' => 'Theresa','gender' => 'M'),
  //   array('id' => '5','email' => '1','password' => 'Margaret','gender' => 'M')
  // );
 $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
 while($res= mysqli_fetch_assoc($result)) {    
   $responce[] =$res;
 }
  
  echo json_encode($responce);
?>