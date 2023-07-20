<?php 
require_once '../../gym/config.php';


$name = $_POST['name'];
$sessions = $_POST['sessions'];
$price = $_POST['price'];

$sql = "INSERT INTO `training_plans` (`plan_id`, `name`, `sessions`, `price`, `created_at`) VALUES (NULL, ?, ?, ?, NULL)";

$run = $conn->prepare($sql);
    $run->bind_param("sii",$name,$sessions,$price);
    $run->execute();


    if($run){
        $_SESSION['msg'] = "Uspješno ste dodali novi plan";
        header('location: ../../../../gym/plans');
    }else{
        $_SESSION['msg'] = "Dogodila se greška!";
        header('location: ../../../plans/add-new-plan.php');
    }