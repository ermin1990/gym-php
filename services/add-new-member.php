<?php 
require_once '../../gym/config.php';

if($_SERVER['REQUEST_METHOD']== "POST"){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $training_plan_id = $_POST['training_plan_id'];
    $trainer_id = $_POST['trainer_id'];

    $sql = "INSERT INTO members (first_name,last_name,email,phone_number,training_plan_id,trainer_id) VALUES(?,?,?,?,?,?)";

    $run = $conn->prepare($sql);
    $run->bind_param("ssssii",$first_name,$last_name,$email,$phone_number,$training_plan_id,$trainer_id);
    $run->execute();

    if($run){
        $_SESSION['msg'] = "Uspješno ste dodali novog korisnika";
        header('location: ../../../../gym');
    }else{
        $_SESSION['msg'] = "Dogodila se greška!";
        header('location: ../../../members/add-new.php');
    }
}


?>