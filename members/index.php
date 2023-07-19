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


//Ispisivanje jednog trenera

/* function trainerName($trainer_id){
global $conn;
    $sql = "SELECT * FROM trainers WHERE trainer_id = ?";
   
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Greška u pripremi upita: " . mysqli_error($conn));
    }
   
    // Bindovanje parametra na upit
    mysqli_stmt_bind_param($stmt, "i", $trainer_id);
    
    // Izvršavanje
    mysqli_stmt_execute($stmt);

    // Dohvaćanje rezultata
   $result = mysqli_stmt_get_result($stmt);

   while ($row = mysqli_fetch_assoc($result)) {
    echo $row['first_name'] . " " . $row['last_name'];
}

// Zatvaranje statement objekta
mysqli_stmt_close($stmt);
}
 */



require '../../gym/views/members.view.php';