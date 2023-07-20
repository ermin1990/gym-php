<?php 
require_once '../../gym/config.php';

$sql = "SELECT * FROM training_plans";
$res = mysqli_query($conn,$sql);

$allTrainingPlans = mysqli_fetch_all($res,MYSQLI_ASSOC);


$sql = "SELECT * FROM trainers";
$res = mysqli_query($conn,$sql);

$allTrainers = mysqli_fetch_all($res,MYSQLI_ASSOC);
$conn->close();


require '../../gym/views/add-new-member.view.php';

?>