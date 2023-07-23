<?php 

require_once '../../gym/config.php';

//LOGIKA
if (isset($_GET['did']) && is_numeric($_GET['did'])) {

    $member_id = $_GET['did'];

    $sql = "SELECT members.*,
            training_plans.name AS training_plan_name,
            trainers.first_name AS trainer_fName, trainers.last_name AS trainer_lName
            FROM `members`
            LEFT JOIN `training_plans` ON members.training_plan_id = training_plans.plan_id
            LEFT JOIN `trainers` ON members.trainer_id = trainers.trainer_id
            WHERE `member_id` = $member_id";

    $result = $conn->query($sql); // Izvršavanje upita

    if ($result) {
        $member = $result->fetch_assoc(); // Fetch rezultata u asocijativni niz
    } else {
        // Greška prilikom izvršavanja upita
        die("Greška prilikom izvršavanja upita: " . $conn->error);
    }
}

$sql = "SELECT * FROM training_plans";
$res = mysqli_query($conn,$sql);
$allPlans = mysqli_fetch_all($res,MYSQLI_ASSOC);

$sql = "SELECT * FROM trainers";
$res = mysqli_query($conn,$sql);
$allTrainers = mysqli_fetch_all($res,MYSQLI_ASSOC);

$conn->close(); // Zatvaranje konekcije sa bazom podataka
require '../../gym/views/edit-members.view.php';