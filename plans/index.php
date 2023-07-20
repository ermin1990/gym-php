<?php 
require_once '../../gym/config.php';



$sql = "SELECT * FROM training_plans";
$res = mysqli_query($conn,$sql);

$allPlans = mysqli_fetch_all($res,MYSQLI_ASSOC);





require '../../gym/views/plans.view.php';