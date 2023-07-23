<?php
require_once '../../gym/config.php';



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    

    // Podaci koji se šalju putem forme
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $training_plan_id = $_POST['training_plan_id'];
    $trainer_id = $_POST['trainer_id'];
    $member_id = $_POST['member_id'];

    
    // SQL upit za ažuriranje člana
    $sql = "UPDATE members SET 
            first_name = ?,
            last_name = ?,
            email = ?,
            phone_number = ?,
            training_plan_id = ?,
            trainer_id = ?
            WHERE member_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiii", $first_name, $last_name, $email, $phone_number, $training_plan_id, $trainer_id, $member_id);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Podaci o članu su uspješno ažurirani.";
        header('location: ../../gym/members'); // Preusmjeravanje nakon ažuriranja
    } else {
        $_SESSION['msg'] = "Došlo je do greške pri ažuriranju podataka o članu.";
        header('location: ../../../members/edit-member.php?did=' . $member_id); // Preusmjeravanje u slučaju greške
    }
}
?>
