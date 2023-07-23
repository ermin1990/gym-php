<?php
require_once '../../gym/config.php';



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // Podaci koji se šalju putem forme
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $trainer_id = $_POST['trainer_id'];
    

    // SQL upit za ažuriranje člana
    $sql = "UPDATE trainers SET 
            first_name = ?,
            last_name = ?,
            email = ?,
            phone_number = ?
            WHERE trainer_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $phone_number, $trainer_id);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Podaci o treneru su uspješno ažurirani.";
        header('location: ../../gym/trainers'); // Preusmjeravanje nakon ažuriranja
    } else {
        $_SESSION['msg'] = "Došlo je do greške pri ažuriranju podataka o članu.";
        header('location: ../../../trainers/edit-trainer.php?did=' . $trainer_id); // Preusmjeravanje u slučaju greške
    }
}
?>
