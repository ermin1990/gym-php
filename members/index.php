<?php 

require_once '../../gym/config.php';

//LOGIKA
$sql = "SELECT members.*,
training_plans.name AS training_plan_name,
trainers.first_name AS trainer_fName, trainers.last_name AS trainer_lName
FROM `members`
LEFT JOIN `training_plans` ON members.training_plan_id=training_plans.plan_id
LEFT JOIN `trainers` ON members.trainer_id = trainers.trainer_id;";
$res = mysqli_query($conn,$sql);

$allMembers = mysqli_fetch_all($res,MYSQLI_ASSOC);
$conn->close();

require '../../gym/views/members.view.php';