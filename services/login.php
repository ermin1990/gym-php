<?php 
require_once("../config.php");


if($_SERVER['REQUEST_METHOD']== "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT admin_id, password FROM admins WHERE username = ?";
  $run = $conn->prepare($sql);
  $run->bind_param("s",$username);
  $run->execute();


  $results = $run->get_result();

  if($results->num_rows ==1){
    $admin = $results->fetch_assoc();

    if(password_verify($password, $admin['password'])){
      $_SESSION['admin_id'] = $admin['admin_id'];
      header('location: ../');
    }else{
      $_SESSION['error']  = "Netačan password!";
      header('location: ../login/');
      exit;
    }

  }else{
    $_SESSION['error']  = "Netačan username!";
      header('location: ../login/');
      exit;
  }

}




?>

