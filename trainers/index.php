<?php 
require_once '../../gym/config.php';

$sql = "SELECT * FROM trainers";
$res = mysqli_query($conn,$sql);

$allTrainers = mysqli_fetch_all($res,MYSQLI_ASSOC);



require '../../gym/views/trainers.view.php';